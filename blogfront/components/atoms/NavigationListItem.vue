<template>
  <li @mouseover="showSubmenu" @mouseleave="hideSubmenu">
    <NavigationItem class="nav-item" :item="item" />
    <transition name="slide">
      <Submenu v-if="hasChildren(item)" v-show="show" :items="item.items" />
    </transition>
  </li>
</template>

<script>
import Submenu from '~/components/blocks/Header/Submenu'
import NavigationItem from '~/components/atoms/NavigationItem'

export default {
  name: 'NavigationListItem',
  components: { NavigationItem, Submenu },
  props: {
    item: {
      type: Object,
      default: () => ({})
    }
  },
  data: () => ({
    show: false
  }),

  computed: {},
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
