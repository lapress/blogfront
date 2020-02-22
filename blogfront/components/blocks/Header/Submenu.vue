<template>
  <div class="submenu">
    <div class="submenu__inner">
      <ul class="s-nav">
        <li v-for="(item, index) in items" :key="index" class="s-nav__item">
          <NavigationItem class="s-nav-item" :item="item" />
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import NavigationItem from '~/components/atoms/NavigationItem'

export default {
  name: 'Submenu',
  components: { NavigationItem },
  props: {
    items: {
      type: Array,
      default: () => []
    }
  }
}
</script>
