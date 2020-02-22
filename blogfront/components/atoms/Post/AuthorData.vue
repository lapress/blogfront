<template>
  <nuxt-link :to="authorLink" class="p-author">
    <img src="https://static.antyweb.pl/uploads/2016/01/Konrad-Koz%C5%82owski_avatar_1453995839-80x80.png" alt="" class="p-author__avatar">
    <span class="p-author__name" v-text="author.name" />
  </nuxt-link>
</template>

<script>
import { authorRoute } from '~/utils/url'

export default {
  name: 'AuthorData',
  props: {
    author: {
      type: Object,
      required: true
    }
  },
  computed: {
    authorLink () {
      return authorRoute(this.author)
    }
  }
}
</script>

<style lang="scss" scoped>
.p-author {
  @apply text-grey flex items-center font-normal;

  &__avatar {
    @apply w-8 h-8 rounded-full mr-2;
  }

  &:hover {
    @apply text-primary;
  }
}
</style>
