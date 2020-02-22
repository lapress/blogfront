<template>
  <div class="paginator">
    <AButton
      size="big"
      type="black"
      class="paginator__btn"
      wide
      :loading="loading"
      @click.native="$emit('load')"
    >
      Pokaż więcej
    </AButton>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import AButton from '~/components/atoms/Button'
export default {
  name: 'Paginator',
  components: { AButton },
  data: () => ({}),
  computed: {
    ...mapGetters('ui', ['loading'])
  }
}
</script>
