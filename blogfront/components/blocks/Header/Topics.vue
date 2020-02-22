<template>
  <li @mouseover="showSubmenu" @mouseleave="hideSubmenu">
    <NavigationItem class="nav-item" :item="item" show-caret />
    <transition name="slide">
      <div v-show="show" class="submenu">
        <div class="submenu__column submenu__column--border">
          <h3 class="submenu-column-title">
            Blogi
          </h3>
          <TopicColumnMenu :items="blogs" />
        </div>
        <div class="submenu__column submenu__column--border">
          <h3 class="submenu-column-title invisible">
            Marki
          </h3>
          <TopicColumnMenu :items="brands" />
        </div>
        <div class="submenu__column submenu__column--border">
          <h3 class="submenu-column-title">
            Sprzęt
          </h3>
          <TopicColumnMenu :items="hardware" />
        </div>
        <div class="submenu__column submenu__column--border">
          <h3 class="submenu-column-title">
            Platformy
          </h3>
          <TopicColumnMenu :items="platforms" />
        </div>
        <div class="submenu__column">
          <h3 class="submenu-column-title">
            Pozostłe
          </h3>
          <TopicColumnMenu :items="other" />
        </div>
      </div>
    </transition>
  </li>
</template>

<script>
import { mapGetters } from 'vuex'

import TopicColumnMenu from '~/components/blocks/Header/TopicColumnMenu'
import NavigationItem from '~/components/atoms/NavigationItem'

export default {
  name: 'Topics',
  components: { NavigationItem, TopicColumnMenu },
  props: {
    item: {
      type: Object,
      default: () => ({})
    }
  },
  data: () => ({
    show: false
  }),

  computed: {
    ...mapGetters('ui', ['getMenuItems']),
    blogs () {
      return this.getMenuItems('top:blogs')
    },
    platforms () {
      return this.getMenuItems('top:platforms')
    },
    hardware () {
      return this.getMenuItems('top:hardware')
    },
    brands () {
      return this.getMenuItems('top:brands')
    },
    other () {
      return this.getMenuItems('top:other')
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
.submenu {
  @apply flex p-0;

  &__column {
    @apply p-6 px-10;

    &--border {
      border-right: 1px solid theme('colors.grey.lightest')
    }
  }
}
.submenu-column-title {
  @apply text-grey mb-4;
}
</style>
