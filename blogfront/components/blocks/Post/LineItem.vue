<template>
  <nuxt-link :to="postLink" :title="post.title" class="line-item">
    <strong class="line-item__title" v-text="post.title" />
    <span class="line-item__meta">
      {{ post.date }} <br>
      {{ post.author }}
    </span>
  </nuxt-link>
</template>

<script>
import PostBase from './PostBase'

export default {
  name: 'PostLineItem',
  mixins: [PostBase],
  props: {
    post: {
      type: Object,
      required: true
    }
  }
}
</script>
<style lang="scss" scoped>
.line-item {
  @apply flex text-black pb-6 mb-6 items-center;

  border-bottom: 1px solid #DBDBDB;

  &:last-child {
    @apply mb-0 pb-0 border-0;
  }

  &__title {
    @apply text-lg font-normal leading-tight;
  }
  &__meta {
    @apply text-grey text-sm flex-none text-right leading-normal;

    width: 35%;
  }
}
</style>
