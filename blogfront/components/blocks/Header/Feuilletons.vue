<template>
  <li @mouseover="showSubmenu" @mouseleave="hideSubmenu">
    <NavigationItem ref="trigger" class="nav-item" :item="item" show-caret />

    <transition name="slide">
      <div v-show="show" ref="popper" class="submenu">
        <div class="submenu__inner">
          <h3 class="feuilleton-authors-title">
            Autorzy Antyweb
          </h3>
          <div class="feuilleton-authors">
            <FuellietonCard v-for="author in authors" :key="author.key" :author="author" />
          </div>
        </div>
      </div>
    </transition>
  </li>
</template>

<script>
// import Popper from 'popper.js'
import config from 'config'

import FuellietonCard from '~/components/atoms/Author/FuellietonCard'
import NavigationItem from '~/components/atoms/NavigationItem'

export default {
  name: 'Feuilletons',
  components: { FuellietonCard, NavigationItem },
  props: {
    item: {
      type: Object,
      default: () => ({})
    }
  },
  data: () => ({
    show: false,
    popper: null
  }),

  computed: {
    authors () {
      return config.entities.author.data
    }
  },

  methods: {
    hasChildren (item) {
      return Boolean(item.items.length)
    },
    showSubmenu () {
      this.show = true
    },
    hideSubmenu () {
      this.show = false
    }
  }
}
</script>
<style lang="scss" scoped>
.feuilleton-authors {
  display: grid;
  grid-template-columns: repeat(4, 16rem);
  grid-template-rows: repeat(2, 1fr);
  grid-gap: 1rem;
}
.feuilleton-authors-title {
  @apply text-grey mb-4;
}
</style>
