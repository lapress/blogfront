<template>
  <nuxt-link :to="to" class="bubble" :style="style">
    {{ text }}
    <i class="bubble__triangle" :style="triangleStyle" />
  </nuxt-link>
</template>
<script>
export default {
  name: 'Bubble',
  props: {
    to: {
      type: [String, Object],
      default: '/'
    },
    color: {
      type: String,
      default: null
    },
    text: {
      type: String,
      required: true
    }
  },
  data: () => ({}),
  computed: {
    style () {
      const styles = {}

      if (this.color) {
        styles.background = this.color
      }

      return styles
    },
    triangleStyle () {
      const styles = {}

      if (this.color) {
        styles.borderColor = `${this.color} transparent transparent`
      }

      return styles
    }
  },
  methods: {}
}
</script>

<style lang="scss" scoped>
.bubble {
  @apply inline-flex items-center px-8 bg-tertiary text-4xl font-semibold text-white relative z-20 ml-6;

  height: theme('sizes.base');

  &__triangle {
    @apply block absolute w-0 h-0 left-0;

    content: "";
    border-style: solid;
    border-width: 20px 20px 0 0 !important;
    border-color: theme('colors.tertiary') transparent transparent;
    bottom: -19px!important;
  }
}
</style>
