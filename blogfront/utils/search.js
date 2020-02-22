import Elasticsearch from 'elasticsearch'

export const ELASTICSEARCH_INDEX = 'antyweb'

export const client = new Elasticsearch.Client({
  node: process.env.ELASTICSEARCH_HOST,
  host: process.env.ELASTICSEARCH_HOST,
  index: 'antyweb'
})

export const quickSearchByQuery = ({ query, page = 1, start = 0, size = 16, includeFields = ['*'], excludeFields = [], sort = 'date', sortOrder = 'desc' }) => {
  const body = query.size(size)
    .from(start)
    .sort(sort, sortOrder)
    .build()

  return new Promise((resolve, reject) => {
    client.search({
      index: ELASTICSEARCH_INDEX,
      type: 'post',
      _sourceIncludes: includeFields,
      _sourceExcludes: excludeFields,
      body
    }).then((res) => {
      resolve(res)
    }).catch((e) => {
      reject(e)
    })
  })
}
