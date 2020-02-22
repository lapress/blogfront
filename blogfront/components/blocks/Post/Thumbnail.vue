<template>
  <figure class="post__figure">
    <img :src="src" alt="" class="post__img">
  </figure>
</template>

<script>
import { mapGetters } from 'vuex'
import { getImageSizeUrl } from '~/utils/helpers'

export default {
  name: 'Thumbnail',
  data: () => ({}),
  computed: {
    ...mapGetters('post', {
      post: 'current'
    }),
    src () {
      return getImageSizeUrl(this.post.thumbnail, 'show')
    }
  }
}
</script>
