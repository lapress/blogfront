<template>
  <div>
    <portal-target name="header.before" slim />
    <Header />
    <BackToHomePage v-if="!isHomePage" />
    <portal-target name="header.after" slim />
    <nuxt v-if="!isMobileMenuOpened" />
    <portal-target name="footer.before" slim />
    <Footer />
    <portal-target name="footer.after" slim />
  </div>
</template>
<script>
import { mapState } from 'vuex'

import Header from '~/components/blocks/Header/Header.vue'
import Footer from '~/components/blocks/Footer/Footer.vue'
const BackToHomePage = () => import(/* webpackChunkName: "lp-back-to-home" */'~/components/atoms/BackToHomePage')

export default {
  components: {
    BackToHomePage,
    Header,
    Footer
  },
  async asyncData () {
    // primary menu
    // footer menu
    // authors menu
  },
  computed: {
    ...mapState('ui', ['isMobileMenuOpened']),
    isMobileMenuOpened () {
      return false
    },
    isHomePage () {
      return this.$route.name === 'index'
    }
  }
}
</script>
