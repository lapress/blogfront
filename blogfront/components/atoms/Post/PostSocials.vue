<template>
  <div class="post-socials">
    <strong v-if="!hideText">Doceń i poleć nas</strong>
    <button class="social-btn social-btn--facebook">
      <FacebookSvg />
    </button>
    <button class="social-btn social-btn--twitter">
      <TwitterSvg />
    </button>
  </div>
</template>

<script>
import { FacebookSvg, TwitterSvg } from '~/assets/images/icons'

export default {
  name: 'PostSocials',
  components: { FacebookSvg, TwitterSvg },
  props: {
    post: {
      type: Object,
      required: true
    },
    hideText: Boolean
  },
  data: () => ({})
}
</script>
<style lang="scss" scoped>
.post-socials {
  @apply inline-flex items-center;
}
.social-btn {
  @apply w-10 h-10 inline-flex items-center justify-center ml-4 cursor-pointer border-0 text-white;

  transition: all .3s ease;

  &:hover {
    @apply w-16;
  }

  &--facebook {
    background: #3B5998;
  }
  &--twitter {
    background: #00ACED;
  }
}
</style>
