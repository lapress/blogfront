<template>
  <div :class="{'container' : !module.meta.isFullWidth}">
    <PostItem :size="size" :post="post" class="post--wide" />
  </div>
</template>

<script>
import Module from './Module'
import PostItem, { SIZE_FULL_WIDTH } from '~/components/blocks/Post/Item'

export default {
  name: 'PostModule',
  components: { PostItem },
  mixins: [Module],
  computed: {
    post () {
      return this.module.posts[0]
    },
    size () {
      return SIZE_FULL_WIDTH
    }
  }
}
</script>
<style lang="scss" scoped>
.post {
  &--wide {
    @apply mb-10;
  }
}
</style>
