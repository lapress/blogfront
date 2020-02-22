<template>
  <article class="p-mini">
    <figure class="p-mini__figure">
      <CommentsCounter class="p-mini__counter" size="small" :count="post.commentCount" :color="color" />
      <nuxt-link :to="postLink">
        <Thumbnail size="small" :post="post" />
      </nuxt-link>
    </figure>
    <div class="p-mini__info">
      <nuxt-link :to="postLink" class="p-mini__title" v-text="post.title" />
      <AuthorData :author="post.author" />
    </div>
  </article>
</template>

<script>
import PostItem from '~/components/blocks/Post/PostItem.js'
import CommentsCounter from '~/components/atoms/Post/CommentsCounter'
import AuthorData from '~/components/atoms/Post/AuthorData'
import Thumbnail from '~/components/atoms/Post/Thumbnail'

export default {
  name: 'PostMini',
  components: { AuthorData, CommentsCounter, Thumbnail },
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
.p-mini {
  @apply flex items-start;

  &__figure {
    @apply relative flex-none;
  }

  &__counter {
    @apply right-0 top-0 m-2;
  }

  &__info {
    @apply px-6;
  }

  &__title {
    @apply text-black text-lg leading-normal mb-4 block;
  }
}
</style>
