<template>
  <div>
    test
  </div>
</template>

<script>
import { mapActions } from 'vuex'

export default {
  name: 'Show',
  async asyncData ({ route, store }) {
    // eslint-disable-next-line no-console
    await console.log('$route', route)
    await store.dispatch('category/single')
  },
  computed: {},
  methods: {
    ...mapActions('category', ['single'])
  }
}
</script>
