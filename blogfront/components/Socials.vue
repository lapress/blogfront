<template>
  <div class="socials">
    <a :href="facebookUrl" target="_blank" class="social-icon" :class="{ 'social-icon--black': post }"><FacebookSvg /></a>
    <a v-if="!post" :href="instagramUrl" target="_blank" class="social-icon"><InstagramSvg /></a>
    <a :href="twitterUrl" class="social-icon" target="_blank" :class="{ 'social-icon--black': post }"><TwitterSvg /></a>
    <a v-if="!post" :href="youtubeUrl" target="_blank" class="social-icon"><YoutubeSvg /></a>
  </div>
</template>

<script>
import config from 'config'
import { FacebookSvg, InstagramSvg, TwitterSvg, YoutubeSvg } from '~/assets/images/icons'

export default {
  name: 'Socials',
  components: {
    FacebookSvg, InstagramSvg, TwitterSvg, YoutubeSvg
  },
  props: {
    url: {
      type: String,
      default: ''
    },
    post: Boolean
  },
  computed: {
    facebookUrl () {
      return config.socials.facebookUrl
    },
    instagramUrl () {
      return config.socials.instagramUrl
    },
    twitterUrl () {
      return config.socials.twitterUrl
    },
    youtubeUrl () {
      return config.socials.youtubeUrl
    }
  }
}
</script>
