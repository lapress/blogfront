<template>
  <div class="container">
    <Banner v-if="unit" :unit="unit" />
  </div>
</template>

<script>
import Module from './Module'
import Banner from '~/components/blocks/Google/Banner'

export default {
  name: 'BannerModule',
  components: { Banner },
  mixins: [Module],
  computed: {
    unit () {
      // fixme
      return false
    }
  }
}
</script>
