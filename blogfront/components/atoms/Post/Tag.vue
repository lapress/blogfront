<template>
  <nuxt-link :to="link" class="tag">
    #{{ tag.name }}
  </nuxt-link>
</template>

<script>
import { tagRoute } from '~/utils/url'

export default {
  name: 'Tag',
  props: {
    tag: {
      type: Object,
      required: true
    }
  },
  data: () => ({}),
  computed: {
    link () {
      return tagRoute(this.tag)
    }
  },
  methods: {}
}
</script>
<style lang="scss" scoped>
.tag {

}
</style>
