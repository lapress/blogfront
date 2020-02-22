<template>
  <component :is="componentName" />
</template>

<script>
import Base from '~/components/blocks/Post/Formats/Base'
import Big from '~/components/blocks/Post/Formats/Big'
import Feuilleton from '~/components/blocks/Post/Formats/Feuilleton'
import Video from '~/components/blocks/Post/Formats/Video'

export default {
  name: 'PostProxy',
  components: { Base, Big, Feuilleton, Video },
  props: {
    post: {
      type: Object,
      required: true
    }
  },
  computed: {
    componentName () {
      return this.post.format
    }
  }
}
</script>
