<template>
  <div>
    <AuthorData v-if="shouldDisplayAuthor" class="post__author" :author="post.author" />
    <time class="post__date" datetime="2019-04-30" v-text="date" />
    <CategoryTag v-for="category in post.categories" :key="category.slug" :category="category" />

    <PostSocials class="post__meta__socials" :post="post" />
  </div>
</template>

<script>
import CategoryTag from '~/components/atoms/Post/CategoryTag'
import PostSocials from '~/components/atoms/Post/PostSocials'

const AuthorData = () => import(/* webpackChunkName: "lp-author-data" */'~/components/atoms/Post/AuthorData')

export default {
  name: 'ArticleMetaInfo',
  components: { AuthorData, CategoryTag, PostSocials },
  props: {
    post: {
      type: Object,
      required: true
    },
    hideAuthor: Boolean
  },

  computed: {
    shouldDisplayAuthor () {
      return !(this.hideAuthor && !this.$device.isMobile)
    },
    date () {
      const date = new Date(this.post.date)
      const day = ('0' + date.getDate()).slice(-2)
      const month = ('0' + (date.getMonth() + 1)).slice(-2)
      return `${day}.${month}.${date.getFullYear()}`
    }
  }
}
</script>
