<script>
const AVAILABLE_TAGS = ['h1', 'h2', 'h3', 'h4', 'strong']

export default {
  name: 'Heading',
  props: {
    level: {
      type: String,
      default: 'h2',
      validator: level => AVAILABLE_TAGS.includes(level)
    }
  },
  data: () => ({}),
  computed: {},
  methods: {},
  render (createElement) {
    let meta = null
    if (this.$scopedSlots.meta) {
      meta = createElement('div', {
        class: 'f-title__meta'
      }, [this.$scopedSlots.meta()])
    }

    return createElement('div', {
      class: 'f-title'
    }, [
      createElement(this.level, {
        class: ['f-title__tag', `f-title__${this.level}`]
      }, this.$slots.default),
      meta
    ])
  }
}
</script>

<style lang="scss" scoped>
.f-title {
  @apply flex relative items-center mb-6;

  &::after {
    @screen md {
      @apply block absolute bg-black;
      content: '';
      height: 2px;
      width: 100%;
      z-index: -1;
    }
  }

  &__tag {
    @apply bg-white pr-6 font-bold;
  }

  &__h1,
  &__h2 {
    @apply text-4xl;

    @screen mobile {
      @apply text-2xl;
    }
  ;
  }

  &__h3 {
    @apply text-3xl;
  }

  &__h4 {
    @apply text-2xl;
  }

  &__meta {
    @apply ml-auto bg-white pl-6;

    @screen mobile {
      @apply flex-none text-center;
    }
  }
}
</style>
