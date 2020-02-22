<template>
  <PostWide :post="post" />
</template>

<script>
import Section from './Section'
import PostWide from '~/components/blocks/Post/PostWide'

export default {
  name: 'PostWideSection',
  components: { PostWide },
  mixins: [Section],
  computed: {
    post () {
      return this.posts[0]
    }
  },
  methods: {}
}
</script>
