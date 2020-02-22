<template>
  <nuxt-link :to="categoryRoute" class="c-label" :class="{ 'c-label--badge' : badge }" v-text="category.name" />
</template>
<script>
import { categoryRoute } from '~/utils/url'

export default {
  name: 'CategoryLabel',
  props: {
    category: {
      type: Object,
      required: true
    },
    badge: Boolean
  },
  computed: {
    categoryRoute () {
      return categoryRoute(this.category)
    }
  }
}
</script>

<style lang="scss" scoped>
  .c-label {
    @apply bg-primary text-white hidden items-center px-3 font-semibold text-sm leading-relaxed border border-solid border-white;

    margin-left: -1px;

    @screen sm {
      @apply inline-flex;
    }
  }
</style>
