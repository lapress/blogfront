<template>
  <article class="post">
    <figure class="post__figure">
      <nuxt-link :to="postLink">
        <Thumbnail size="double" :post="post" />
      </nuxt-link>
    </figure>
    <div class="post__inner">
      <CommentsCounter class="post__counter" :count="post.commentCount" />
      <nuxt-link :to="postLink" class="post__title" v-text="post.title" />
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
  name: 'PostDouble',
  components: { AuthorData, CommentsCounter, Thumbnail },
  mixins: [PostItem]
}
</script>
<style lang="scss" scoped>
.post {
  grid-column: span 2;

  &__title {
    @apply text-3xl;
  }
}
</style>
