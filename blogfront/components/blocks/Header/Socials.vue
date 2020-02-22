<template>
  <div class="socials">
    <aButton size="square" type="header-icon" :class="{ 'btn--borderless' : isHeaderTransparent }">
      <FacebookSvg />
    </aButton>
    <aButton size="square" type="header-icon" :class="{ 'btn--borderless' : isHeaderTransparent }">
      <TwitterSvg />
    </aButton>
    <aButton size="square" type="header-icon" :class="{ 'btn--borderless' : isHeaderTransparent }">
      <YoutubeSvg />
    </aButton>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

import aButton from '~/components/atoms/Button'
import { FacebookSvg, TwitterSvg, YoutubeSvg } from '~/assets/images/icons'

export default {
  name: 'Socials',
  components: { aButton, FacebookSvg, TwitterSvg, YoutubeSvg },
  computed: {
    ...mapGetters('ui', ['isHeaderTransparent'])
  }
}
</script>
<style lang="scss" scoped>
.socials {
  @screen mobile {
    @apply hidden;
  }
}
.btn {
  &--borderless {
    border-color: transparent;
  }
}
</style>
