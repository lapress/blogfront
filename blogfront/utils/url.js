export const categoryRoute = (category) => {
  return {
    name: 'category',
    params: {
      slug: category.slug
    }
  }
}

export const tagRoute = (tag) => {
  return {
    name: 'tag',
    params: {
      slug: tag.slug
    }
  }
}

export const postRoute = (post) => {
  return {
    name: 'urlKey',
    params: {
      slug: post.urlKey
    }
  }
}

export const authorRoute = author => ({
  name: 'author',
  params: {
    slug: author.key
  }
})
