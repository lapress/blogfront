<template>
  <div ref="grid" class="grid">
    <Tile :post="posts[0]" :width="3" :color="color()" />
    <Tile :post="posts[1]" :color="color()" />
    <Tile :post="posts[2]" :width="3" :color="color()" />
    <Tile :post="posts[3]" :color="color()" />
    <Tile :post="posts[4]" :width="4" :color="color()" />
    <Tile :post="posts[5]" :color="color()" />
  </div>
</template>

<script>
import Tile from './Grid/Tile'
import Section from './Section'

export default {
  name: 'Grid',
  components: { Tile },
  mixins: [Section],
  data: () => ({
  }),
  computed: {

  },
  mounted () {
    // this.$refs.grid.style.height = `${window.innerHeight - 70}px`
  },
  methods: {
    color () {
      const letters = '0123456789ABCDEF'
      let color = '#'
      for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)]
      }
      return color
    }
  }
}
</script>

<style lang="scss" scoped>
.grid {
  @apply bg-grey-light p-8 mb-medium;

  display: grid;
  grid-gap: 2rem;
  grid-template-columns:  repeat(8, 1fr);
  grid-template-rows: repeat( 4, 1fr);

  height: calc(100vh - theme('sizes.base'));
}

// test data

</style>
