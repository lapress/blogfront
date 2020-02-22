<template>
  <span class="counter" :class="[ size ? `counter--${size}` : '' ]" :style="style">
    {{ count }}
    <i class="counter__triangle" :class="[ size ? `counter__triangle--${size}` : '' ]" :style="triangleStyle" />
  </span>
</template>

<script>
const SIZE_BIG = 'big'
const SIZE_MEDIUM = 'medium'
const SIZE_SMALL = 'small'
const SIZES = [
  SIZE_BIG, SIZE_MEDIUM, SIZE_SMALL
]
export default {
  name: 'CommentsCounter',
  props: {
    count: {
      type: Number,
      default: 0
    },
    size: {
      type: String,
      default: null,
      validator: key => SIZES.includes(key)
    },
    color: {
      type: String,
      default: null
    }
  },
  computed: {
    style () {
      const style = {}

      if (this.color) {
        style.background = this.color
      }

      return style
    },

    triangleStyle () {
      const style = {}

      if (this.color) {
        style.borderColor = `transparent ${this.color} transparent transparent`
      }

      return style
    }
  }
}
</script>

<style lang="scss" scoped>
.counter {
  @apply bg-secondary w-6 h-6 inline-flex items-center justify-center absolute font-semibold text-white text-xs;

  @screen md {
    @apply w-10 h-10 text-base;
  }

  &__triangle {
    @apply block absolute w-0 h-0 right-0;
    content: "";
    border-style: solid;
    border-width: 0 10px 10px 0;
    border-color: transparent #00AEFF transparent transparent;
    bottom: -9px;

    &--big {
      border-width: 0 10px 10px 0;
      bottom: -10px;

      @screen md {
        border-width: 0 20px 20px 0;
        bottom: -20px;
      }
    }
  }

  &--big {
    @apply h-10;

    min-width: theme('spacing.10');

    @screen mobile {
      @apply right-0;
    }

    @screen md {
      @apply h-20 text-3xl;

      min-width: theme('spacing.20');
    }
  }

  &--medium {
    @apply text-2xl;

    height: theme('sizes.medium');
    min-width: theme('sizes.medium');
  }

  &--small {
    @apply h-8 text-sm w-auto;

    min-width: theme('spacing.8');
  }
}
</style>
