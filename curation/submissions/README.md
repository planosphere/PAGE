# Submissions to PAGE

1. move any already added submission files to the ../ExpressionFiles
2. Put any new submissions here in this submissions directory
3. Combine new submission files into one file
```
DATE=`date '+%Y-%m-%d'`

# put header from any submission files that end in txt into a header file 
head -1 *txt | head -2 | tail -n 1 > header

# cat the submission files together with only one header line
cat header > to_add_submissions.$DATE ; grep -v Accession *txt  >> to_add_submissions.$DATE

for i in `ls *txt` ;do echo "$DATE\t$i\n" ; done > submission.log
mv *txt ../ExpressionFiles
```

