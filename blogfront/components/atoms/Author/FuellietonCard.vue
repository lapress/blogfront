<template>
  <nuxt-link :to="link" class="feuilleton-author">
    <img :src="author.avatar" class="feuilleton-author__avatar" :alt="author.name" width="50" height="50">
    <span class="feuilleton-author__data">
      <span class="feuilleton-author__name" v-text="author.name" />
      <span class="feuilleton-author__counter">{{ author.feuilletons }} felietonów</span>
    </span>
  </nuxt-link>
</template>

<script>
import { authorRoute } from '~/utils/url'

export default {
  name: 'FuellietonCard',
  props: {
    author: {
      type: Object,
      required: true
    }
  },
  data: () => ({}),
  computed: {
    link () {
      return authorRoute(this.author)
    }
  }
}
</script>
<style lang="scss" scoped>
.feuilleton-author {
  @apply flex items-center;

  &__avatar {
    @apply rounded-full;

    transition: .3s all ease;
  }

  &__data {
    @apply ml-4;
  }

  &__name {
    @apply text-lg text-black font-semibold block leading-normal;
  }

  &__counter {
    @apply text-sm text-grey font-medium;
  }

  &:hover {
    .feuilleton-author__avatar {
      transform: scale(1.15);
    }
  }
}
</style>
