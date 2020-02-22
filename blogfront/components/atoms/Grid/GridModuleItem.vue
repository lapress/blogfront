<template>
  <Tile
    :post="item.post"
    :color="item.colors.background"
    :width="item.w"
    :height="item.h"
    :x="item.x"
    :y="item.y"
  />
</template>

<script>
import Tile from '~/components/blocks/Sections/Grid/Tile'
export default {
  name: 'GridModuleItem',
  components: { Tile },
  props: {
    item: {
      type: Object,
      required: true
    }
  },
  data: () => ({}),
  computed: {
    style () {
      const style = {}

      return style
    }
  }
}
</script>
<style lang="scss" scoped>
.item {
  @apply relative;
  background: black;
  z-index: 1;
}
</style>
