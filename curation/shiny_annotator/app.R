# Assign ontology terms to genes
# ejr - 2019-09-12
# 2019-11-11 (added reset inputs button)
# v4
library(shiny)
library(here)
library(tidyverse)
library(ontologyIndex)
library(jsonlite)
library(shinythemes)

xyz <- "test"
# LOAD CONFIGURATION FILE
config <- fromJSON("config.json")  # config$obo = location of obo file
inputs <- config$inputs # config$inputs = dataframe of inputs and options

# create table of fields for each index
choices_df <- as_tibble(inputs$values) %>% 
  tibble::rowid_to_column("ID") %>% 
  tidyr::gather(field_id, field, -ID) %>% 
  dplyr::filter(!is.na(field)) %>%
  dplyr::mutate(name = paste0(field_id, ": ", field))

# LOAD ONTOLOGY
obo <- get_ontology(config$obo, extract_tags = "everything")

# create ID: name pairs
names_names <- names(obo$name)
names_values <- as.vector(obo$name)
names_terms <- paste0(names_names, ": ", names_values)
names_df <- tibble(term = names_terms)

# create ID: synonym pairs
syn_names <- names(obo$synonym)
syn_values <- as.vector(obo$synonym)

# ids with more than one synonym get synonyms in a vector
# this is a bit kludgy, but I want one synonym per line.
syns <- map(syn_names, function(x) {
    map(obo$synonym[[x]], function(y) {
      return(paste0( x, ": ", obo$name[[x]] ," (Synonym = ", y , ")"))  
    })
})

syn_terms <- do.call(c, unlist(syns, recursive=FALSE))

syn_df <- tibble(term = syn_terms) %>%
    filter(str_detect(term, "character", negate=TRUE)) %>%
    mutate(term = str_replace(term, "Synonym = \"(.+?)\".+", "Synonym = \\1")) 

obo_df <- rbind(names_df, syn_df)

# create empty output df - include all fields from config + access, term and date
empty_df <- setNames(as.data.frame(matrix(nrow = 0, ncol = length(inputs$field) + 3)), c("Accession", "Term", inputs$field, "Date"))
df <- empty_df

# UI
ui <- fluidPage(
    theme = shinytheme("superhero"),
    title = "Ontology Annotator",
    #titlePanel("Ontology Annotator"),
    sidebarLayout(
        sidebarPanel(

                uiOutput("inputs"),
                actionButton("do", "Add Row(s)"),
                actionButton("delete", "Delete Last Row"),
                actionButton("reset_input", "Reset inputs"),
                downloadButton("downloadData", "Download Table")
        ),
        mainPanel(
            tableOutput("table")
          #tabsetPanel(type = "tabs",
          #            tabPanel("table", tableOutput("table")) #,
                      #tabPanel("debug", htmlOutput("debug"))
          #)
            
            
        )
    )
)

# SERVER
server <- function(input, output) {
    # create inputs for each field in config file
    output$inputs <- renderUI({
      
    # we create a div here so that when the reset button is hit, the input 
        # fields are erased
      times <- input$reset_input
      div(id=letters[(times %% length(letters)) + 1],
          textAreaInput("Accessions", "Accessions", value = "", width = NULL,
                        height = NULL, cols = NULL, rows = 2, placeholder = NULL,
                        resize = NULL),
          selectizeInput('Terms', 'Terms (Where expressed)', selected='',
                         choices=obo_df$term, multiple=TRUE),
          
      map(seq_along(inputs$field_id), function(i){
       
          if (inputs$type[[i]] == "dropdown") {  

              input_choices <- setNames(choices_df[choices_df$ID == i,]$field_id, choices_df[choices_df$ID == i,]$name)
              input_create <- inputs$create[[i]]
              input_default <- inputs$default[[i]]
              selectizeInput(inputs$field[[i]], label = inputs$field[[i]], choices = input_choices, selected=input_default, options=list(create=input_create))  
          
          } else if (inputs$type[[i]] == "textbox") { 

              textInput(inputs$field[[i]], label = inputs$field[[i]], value = "", width = NULL, placeholder = NULL)
          }
      })
    )
    
    })
    
    # To update dataframe as we go we need this
    values <- reactiveValues(df_data = df)
    
    # Add rows to dataframe
    observeEvent(input$do, { 
        accession_list <- read.table(text = input$Accessions)
        tmp_df <- empty_df
        
        for (x in accession_list$V1) {
            for (y in input$Terms) {
                tmp_df[1,"Accession"] <- x
                tmp_df[1,"Term"] <- y
                tmp_df[1,"Date"] <- date()
                
                for (z in inputs$field) {
                    tmp_df[1,z] <- input[[z]]  
                }
                
                shiny::validate(
                  need(input$PMID, message="missing PMID"),
                  need(input$Accessions, message="missing Accesssions"),
                  need(input$"Curator (SIMR id)", message="missing Curator"),
                  need(str_detect(input$PMID, "^\\d+$") , message="Invalid PUBMED ID"),
                  need(str_detect(input$"Curator (SIMR id)", "^...$") , message="Invalid curator ID")
                )

                  
                   
                values$df_data <- rbind(values$df_data, tmp_df) 
            }
        }
    })

    # Delete last row of dataframe
    observeEvent(input$delete, { 
          values$df_data <- values$df_data[-nrow(values$df_data),]
    })
    
    # generate table
    getTable <- reactive({
      shiny::validate(
        need(input$PMID, message="missing PMID"),
        need(input$Accessions, message="missing Accesssions"),
        need(input$"Curator (SIMR id)", message="missing Curator"),
        need(str_detect(input$PMID, "^\\d+$") , message="Invalid PUBMED ID"),
        need(str_detect(input$"Curator (SIMR id)", "^...$") , message="Invalid curator ID")
      )
      values$df_data 
    })
    
    getPMID <- reactive({
      input$PMID 
    })
    
    getORCID <- reactive({
      input$"Curator (SIMR id)"
    })
    
    # Download dataframe
    output$downloadData <- downloadHandler(
        filename =function() {
          paste(getPMID(), "_", getORCID(), ".txt", sep="")
        },
        content = function(file) {
            write_tsv(getTable(), file)
    })
    
    # Display dataframe
    output$table <- renderTable( {
        getTable()
      })
    
    output$debug <- renderText( {
      input$PMID
    })
}

# RUN
shinyApp(ui = ui, server = server)

