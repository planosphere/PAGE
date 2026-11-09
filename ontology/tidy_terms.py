"""Turn `robot query` TSV output into   term <TAB> field <TAB> value   with OBO-style ids.
Used by .github/workflows/plana-closure.yml.  usage: python3 tidy_terms.py in.tsv out.tsv"""
import sys

def tidy(cell):
    cell = cell.strip()
    if cell.startswith('<') and cell.endswith('>'):          # an IRI
        cell = cell[1:-1]
        base = 'http://purl.obolibrary.org/obo/'
        if cell.startswith(base) and '_' in cell[len(base):]:
            prefix, _, local = cell[len(base):].partition('_')
            return f'{prefix}:{local}'
        return cell
    if cell.startswith('"'):                                  # a literal: drop quotes, @lang, ^^type
        end = cell.rfind('"')
        cell = cell[1:end] if end > 0 else cell[1:]
        cell = cell.replace('\\"', '"').replace('\\\\', '\\')
    return cell.replace('\t', ' ').replace('\r', ' ').replace('\n', ' ')

rows = set()
with open(sys.argv[1], encoding='utf-8') as fh:
    next(fh, None)                                            # robot's ?term ?field ?value header
    for line in fh:
        parts = line.rstrip('\n').split('\t')
        if len(parts) != 3:
            continue
        term, field, value = (tidy(p) for p in parts)
        if term and field and value != '':
            rows.add((term, field, value))
with open(sys.argv[2], 'w', encoding='utf-8') as out:
    out.write('term\tfield\tvalue\n')
    for row in sorted(rows):
        out.write('\t'.join(row) + '\n')
print(f'{sys.argv[2]}: {len(rows)} rows')
