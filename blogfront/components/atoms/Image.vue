<template>
  <img :src="src" :width="_width" :height="_height" :alt="alt">
</template>

<script>
import { getImageSize, getImageSizeUrl, getImageUrl } from '~/utils/helpers'

export default {
  name: 'AImage',
  props: {
    size: {
      type: String,
      default: null
    },
    path: {
      type: String,
      required: true
    },
    method: {
      type: String,
      default: 'fit'
    },
    alt: {
      type: String,
      default: ''
    },
    width: {
      type: Number,
      default: null
    },
    height: {
      type: Number,
      default: null
    },
    disableDimensions: Boolean
  },
  computed: {
    imageSize () {
      return getImageSize(this.size)
    },
    _height () {
      if (this.height) {
        return this.height
      }
      if (this.method !== 'fit' || this.disableDimensions) {
        return
      }
      return this.imageSize.height
    },
    _width () {
      if (this.width) {
        return this.width
      }
      if (this.method !== 'fit' || this.disableDimensions) {
        return
      }
      return this.imageSize.width
    },
    src () {
      if (!this.size) {
        return getImageUrl(this.path, this.width, this.height)
      }

      return getImageSizeUrl(this.path, this.size, this.method)
    }
  }
}
</script>
