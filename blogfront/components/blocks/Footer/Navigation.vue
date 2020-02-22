<template>
  <ul class="f-nav">
    <li v-for="(item, index) in items" :key="index">
      <NavigationItem class="nav-item f-nav-item" :item="item" />
    </li>
  </ul>
</template>

<script>
import NavigationItem from '~/components/atoms/NavigationItem'
export default {
  name: 'Navigation',
  components: { NavigationItem },
  props: {
    items: {
      type: Array,
      default: () => []
    }
  }
}
</script>
<style lang="scss" scoped>
.f-nav {
  @screen md {
    @apply flex items-center;
  }

  &-item {
    @apply text-xl mb-6;

    @screen md {
      @apply pr-0 pl-5 mb-0 text-base;
    }
  }
}
</style>
