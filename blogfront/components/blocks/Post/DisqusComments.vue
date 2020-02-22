<template>
  <div class="comments">
    <no-ssr>
      <vue-disqus shortname="antywebpl" :identifier="String(post.id)" />
    </no-ssr>
  </div>
</template>

<script>
export default {
  name: 'DisqusComments',
  props: {
    post: {
      type: Object,
      required: true
    }
  },
  data: () => ({}),
  computed: {}
}
</script>

<style lang="scss" scoped>
.comments {
  @apply mx-auto py-10;
  max-width: 58rem;
}
</style>
