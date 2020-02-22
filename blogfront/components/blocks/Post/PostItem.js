import PostBase from './PostBase'

export default {
  mixins: [PostBase],
  props: {
    post: {
      type: Object,
      required: true
    },
    color: {
      type: String,
      default: null
    }
  }
}
