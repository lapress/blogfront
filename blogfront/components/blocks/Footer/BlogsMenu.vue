<template>
  <div class="footer__bar">
    <div class="container">
      <ul class="b-nav">
        <li class="b-nav__intro">
          Blogi:
        </li>
        <li v-for="(item, index) in items" :key="index">
          <NavigationItem class="nav-item b-nav__item" :item="item" />
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import NavigationItem from '~/components/atoms/NavigationItem'
export default {
  name: 'BlogsMenu',
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
.footer__bar {
  @apply py-6 hidden;

  border-top: 1px solid theme('colors.grey.lighter');

  @screen md {
    @apply block;
  }
}
.b-nav {
  @apply flex items-center;

  &__intro {
    @apply text-primary text-lg font-semibold;
  }

  &__item {
    @apply text-secondary text-lg;
  }
}
</style>
