<script>
import { categoryRoute, postRoute } from '@/utils/url'

export default {
  name: 'NavigationItem',
  props: {
    item: {
      type: Object,
      required: true
    },
    showCaret: Boolean
  },
  data: () => ({}),
  computed: {
    hasChildren () {
      return Boolean(this.item.items.length) || this.showCaret
    },
    isExternal () {
      return this.item.value.includes('http')
    },
    tag () {
      if (this.isExternal) {
        return 'a'
      }

      return 'nuxt-link'
    },
    route () {
      if (this.item.type === 'category') {
        return categoryRoute({ slug: this.item.value })
      }

      if (this.item.type === 'post') {
        return postRoute({ urlKey: this.item.value })
      }

      return this.item.value
    },
    props () {
      const data = {
        props: {},
        domProps: {}
      }

      if (this.isExternal) {
        data.domProps.href = this.item.value
      }

      if (!this.isExternal) {
        data.props.to = this.route
      }

      if (this.item.css) {
        data.class = this.item.css
      }

      return data
    }
  },
  methods: {},
  render (createElement) {
    let append = null
    if (this.hasChildren && !this.$device.isMobile) {
      append = createElement('div', { class: 'caret' })
    }

    return createElement(this.tag, this.props, [this.item.anchor, append])
  }
}
</script>
