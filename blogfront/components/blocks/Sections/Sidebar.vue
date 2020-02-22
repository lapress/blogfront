<template>
  <aside class="aside">
    <div class="aside__header">
      <h3 class="aside__title">
        Top
      </h3>
      <TopSelector :active="active" @change="handleTopChange" />
    </div>
    <PostLineItem v-for="post in posts[0]" :key="post.id" :post="post" />
    <PostLineItem v-for="post in posts[1]" :key="post.id" :post="post" />
  </aside>
</template>

<script>
import collect from 'collect.js'
import TopSelector from '~/components/atoms/TopSelector'
import PostLineItem from '~/components/blocks/Post/LineItem'

export default {
  name: 'Sidebar',
  components: { TopSelector, PostLineItem },
  props: {
    module: {
      type: Object,
      required: true
    }
  },
  data: () => ({
    active: 'new'
  }),
  computed: {
    posts () {
      return collect(this.module.aside[this.active]).chunk(5).toArray()
    }
  },
  methods: {
    handleTopChange (tab) {
      this.active = tab
    }
  }
}
</script>

<style lang="scss" scoped>
.aside {
  @apply bg-grey-lightest p-8;

  &__header {
    @apply flex justify-between mb-8;
  }

  &__title {
    @apply text-4xl font-semibold;
  }
}
</style>
