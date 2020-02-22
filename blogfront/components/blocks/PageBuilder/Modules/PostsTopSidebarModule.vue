<template>
  <div class="container">
    <div class="t-section">
      <div class="t-section__main">
        <div class="t-section__posts">
          <PostsRow v-for="(chunk, index) in chunks" :key="index" :posts="chunk" />
          <!--          <PostItem v-for="index in 4" :key="index" :post="posts[index]" />-->
        </div>
        <PostItem v-if="posts[4]" size="double" :post="posts[4]" />
      </div>
      <div v-if="!$device.isMobile" class="t-section__aside">
        <Sidebar :module="module" />
      </div>
    </div>
  </div>
</template>

<script>

import Module from './Module'
import PostItem from '~/components/blocks/Post/Item'
import Sidebar from '~/components/blocks/Sections/Sidebar'
import PostsRow from '~/components/blocks/Post/PostsRow'

export default {
  name: 'PostsTopSidebarModule',
  components: { PostItem, Sidebar, PostsRow },
  mixins: [Module],
  data: () => ({}),
  computed: {
    chunks () {
      return [
        [this.posts[0], this.posts[1]],
        [this.posts[2], this.posts[3]]
      ]
    }
  }
}
</script>
<style lang="scss" scoped>
.t-section {
  padding: 20px 0;

  @screen md {
    display: grid;
    grid-template-columns: 2fr 1fr;
    grid-gap: 2rem;
  }

  &__posts {
    /*display: grid;*/
    /*grid-template-columns: 1fr 1fr;*/
    /*grid-gap: 2rem;*/
    /*padding-bottom: 2rem;*/
  }

  &__aside {
    @apply hidden;

    @screen md {
      @apply block;
    }
  }
}
</style>
