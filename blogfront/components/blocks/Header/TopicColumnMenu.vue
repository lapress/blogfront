<template>
  <ul class="s-col-menu">
    <li v-for="(_item, index) in items" :key="index" class="s-col-menu__item">
      <NavigationItem class="s-col-menu-item" :item="_item" />
    </li>
  </ul>
</template>

<script>
import NavigationItem from '~/components/atoms/NavigationItem'

export default {
  name: 'TopicColumnMenu',
  components: { NavigationItem },
  props: {
    items: {
      type: Array,
      default: () => []
    }
  },
  data: () => ({}),
  computed: {}
}
</script>
<style lang="scss" scoped>
.s-col-menu-item {
  @apply text-black text-lg leading-loose font-semibold py-1 block;

  white-space: nowrap;
}
</style>
