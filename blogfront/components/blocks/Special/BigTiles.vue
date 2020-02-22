<template>
  <div class="container">
    <div class="row section">
      <div v-for="post in posts" :key="post.id" class="col-4">
        <PostTile :post="post" />
      </div>
    </div>
  </div>
</template>

<script>
import PostTile from '~/components/blocks/Post/PostTile'

export default {
  name: 'BigTiles',
  components: { PostTile },
  props: {
    posts: {
      type: Array,
      default: () => []
    }
  }
}
</script>
