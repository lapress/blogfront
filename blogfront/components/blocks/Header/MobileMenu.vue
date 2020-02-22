<template>
  <div class="m-hamburger">
    <aButton v-show="!show" class="cta-btn" @click.native="toggleMobileMenu">
      <HamburgerSvg :width="24" :height="24" />
    </aButton>
    <aButton v-show="show" class="cta-btn" @click.native="toggleMobileMenu">
      x
    </aButton>
    <portal v-if="show" to="header.after">
      <nav class="m-menu">
        <ul class="m-nav">
          <li v-for="(item, index) in items" :key="index">
            <NavigationItem class="nav-item m-nav-item" :item="item" />
            <ul v-if="item.items.length" class="m-nav__submenu">
              <li v-for="(child, i) in item.items" :key="i">
                <NavigationItem class="m-nav-item m-nav-subitem" :item="child" />
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </portal>
  </div>
</template>

<script>
import { mapActions, mapState, mapGetters } from 'vuex'

import config from 'config'
import { HamburgerSvg } from '~/assets/images/icons'
import NavigationItem from '~/components/atoms/NavigationItem'
import aButton from '~/components/atoms/Button'

export default {
  name: 'MobileMenu',
  components: { HamburgerSvg, aButton, NavigationItem },
  data: () => ({
    view: 'menu'
  }),
  computed: {
    ...mapGetters('ui', ['menu']),
    ...mapState('ui', {
      show: 'isMobileMenuOpened',
      showSearch: 'isSearchOpened'
    }),
    items () {
      return this.menu(config.ui.menus.mobile)
    }
  },
  async mounted () {
    if (!this.menu(config.ui.menus.mobile)) {
      await this.fetchMenu(config.ui.menus.mobile).catch((e) => {
        // eslint-disable-next-line no-console
        console.log(e)
      })
    }
  },
  methods: {
    ...mapActions('ui', ['toggleMobileMenu', 'toggleSearch']),
    ...mapActions('ui', ['fetchMenu']),
    switchView (view) {
      this.view = view
    },
    isView (view) {
      return this.view === view
    }
  },
  async serverPrefetch () {
    await this.fetchMenu(config.ui.menus.mobile).catch((e) => {
      // eslint-disable-next-line no-console
      console.log(e)
    })
  }
}
</script>

<style lang="scss" scoped>
.cta-btn {
  @apply self-stretch px-0 justify-center text-white;

  width: 3.5rem;
}

.m-hamburger {
  @apply flex items-stretch ml-auto mr-4;
}

.m-menu {
  @apply bg-black;

  min-height: 50vh;
}

.m-nav {
  @apply pt-4;
  &-item {
    @apply px-4 py-2 block text-sm text-white;
  }

  &__submenu {
    @apply pl-4;
  }

  &-subitem {
    opacity: .6
  }
}

.router-btn {
  @apply bg-transparent border-0 flex items-center px-4 w-full text-white;

  border-bottom: 1px solid theme('colors.gray.400');
  height: theme('sizes.button.big');

  &__icon {
    height: 1rem;
  }
}
</style>
