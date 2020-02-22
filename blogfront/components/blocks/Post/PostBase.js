import { postRoute } from '~/utils/url'

export default {
  computed: {
    postLink () {
      return postRoute(this.post)
    },
    categories () {
      if (!this.post.categories.length) {
        return []
      }

      return this.post.categories
    }
  }
}
