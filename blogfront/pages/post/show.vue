<template>
  <div>
    <component :is="post.type" v-if="post" />
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

const Post = () => import(/* webpackChunkName: "post" */'./types/Post')
const Page = () => import(/* webpackChunkName */'./types/Page')

export default {
  name: 'PostShow',
  components: {
    // eslint-disable-next-line vue/no-unused-components
    Post, Page
  },
  async asyncData ({ route, store }) {
    await store.dispatch('post/single', { urlKey: route.params.urlKey })
  },
  computed: {
    ...mapGetters('post', {
      post: 'current'
    })
  },
  methods: {
    ...mapActions('post', {
      fetch: 'fetch'
    })
  }
}
</script>
