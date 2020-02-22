<template>
  <div :class="{ 'p-thumb p-thumb--placeholder': showPlaceholder }" :style="style">
    <img
      v-if="hasThumbnail"
      v-show="show"
      :src="src"
      alt=""
      class="p-thumb"
      @load="loaded = true"
    >
  </div>
</template>

<script>
import config from 'config'
import { getImageSizeUrl } from '~/utils/helpers'

export default {
  name: 'Thumbnail',
  props: {
    size: {
      type: String,
      default: 'item'
    },
    post: {
      type: Object,
      required: true
    }
  },
  data: () => ({
    loaded: false
  }),
  computed: {
    show () {
      return this.hasThumbnail && this.loaded
    },
    hasThumbnail () {
      return Boolean(this.post.thumbnail)
    },
    showPlaceholder () {
      return true
      // return this.hasThumbnail && !this.loaded
    },
    mappedSize () {
      // if (Config.map[this.size] !== undefined) {
      //   return Config.map[this.size]
      // }

      if (config.images.sizes[this.size] !== undefined) {
        return this.size
      }

      return 'base'
    },

    sizeObject () {
      return config.images.sizes[this.mappedSize]
    },

    src () {
      return getImageSizeUrl(this.post.thumbnail, this.mappedSize)
    },
    style () {
      const style = {}
      if (!this.showPlaceholder) {
        return style
      }

      style.width = `${this.sizeObject.width}px`
      style.height = `${this.sizeObject.height}px`

      return style
    }
  }
}
</script>

<style lang="scss" scoped>
.p-thumb {
  &--placeholder {
    @apply bg-grey-lightest max-w-full;

    background: theme('colors.grey.lightest') url(~assets/images/placeholder.svg) no-repeat center center;
  }
}
</style>
