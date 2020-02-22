<template>
  <div class="container">
    <article class="post">
      <figure class="post__figure">
        <div class="post__categories">
          <CategoryLabel v-for="category in categories" :key="category.slug" :category="category" />
        </div>
        <nuxt-link :to="postLink">
          <Thumbnail size="wide" :post="post" />
        </nuxt-link>
      </figure>
      <div class="post__inside">
        <CommentsCounter class="post__counter" size="medium" :count="post.commentCount" />
        <nuxt-link :to="postLink" class="post__title" v-text="post.title" />
        <AuthorData :author="post.author" />
      </div>
    </article>
  </div>
</template>

<script>
import PostItem from '~/components/blocks/Post/PostItem.js'
import CommentsCounter from '~/components/atoms/Post/CommentsCounter'
import CategoryLabel from '~/components/atoms/Post/CategoryLabel'
import AuthorData from '~/components/atoms/Post/AuthorData'
import Thumbnail from '~/components/atoms/Post/Thumbnail'

export default {
  name: 'PostWide',
  components: { AuthorData, CommentsCounter, CategoryLabel, Thumbnail },
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
.post {
  @apply mb-medium;

  &__categories {
    left: auto;
    right: -1px;
  }

  &__counter {
    @apply left-0;

    top: theme('sizes.negatives.medium')
  }

  &__title {
    @apply text-3xl;
  }

  &__inside {
    @apply ml-0 bg-white p-10 absolute bottom-0 left-0;

    width: 35%;
  }
}
</style>
