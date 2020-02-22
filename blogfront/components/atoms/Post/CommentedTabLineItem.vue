<template>
  <nuxt-link :to="postLink" class="tab-line-item">
    <strong class="tab-line-item__title" v-text="post.title" />
    <span class="tab-line-item__row">
      <span class="tab-line-item__author" v-text="post.author.name" />
      <span class="tab-line-item__counter" v-text="123" />
    </span>
  </nuxt-link>
</template>

<script>
import PopularTabLineItem from '~/components/atoms/Post/PopularTabLineItem'
export default {
  name: 'CommentedTabLineItem',
  extends: PopularTabLineItem
}
</script>
