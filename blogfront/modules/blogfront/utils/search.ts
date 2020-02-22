import config from 'config'
const ElasticSearch = () => import(/* webpackChunkName: "elasticsearch" */'elasticsearch')

const decorateResults = ({ hits }) => {
  return {
    total: hits.total,
    hits: hits.hits.map(item => item._source)
  }
}

export const createClient = async (ElasticSearch) => {
  ElasticSearch = await ElasticSearch()
  return ElasticSearch.Client({
    node: config.elasticsearch.host,
    host: config.elasticsearch.host
  })
}

export const quickSearchByQuery = async ({ query, start = 0, size = 20, includeFields = ['*'], excludeFields = [], sort = 'date', sortOrder = 'desc', type = null, index = null }) => {
  if (!config.elasticsearch.indexes.includes(index)) {
    index = config.elasticsearch.defaultIndex
  }
  index = index || config.elasticsearch.defaultIndex
  const client = await createClient(ElasticSearch)

  if (type) {
    query = query.filter('term', 'type', type)
  }

  return new Promise((resolve, reject) => {
    const body = query.size(size)
      .from(start)
      .sort(sort, sortOrder)
      .build()

    client.search({
      index,
      body,
      _sourceIncludes: includeFields,
      _sourceExcludes: excludeFields
    })
      .then(res => resolve(decorateResults(res)))
      .catch(e => reject(e))
  })
}
