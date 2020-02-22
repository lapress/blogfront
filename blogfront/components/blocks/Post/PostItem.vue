<template>
  <article class="post">
    <figure class="post__figure">
      <div class="post__categories">
        <CategoryLabel v-for="category in categories" :key="category.slug" :category="category" />
      </div>
      <nuxt-link :to="postLink">
        <Thumbnail :post="post" />
      </nuxt-link>
    </figure>
    <div class="post__inner">
      <CommentsCounter class="post__counter" />
      <nuxt-link :to="postLink" class="post__title" v-text="post.title" />
      <AuthorData :author="post.author" />
    </div>
  </article>
</template>

<script>
import PostItem from '~/components/blocks/Post/PostItem.js'
import CommentsCounter from '~/components/atoms/Post/CommentsCounter'
import CategoryLabel from '~/components/atoms/Post/CategoryLabel'
import AuthorData from '~/components/atoms/Post/AuthorData'
import Thumbnail from '~/components/atoms/Post/Thumbnail'

export default {
  name: 'PostItem',
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
