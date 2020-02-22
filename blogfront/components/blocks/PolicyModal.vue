<template>
  <div class="modal-wprapper">
    <div class="modal" />
  </div>
</template>

<script>
export default {
  name: 'PolicyModal',
  data: () => ({}),
  computed: {}
}
</script>
<style lang="scss" scoped>
.modal-wprapper {
  @apply fixed inset-0 z-50 flex items-center;

  &__blur {
    @apply absolute inset-0;
    filter: blur(4px);
  }
}
</style>
