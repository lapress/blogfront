<template>
  <div class="container">
    <div class="p-section-1-4">
      <header class="p-section-1-4__header">
        <Bubble text="Antyweb TV" />
      </header>
      <div class="p-section-1-4__posts">
        <PostTile :post="posts[0]" class="p-section-1-4__post-1" />
        <PostTile v-for="index in 4" :key="posts[index].id" :post="posts[index]" />
      </div>
    </div>
  </div>
</template>

<script>
import Module from './Module'
import Bubble from '~/components/atoms/Sections/Bubble'
import PostTile from '~/components/blocks/Post/PostTile'

export default {
  name: 'AntywebTvModule',
  components: { Bubble, PostTile },
  mixins: [Module]
}
</script>
