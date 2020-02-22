<template>
  <div class="credits">
    <span class="credits__pref">Realizacja: </span>
    <a href="//ably.pl" class="credits__link" rel="nofollow" target="_blank">
      <Ably height="15" />
    </a>
  </div>
</template>

<script>
import Ably from '~/assets/images/ably.svg'

export default {
  name: 'Credits',
  components: { Ably }
}
</script>
<style lang="scss" scoped>
.credits {
  @apply inline-flex items-center;

  @screen md {
    @apply ml-auto ;
  }

  &__pref {
    @apply text-grey;
  }
}
</style>
