<template>
  <transition name="slide">
    <router-link v-show="show" to="/" class="home-cta">
      <span class="home-cta__icon"><ChevronLeftSvg /></span>
      <span class="home-cta__right">
        <span class="home-cta__text">Przejdź do</span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 180 23" width="120" height="16">
          <path fill="#fff" fill-rule="evenodd" d="M179.06 9.406a2.52 2.52 0 0 1-.385.778c-.19.27-.446.523-.768.759-.324.237-.74.422-1.252.556v.07c1.101.111 1.935.447 2.498 1 .564.554.846 1.136.846 1.744l-.012 4.807c0 .495-.116.974-.345 1.436a3.688 3.688 0 0 1-1.012 1.238c-.444.359-.982.65-1.617.876-.63.223-1.35.325-2.158.324h-15.532l.003-3.104h3.31l.033-16.67-3.305-.004.005-3.112 6.133.008 1.085 1.289c.134.18.338.269.608.271.24 0 .548-.083.926-.251.377-.17.816-.362 1.313-.575a13.29 13.29 0 0 1 1.637-.572 6.946 6.946 0 0 1 1.936-.251h.445c1.99.002 3.44.432 4.355 1.293.91.855 1.366 1.94 1.364 3.248V8.83c0 .135-.033.327-.103.575m-4.467-5.727c-.28-.292-.678-.44-1.189-.442l-4.76-.007c-.513-.003-.943.145-1.295.44-.35.291-.524.656-.522 1.082l-.013 5.244 6.534.01c.541 0 .95-.146 1.232-.439.284-.293.426-.595.426-.912l.01-3.892c0-.427-.14-.79-.423-1.084m.787 9.832c-.306-.26-.69-.39-1.148-.39l-7.425-.012-.013 6.781h7.424c.457 0 .84-.13 1.15-.389.31-.259.466-.58.466-.965l.001-4.059c0-.385-.154-.706-.464-.966m-22.03 9.366h-17.43l.005-3.035h3.327V3.181h-3.29l.006-3.188h16.945c.538.002.96.231 1.27.492.308.26.464.581.462.966l-.006 3.315c0 .361-.143.653-.427.88-.283.224-.652.336-1.11.336l-2.622-.007.005-2.794h-7.078v6.78l6.74.007-.005 3.118-6.735-.01v6.765h7.568l.006-2.457 4.15.005v4.233c0 .383-.166.705-.489.964-.325.26-.755.292-1.292.29M130.32 3.172l-5.326 18.03c-.162.567-.46.994-.89 1.286a2.451 2.451 0 0 1-1.41.438l-1.133-.003c-.377 0-.698-.06-.968-.187a3.144 3.144 0 0 1-.704-.442 2.142 2.142 0 0 1-.483-.558 2.656 2.656 0 0 1-.26-.543l-3.168-9.786c-.136.474-3.127 9.776-3.127 9.776-.057.16-.143.341-.265.544-.12.203-.28.39-.484.557-.203.17-.446.317-.728.437a2.265 2.265 0 0 1-.947.186h-1.132c-.51 0-.979-.149-1.409-.442-.43-.294-.726-.722-.886-1.287l-5.248-18.05-5.728-.009L89.22 11.4v8.36l3.298.004-.006 3.109h-10.77l.004-3.126 3.317.005v-8.358l-6.75-8.301-2.26-.003-.004 1.624c0 .248-.143.502-.425.759-.283.26-.654.376-1.11.376h-2.62V3.084l-4.533-.007v16.649l3.291.006-.007 3.141H59.873l.006-3.157 3.325.005V3.069l-4.5-.003-.007 2.783h-4.155l.01-4.551c0-.383.157-.705.467-.965.308-.257.68-.344 1.11-.343h28.605l-.008 3.113-1.816-.002 4.227 5.149 4.247-5.137-1.815-.003.006-3.12h19.08l-.007 3.148-2.663-.004 4.04 15.98c.161-.587 3.655-11.366 3.655-11.366.243-.677.796-1.014 1.656-1.013l1.372.003c.86 0 1.412.339 1.652 1.016 0 0 3.448 10.79 3.608 11.376l4.108-15.967-2.665-.003.008-3.17h10.571l-.005 3.186-3.67-.007m-80.59-.119v18.412c-.003.384-.184.707-.508.964-.322.261-.713.39-1.17.388H47.2c-.43 0-.78-.097-1.049-.289a2.976 2.976 0 0 1-.724-.762L34.914 6.954v12.725l2.57.005-.007 3.189h-10.05l.005-3.204 3.327.004V3.024l-3.29-.006.006-3.03h6.092c.671 0 1.17.162 1.491.637l10.513 14.803V3.043l-2.57-.002.006-3.053h10.05l-.008 3.066-3.326-.006m-33.23 19.823l.007-3.219 1.855.003-1.163-3.287-8.916-.012-1.178 3.28 1.853.003v3.232H-.008l.006-3.246 3.066.005L8.95 2.99l-3.63-.005.006-2.997H14c.62 0 1.235.099 1.517.38.282.284.324.556.456.939l6.418 18.351 3.066.005-.006 3.208h-8.957M12.701 3.028c-.217.723-3.33 10.216-3.33 10.216l6.737.011-3.407-10.227" />
        </svg>
      </span>
    </router-link>
  </transition>
</template>

<script>
import { ChevronLeftSvg } from '~/assets/images/icons'

export default {
  name: 'BackToHomePage',
  components: { ChevronLeftSvg },
  data: () => ({
    show: false
  }),
  mounted () {
    // this.$store.dispatch('event/listen', {
    //   event: 'header-visibility-change',
    //   callback: (visible) => {
    //     this.show = !visible
    //   }
    // })
  }
}
</script>
<style lang="scss" scoped>
.home-cta {
  @apply fixed bg-black text-grey-light z-10 flex items-center;

  @screen mobile {
    @apply bottom-0 right-0 left-0;
  }

  @screen md {
    @apply fixed top-0  pr-10 pl-5 ml-12 py-2;
  }

  &__right {
    @screen mobile {
      @apply flex items-center;
    }
  }

  &__icon {
    @apply pr-4 pl-4 bg-secondary inline-flex items-center py-2 mr-4;
    @screen md {
      @apply ml-0 bg-transparent;
    }
  }

  &__text {
    @apply block text-xs pb-1 font-medium mr-4;

    @screen md {
      @apply mr-0;
    }
  }
}
</style>
