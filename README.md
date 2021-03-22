# Search Expression in query

## Filter operations

| | |
| --- | ---: |
| Start with | `:~` |
| End with | `~:` |
| Like | `~` |
| Not like | `!~` |
| Bigger than | `<` |
| Bigger then or equal | `<:` |
| Lower than | `>` |
| Lower than or equal | `>:` |
| Equal | `:` |
| Not equal | `!:` |

## FILTER

```
http://your.id/path?q=foo:keyword
http://your.id/path?q=foo:keyword,bar!~other
```

### Asterisk

```
http://your.id/path?q=foo:keyword*
http://your.id/path?q=foo:keyword*,bar!~*other,foo2:*key*
```

## SORTING

```
http://your.id/path?sort=foo:desc,other:asc
```

## PAGING

```
http://your.id/path?limit=30&offset=60
```

## Example output
```
TomasKulhanek\QuerySearch\Params\RequestParams {
  #filters: array:3 [
    0 => TomasKulhanek\QuerySearch\Params\Filter {
      #field: "foo"
      #operator: ":"
      #value: "keyword"
      #startWithAsterisk: false
      #endWithAsterisk: true
    }
    1 => TomasKulhanek\QuerySearch\Params\Filter {
      #field: "bar"
      #operator: "!~"
      #value: "other"
      #startWithAsterisk: true
      #endWithAsterisk: false
    }
    2 => TomasKulhanek\QuerySearch\Params\Filter {
      #field: "foo2"
      #operator: ":"
      #value: "key"
      #startWithAsterisk: true
      #endWithAsterisk: true
    }
  ]
  #sorts: array:2 [
    0 => TomasKulhanek\QuerySearch\Params\Sort {
      #field: "foo"
      #direction: "desc"
    }
    1 => TomasKulhanek\QuerySearch\Params\Sort {
      #field: "other"
      #direction: "asc"
    }
  ]
  #pagination: TomasKulhanek\QuerySearch\Params\Pagination {
    #limit: 30
    #offset: 60
  }
}
```
