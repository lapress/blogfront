<template>
  <div class="container">
    <section class="ps-section">
      <div class="posts">
        <PostsRow v-for="(chunk, index) in chunks" :key="index" :posts="chunk" />
        <PostDouble v-if="last" :post="last" />
      </div>
      <Sidebar />
    </section>
  </div>
</template>

<script>
import collect from 'collect.js'

import Sidebar from './Sidebar'
import PostDouble from '~/components/blocks/Post/PostDouble.vue'
import PostsRow from '~/components/blocks/Post/PostsRow'

export default {
  name: 'PostsWithSidebar',
  components: { PostsRow, PostDouble, Sidebar },
  props: {
    posts: {
      type: Array,
      default: () => []
    }
  },
  data: () => ({}),
  computed: {
    collection () {
      return collect(this.posts)
    },
    chunks () {
      return this.collection.take(4).chunk(2).toArray()
    },
    list () {
      return this.posts.slice(0, 4)
    },
    last () {
      return this.posts[4]
    }
  },
  methods: {}
}
</script>
<style lang="scss" scoped>
.ps-section {
  @apply flex justify-between items-start py-medium;
}

.aside {
  width: calc(33.3% - 20px)
}
.posts {
  width: calc(66.6% - 20px)
}

</style>
