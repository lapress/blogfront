<template>
  <div class="c-splash" :style="style">
    <div class="container">
      <div class="title-row">
        <h1 class="title-1 c-splash__title" v-text="category.name" />
      </div>
      <div class="p-section-1-4">
        <header class="p-section-1-4__header">
          <Bubble :text="category.subtitle" />
        </header>
        <div class="p-section-1-4__posts">
          <PostTile :post="category.posts[0]" class="p-section-1-4__post-1" />
          <PostTile :post="category.posts[1]" />
          <PostTile :post="category.posts[2]" />
          <div class="p-section-1-4__aside">
            <PopularCommentedTabBox :popular="category.popular" :commented="category.commented" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import get from 'lodash.get'

import Bubble from '~/components/atoms/Sections/Bubble'
import PostTile from '~/components/blocks/Post/PostTile'
import PopularCommentedTabBox from '~/components/blocks/Post/PopularCommentedTabBox'

export default {
  name: 'Splash',
  components: { Bubble, PostTile, PopularCommentedTabBox },
  props: {
    category: {
      type: Object,
      required: true
    }
  },
  data: () => ({}),
  computed: {
    style () {
      const style = {
        background: get(this.category, 'meta.color', '')
      }

      const backgroundImage = get(this.category, 'meta.background', '')

      if (backgroundImage) {
        style.background = `${style.background} url(${backgroundImage}) no-repeat center center`
        style.backgroundSize = 'cover'
      }

      return style
    }
  }
}
</script>
<style lang="scss" scoped>
.c-splash {
  @apply text-center flex flex-col items-center justify-center mb-10;

  background-color: theme('colors.black');
  height: 100vh;
  min-height: 500px;
  margin-top: -4.375rem;
  padding-top: theme('sizes.base');

  &__title {
    @apply text-white;
  }
}
.p-section-1-4 {
  @apply text-left;
}
.p-section-1-4__aside {
  @apply text-white;
  grid-row: 1 / span 2;
  grid-column: 4;
}
</style>
