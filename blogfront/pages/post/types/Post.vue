<template>
  <component :is="componentName" />
</template>

<script>
import { mapGetters } from 'vuex'

const PostFormatBase = () => import(/* webpackChunkName: "lp-post-format-base" */ '../formats/Base')
const PostFormatBig = () => import(/* webpackChunkName: "lp-post-format-big" */ '../formats/Big')
const PostFormatVideo = () => import(/* webpackChunkName: "lp-post-format-v" */ '../formats/Video')
const PostFormatFeuilleton = () => import(/* webpackChunkName: "lp-post-format" */ '../formats/Feuilleton')

export default {
  name: 'Post',

  components: {
    PostFormatBase,
    PostFormatBig,
    PostFormatVideo,
    PostFormatFeuilleton
  },
  computed: {
    ...mapGetters('post', {
      post: 'current'
    }),
    componentName () {
      return `post-format-${this.post.template}`
    }
  }
}
</script>
