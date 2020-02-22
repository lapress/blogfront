<template>
  <header ref="header" class="header" :class="{'header--transparent': isHeaderTransparent}">
    <div class="header__logo" :class="{'header__logo--borderless': isHeaderTransparent}">
      <Logo v-show="showLogo" />
    </div>

    <MainMenu v-if="!$device.isMobile" />
    <Search />
    <Socials />
    <MobileMenu v-if="$device.isMobile" />
  </header>
</template>

<script>
import { mapState, mapGetters } from 'vuex'
import inViewport from 'in-viewport'

const Logo = () => import('~/components/Logo.vue')
const Search = () => import('./Search')
const MainMenu = () => import('./MainMenu')
const Socials = () => import('./Socials')
const MobileMenu = () => import('./MobileMenu')

export default {
  name: 'Header',
  components: {
    Logo,
    Search,
    MainMenu,
    MobileMenu,
    Socials
  },
  data: () => ({
    visible: true
  }),
  computed: {
    ...mapState('ui', ['isSearchOpened']),
    ...mapGetters('ui', ['isHeaderTransparent']),

    showLogo () {
      if (!this.$device.isMobile) {
        return true
      }

      return !this.isSearchOpened
    }
  },
  watch: {
    visible (visible) {
      this.$store.dispatch('event/fire', {
        event: 'header-visibility-change',
        payload: visible
      })
    }
  },
  beforeDestroy () {
    this.$nextTick(() => {
      window.removeEventListener('scroll', this.handleScroll)
    })
  },
  mounted () {
    window.addEventListener('scroll', this.handleScroll, { passive: true })
  },
  methods: {
    handleScroll () {
      this.visible = inViewport(this.$refs.header)
    }
  }
}
</script>
<style lang="scss" scoped>
.header {
  @apply bg-black flex items-center relative z-20;

  height: theme('sizes.base');

  &--transparent {
    @apply bg-transparent;
  }

  &__logo {
    @apply self-stretch flex items-center mr-4 pl-4;

    @screen md {
      @apply pl-12;
      border-right: 1px solid theme('colors.grey.dark');
    }

    &--borderless {
      border-color: transparent;
    }
  }
}
</style>
