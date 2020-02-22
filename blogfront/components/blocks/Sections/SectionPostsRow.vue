<template>
  <div class="container">
    <PostsRow :posts="posts" />
  </div>
</template>

<script>
import Section from './Section'
import PostsRow from '~/components/blocks/Post/PostsRow'

export default {
  name: 'SectionPostsRow',
  components: { PostsRow },
  mixins: [Section],
  data: () => ({}),
  computed: {},
  methods: {}
}
</script>
