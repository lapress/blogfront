<template>
  <div class="posts-row" :class="{'posts-row--a2': posts.length === 2}">
    <PostItem v-for="post in posts" :key="post.id" class="posts-row__item" :post="post" />
  </div>
</template>

<script>
import PostItem from '~/components/blocks/Post/Item.vue'

export default {
  name: 'PostsRow',
  components: { PostItem },
  props: {
    posts: {
      type: Array,
      default: () => []
    }
  }
}
</script>
<style lang="scss" scoped>
.posts-row {
  @apply pb-6 mb-6;

  display: grid;
  grid-gap: 1.5rem;
  grid-template-columns:  repeat(2, 1fr);

  @screen md {
    grid-template-columns:  repeat(3, 1fr);
    border-bottom: 1px solid theme('colors.grey.light');
  }

  &--a2 {
    grid-template-columns:  repeat(2, 1fr);
  }

  &__item {

    @screen md {
      @apply flex-1 pr-5;

      border-right: 1px solid theme('colors.grey.light');
    }

    &:last-child {
      @apply pr-0 border-r-0;

      @screen mobile {
        grid-column: span 2;
      }
    }
  }
}
</style>
