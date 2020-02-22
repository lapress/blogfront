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
import PostBase from '~/components/blocks/Post/PostBase'

export default {
  name: 'PopularTabLineItem',
  mixins: [PostBase],
  props: {
    post: {
      type: Object,
      required: true
    }
  },
  data: () => ({}),
  computed: {}
}
</script>
<style lang="scss" scoped>
.tab-line-item {
  @apply text-white py-6 block mb-6 leading-normal;

  border-bottom: 1px solid theme('colors.grey.dark');

  &:last-child {
    @apply border-b-0;
  }

  &__title {
    @apply block mb-2;
  }

  &__author {
    @apply text-grey;
  }

  &__row {
    @apply flex items-center justify-between;
  }
}
</style>
