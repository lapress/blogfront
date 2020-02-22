<template>
  <span class="c-excerpt" :class="css">
    <slot />
  </span>
</template>

<script>
export default {
  name: 'PostExcerpt',
  props: {
    side: {
      type: String,
      default: null
    }
  },
  data: () => ({}),
  computed: {
    css () {
      if (this.side) {
        return `c-excerpt--${this.side}`
      }
      return null
    }
  }
}
</script>
<style lang="scss" scoped>
.c-excerpt {
  @apply p-6 font-semibold text-2xl;

  border-bottom: 2px solid theme('colors.grey.lighter');
  border-top: 2px solid theme('colors.grey.lighter');

  width: 20rem;

  &--right {
    @apply float-right ml-8 my-8 pr-0;

    margin-right: -8rem;
  }
}
</style>
