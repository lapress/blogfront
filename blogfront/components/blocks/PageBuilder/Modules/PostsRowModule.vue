<template>
  <div class="container">
    <PostsRow :posts="posts" />
  </div>
</template>

<script>
import Module from './Module'
import PostsRow from '~/components/blocks/Post/PostsRow'
export default {
  name: 'PostsRowModule',
  components: { PostsRow },
  mixins: [Module]
}
</script>
