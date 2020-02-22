export default {
  props: {
    module: {
      type: Object,
      required: true
    }
  },
  computed: {
    posts () {
      return this.module.posts
    }
  }
}
