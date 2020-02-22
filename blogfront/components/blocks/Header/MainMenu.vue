<template>
  <nav class="nav">
    <ul class="nav-list">
      <Topics v-if="topics" :item="topics" class="nav-list__item" />
      <Feuilletons v-if="feuilletons" :item="feuilletons" class="nav-list__item" />
      <NavigationListItem v-for="(item,index) in menuItems" :key="index" class="nav-list__item" :item="item" />
    </ul>
  </nav>
</template>

<script>
import { mapGetters } from 'vuex'

import NavigationListItem from '~/components/atoms/NavigationListItem'

const Topics = () => import(/* webpackChunkName: "lp-menu-topics"  */'./Topics')
const Feuilletons = () => import(/* webpackChunkName: "lp-menu-feuilletons"  */'./Feuilletons')

export default {
  name: 'MainMenu',
  components: { NavigationListItem, Feuilletons, Topics },

  computed: {
    ...mapGetters('ui', ['getMenu']),
    items () {
      return this.getMenu('primary').items
    },
    topics () {
      return this.items.find(item => item.anchor === 'Tematy')
    },
    feuilletons () {
      return this.items.find(item => item.anchor === 'Felietony')
    },
    menuItems () {
      return this.items.filter(item => !(['Tematy', 'Felietony'].includes(item.anchor)))
    }
  }
}
</script>
