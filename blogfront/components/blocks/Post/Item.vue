<template>
  <article class="post" :class="cssClass">
    <figure class="post__figure" :class="{ 'post__figure--wide' : isWide }">
      <div class="post__categories">
        <CategoryLabel v-for="category in categories" :key="category.slug" :category="category" />
      </div>
      <nuxt-link :to="postLink">
        <Thumbnail :post="post" :size="size" />
      </nuxt-link>
    </figure>
    <div class="post__inner" :class="{ 'post__inner--wide' : isWide }">
      <CommentsCounter class="post__counter" :count="post.commentCount" :size="isWide ? 'medium' : null" />
      <nuxt-link :to="postLink" class="post__title" :class="{ 'post__title--wide' : isWide }" v-text="post.title" />
      <AuthorData v-if="!$device.isMobile" :author="post.author" />
    </div>
  </article>
</template>

<script>
import PostBase from './PostBase'
import CommentsCounter from '~/components/atoms/Post/CommentsCounter'
import CategoryLabel from '~/components/atoms/Post/CategoryLabel'
import AuthorData from '~/components/atoms/Post/AuthorData'
import Thumbnail from '~/components/atoms/Post/Thumbnail'

export const SIZE_BASE = 'item'
export const SIZE_MINI = 'mini'
export const SIZE_DOUBLE = 'double'
export const SIZE_FULL_WIDTH = 'wide'

export const SIZES = [
  SIZE_BASE,
  SIZE_MINI,
  SIZE_DOUBLE,
  SIZE_FULL_WIDTH
]

export default {
  name: 'PostItem',
  components: { AuthorData, CommentsCounter, CategoryLabel, Thumbnail },
  mixins: [PostBase],
  props: {
    post: {
      type: Object,
      required: true
    },
    color: {
      type: String,
      default: null
    },
    size: {
      type: String,
      default: SIZE_BASE,
      validator: size => SIZES.includes(size)
    }
  },
  computed: {
    cssClass () {
      if (this.size === SIZE_FULL_WIDTH) {
        return 'post--wide'
      }
      return ''
    },
    isWide () {
      return this.size === SIZE_FULL_WIDTH
    }
  }
}
</script>
