<template>
  <div class="container">
    <section class="section">
      <Bubble text="Motoryzacja" :color="section.color" />
      <div class="section__grid">
        <PostTile v-for="post in top" :key="post.id" :post="post" :color="section.color" />
        <PostMini v-for="post in bottom" :key="post.id" :post="post" :color="section.color" />
      </div>
    </section>
  </div>
</template>

<script>
import collect from 'collect.js'

import Section from './Section'
import Bubble from '~/components/atoms/Sections/Bubble'
import PostMini from '~/components/blocks/Post/PostMini'
import PostTile from '~/components/blocks/Post/PostTile'

export default {
  name: 'ThreeThree',
  components: { Bubble, PostMini, PostTile },
  mixins: [Section],
  props: {
    posts: {
      type: Array,
      default: () => []
    }
  },
  data: () => ({}),
  computed: {
    chunks () {
      return collect(this.posts).take(6).chunk(3).toArray()
    },
    top () {
      return this.chunks[0]
    },
    bottom () {
      return this.chunks[1]
    }
  },
  methods: {}
}
</script>
<style lang="scss" scoped>
.section {
  &__grid {
    @apply -mt-8 relative;

    display: grid;
    grid-gap: theme('spacing.10') 2px;
    grid-template-columns:  repeat(3, 1fr);
  }
}
</style>
