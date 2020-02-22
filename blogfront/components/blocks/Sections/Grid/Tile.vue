<template>
  <nuxt-link :to="postLink" class="tile" :style="style" @mouseover="hover = true" @mouseleave="hover = false">
    <CommentsCounter :count="post.commentCount" class="tile__comments" :color="commentsColor" />
    <div>
      <strong class="tile__title" :class="titleTextSizeClass" :style="titleStyle" v-text="post.title" />
    </div>
    <span class="tile__overlay" :class="{ 'tile__overlay--hover' : hover }" :style="overlayStyle" />
    <AImage class="tile__image" :width="imageWidth" :height="imageHeight" :path="post.thumbnail" :alt="post.title" />
  </nuxt-link>
</template>

<script>
import CommentsCounter from '~/components/atoms/Post/CommentsCounter'
import PostBase from '~/components/blocks/Post/PostBase'
import AImage from '~/components/atoms/Image'

export default {
  name: 'Tile',
  components: { CommentsCounter, AImage },
  mixins: [PostBase],
  props: {
    width: {
      type: Number,
      default: 2
    },
    height: {
      type: Number,
      default: 2
    },
    x: {
      type: Number,
      required: true
    },
    y: {
      type: Number,
      required: true
    },
    color: {
      type: String,
      default: '#1eaffc'
    },
    post: {
      type: Object,
      required: true
    }
  },
  data: () => ({
    hover: false
  }),
  computed: {
    size () {
      return 'show'
    },
    style () {
      return {
        gridColumnStart: this.x + 1,
        gridRowStart: this.y + 1,
        gridRowEnd: this.y + 1 + this.height,
        gridColumnEnd: this.x + 1 + this.width
      }
    },
    titleStyle () {
      if (this.hover) {
        return {}
      }

      return {
        background: this.color
      }
    },
    overlayStyle () {
      return {
        background: this.color
      }
    },
    commentsColor () {
      return this.color
    },
    titleTextSizeClass () {
      if (this.height === 1 || this.width === 1) {
        return 'tile__title--xs'
      }
      if (this.width === 2) {
        return 'tile__title--sm'
      }

      return null
    },
    imageWidth () {
      return this.width * 230
    },
    imageHeight () {
      return this.height * 210
    }
  },
  methods: {

  }
}
</script>

<style lang="scss" scoped>
.tile {
  @apply text-white p-6 relative overflow-hidden flex justify-center items-end;

  @screen mobile {
    @apply h-56;
  }

  &__image {
    @apply self-center absolute z-0;

    max-width: none;
  }

  &__overlay {
    @apply absolute inset-0 bg-black;

    /*background: linear-gradient(rgb(152, 111, 0) 100%, rgb(152, 111, 0) 100%);*/
    opacity: .4;
    z-index: 1;
    transition: all .3s ease-in-out;

    &--hover {
      @apply bg-black opacity-75;
    }
  }

  &__title {
    @apply font-medium relative z-10 self-end text-4xl leading-normal;

    transition: all .3s ease-in-out;

    &--sm {
      @apply text-2xl;
    }

    &--xs {
      @apply text-xl;
    }

    .tile:hover > & {
      @apply bg-transparent;
    }
  }

  &__comments {
    @apply top-0 right-0 m-2 z-10;
  }

}
</style>
