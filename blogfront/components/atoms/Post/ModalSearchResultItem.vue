<template>
  <nuxt-link :to="postLink" class="modal-search-item" @click.native="$emit('navigate')">
    <strong class="modal-search-item__title" v-text="post.title" />
    <span class="modal-search-item__author" v-text="post.author.name" />
  </nuxt-link>
</template>

<script>
import PostBase from '~/components/blocks/Post/PostBase'

export default {
  name: 'ModalSearchResultItem',
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
.modal-search-item {
  @apply text-grey-light;

  &__title {
    @apply block text-base font-semibold leading-tight;
  }

  &__author {
    @apply pt-1 block text-grey-dark font-medium;
  }
}
</style>
