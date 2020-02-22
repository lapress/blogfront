import { mapGetters } from 'vuex'
import { postRoute } from '~/utils/url'

export default {
  computed: {
    ...mapGetters('post', {
      post: 'current'
    }),
    postLink () {
      return postRoute(this.post)
    }
  },
  async fetch ({ store, route, error }) {
    await store.dispatch('post/show', route.params.slug)
    // eslint-disable-next-line no-console
      .catch(e => console.log(e))
  }
}
