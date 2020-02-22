export default {
  props: {
    section: {
      type: Object,
      default: () => ({})
    },
    posts: {
      type: Array,
      default: () => []
    }
  }
}
