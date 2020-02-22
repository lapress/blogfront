<template>
  <section class="post">
    <div class="container">
      <h1 class="post-title title-1" v-text="page.title" />
      <div class="page__content">
        <VRuntimeTemplate :template="bodyTemplate" />
      </div>
    </div>
  </section>
</template>

<script>
import VRuntimeTemplate from 'v-runtime-template'
import { mapGetters } from 'vuex'
export default {
  name: 'Page',
  components: {
    VRuntimeTemplate
  },
  computed: {
    ...mapGetters('post', {
      page: 'current'
    }),
    bodyTemplate () {
      return `<div class="post__content">${this.page.body}</div>`
    }
  },
  methods: {}
}
</script>
