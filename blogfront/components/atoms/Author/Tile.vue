<template>
  <nuxt-link class="t-author" :to="authorLink">
    <img class="t-author__avatar" src="https://static.antyweb.pl/uploads/2016/01/Konrad-Koz%C5%82owski_avatar_1453995839-80x80.png" alt="">
    <strong class="t-author__name" v-text="author.name" />
  </nuxt-link>
</template>

<script>
import { authorRoute } from '~/utils/url'

export default {
  name: 'Tile',
  props: {
    author: {
      type: Object,
      required: true
    }
  },
  data: () => ({}),
  computed: {
    authorLink () {
      return authorRoute(this.author)
    }
  },
  methods: {}
}
</script>
<style lang="scss" scoped>
.t-author {
  @apply text-center text-grey-darker;
  &__avatar {
    @apply w-20 h-20 rounded-full m-10 mb-8;
  }

  &__name {
    @apply block font-medium;
  }

  &:hover {
    @apply text-primary;
  }
}
</style>
