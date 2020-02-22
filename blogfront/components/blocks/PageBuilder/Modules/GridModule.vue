<template>
  <div class="grid" :style="style">
    <GridModuleItem v-for="item in posts" :key="item.i" :item="item" />
    <a v-if="module.background.url" :href="module.background.url" class="grid__link" />
  </div>
</template>

<script>
import get from 'lodash.get'

import Module from './Module'
import PostTile from '~/components/blocks/Post/PostTile'
import GridModuleItem from '~/components/atoms/Grid/GridModuleItem'

export default {
  name: 'GridModule',
  // eslint-disable-next-line vue/no-unused-components
  components: { PostTile, GridModuleItem },
  mixins: [Module],
  computed: {
    style () {
      const style = {}

      const backgroundSrc = get(this.module, 'background.image.src', null)
      const backgroundColor = get(this.module, 'background.color', null)

      if (backgroundSrc) {
        style.background = `url(${backgroundSrc}) no-repeat center center`
      }

      if (backgroundColor) {
        style.backgroundColor = backgroundColor
      }

      return style
    }
  }
}
</script>

<style lang="scss" scoped>
.grid {
  @apply bg-grey-light mb-medium;

  @screen md {
    @apply p-8;
  }

  @screen md {
    display: grid;
    grid-template-columns: repeat(8, 1fr);
    grid-template-rows: repeat(4, 1fr);
    grid-gap: 2rem;
    position: relative;
    height: calc(100vh - 4.375rem);
    min-height: 600px;
  }

  &__link {
    @apply absolute inset-0 block z-0;
  }
}
</style>
