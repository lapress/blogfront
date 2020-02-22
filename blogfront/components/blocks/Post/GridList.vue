<template>
  <div>
    <component :is="getComponentName(index)" v-for="(chunk, index) in chunks" :key="index" :posts="chunk" v-bind="getComponentProps(index)" />
  </div>
</template>

<script>
import collect from 'collect.js'

import PostsRow from '~/components/blocks/Post/PostsRow'
import GridRow from '~/components/blocks/Post/GridRow'

const MAP = ['PostsRow', 'GridRow', 'PostsRow']

export default {
  name: 'GridList',
  components: { GridRow, PostsRow },
  props: {
    posts: {
      type: Array,
      default: () => []
    },
    right: Boolean
  },
  data: () => ({}),
  computed: {
    chunks () {
      return collect(this.posts).chunk(3).toArray()
    }
  },
  methods: {
    getComponentName (index) {
      return MAP[index]
    },
    getComponentProps (index) {
      const componentName = this.getComponentName(index)

      if (componentName === 'GridRow') {
        return {
          inverse: this.right
        }
      }
    }
  }
}
</script>
