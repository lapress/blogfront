<template>
  <footer class="footer">
    <BlogsMenu :items="blogsMenu.items" />
    <Authors />
    <div class="footer__bottom">
      <div class="container">
        <div class="footer__row">
          <Copyright />
          <Navigation :items="footerMenu.items" />
          <Credits />
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
import { mapGetters } from 'vuex'

import Credits from './Credits'
import Copyright from './Copyright'
import Navigation from './Navigation'
import BlogsMenu from './BlogsMenu'
import Authors from './Authors'

export default {
  name: 'Footer',
  components: {
    Authors,
    BlogsMenu,
    Copyright,
    Credits,
    Navigation
  },
  computed: {
    ...mapGetters('ui', ['getMenu']),
    blogsMenu () {
      return this.getMenu('blogs')
    },
    footerMenu () {
      return this.getMenu('footer')
    }
  }
}
</script>
<style lang="scss" scoped>
.footer {
  &__row {
    @apply flex items-center;

    @screen mobile {
      @apply flex-col justify-center text-center;
    }
  }

  &__bottom {
    @apply bg-black py-6 text-sm;
  }
}
</style>
