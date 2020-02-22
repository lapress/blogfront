<script>
const BASE_CSS_CLASS = 'btn'
export const BUTTON_SIZE_SQUARE = 'square'
export const BUTTON_SIZE_SMALL = 'small'
export const BUTTON_SIZE_BIG = 'big'
export const BUTTON_SIZE_LARGE = 'large'
export const BUTTON_SIZES = [
  BUTTON_SIZE_SMALL, BUTTON_SIZE_BIG, BUTTON_SIZE_LARGE, BUTTON_SIZE_SQUARE
]

export default {
  name: 'Button',
  props: {
    to: {
      type: [String, Object],
      default: null
    },
    href: {
      type: String,
      default: null
    },
    size: {
      type: String,
      default: null,
      validator: size => BUTTON_SIZES.includes(size)
    },
    type: {
      type: String,
      default: null,
      validator: type => ['black', 'header-icon'].includes(type) // todo add other types
    },
    loading: Boolean,
    wide: Boolean
  },
  data: () => ({}),
  computed: {
    tag () {
      if (this.to) {
        return 'nuxt-link'
      }
      if (this.href) {
        return 'a'
      }

      return 'button'
    },
    cssClass () {
      const classes = [BASE_CSS_CLASS]

      if (this.size) {
        classes.push(`${BASE_CSS_CLASS}--${this.size}`)
      }

      if (this.type) {
        classes.push(`${BASE_CSS_CLASS}--${this.type}`)
      }

      if (this.loading) {
        classes.push(`${BASE_CSS_CLASS}--loading`)
      }

      if (this.wide) {
        classes.push(`${BASE_CSS_CLASS}--wide`)
      }

      return classes
    }
  },
  render (createElement) {
    const props = {}
    const attrs = {}

    if (this.to) {
      props.to = this.to
    }

    if (this.href) {
      attrs.href = this.href
    }

    return createElement(this.tag, {
      class: this.cssClass,
      props,
      attrs,
      on: {
        click: e => this.$emit('click', e)
      }
    }, this.$slots.default)
  }
}
</script>

<style lang="scss" scoped>
.btn {
  @apply border-0 cursor-pointer font-semibold;
  transition: all .3 ease;

  &--small {
    @apply text-xs px-2;
  }

  &--black {
    @apply bg-black text-white;
  }

  &--big {
    @apply text-lg px-8;

    line-height: 2.5rem;
  }

  &--large {
    @apply justify-center;
  }

  &--wide {
  }

  &--square {
    height: theme('sizes.base');
    width: theme('sizes.base');
  }

  &--header-icon {
    @apply text-white;

    border-left: 1px solid theme('colors.grey.dark');

    &:hover {
      @apply bg-primary;

      border-left-color: theme('colors.primary');
    }
  }

  &--loading {
    /*@apply text-transparent;*/
  }

  &:hover {
  }
}
</style>
