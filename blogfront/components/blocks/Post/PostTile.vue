<template>
  <nuxt-link :to="postLink" class="p-tile">
    <strong class="p-tile__title" v-text="post.title" />
    <CommentsCounter class="p-tile__counter" :count="post.commentCount" :color="color" />
    <span class="p-tile__overlay" />
    <Thumbnail class="p-tile__thumbnail" :post="post" size="tile" />
  </nuxt-link>
</template>

<script>
import PostItem from '~/components/blocks/Post/PostItem.js'
import CommentsCounter from '~/components/atoms/Post/CommentsCounter'
import Thumbnail from '~/components/atoms/Post/Thumbnail'

export default {
  name: 'PostTile',
  components: { CommentsCounter, Thumbnail },
  mixins: [PostItem],
  computed: {
    categories () {
      if (!this.post.categories.length) {
        return []
      }

      return this.post.categories
    }
  }
}
</script>

<style lang="scss" scoped>
.p-tile {
  @apply relative inline-flex items-end overflow-hidden ;

  &__counter {
    @apply absolute z-10 top-0 right-0 m-2;
  }

  &__title {
    @apply absolute z-10 text-white text-2xl font-semibold p-6 leading-normal;
  }

  &__overlay {
    @apply bg-black opacity-50 inset-0 absolute;

    transition: all .3s ease-in-out;
    z-index: 1;
  }

  &__thumbnail {
    transition: all .3s ease-in-out;
  }

  &:hover {
    .p-tile__overlay {
      @apply opacity-25;
    }
    .p-tile__thumbnail {
      transform: scale(1.2);
    }
  }
}
</style>
