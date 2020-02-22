<template>
  <div class="grid-row" :class="{'grid-row--inverse': inverse}">
    <div v-if="!inverse && posts[0]" class="grid-row__column--left">
      <PostItem :post="posts[0]" :size="sizeBig" />
      <div class="ad-placeholder">
        Ad placeholder
        <div>850x200</div>
      </div>
    </div>

    <div class="grid-row__column">
      <PostItem v-if="posts[inverse ? 0 : 1]" :post="posts[inverse ? 0 : 1]" />
      <PostItem v-if="posts[inverse ? 1 : 2]" :post="posts[inverse ? 1 : 2]" />
    </div>
    <div v-if="inverse && posts[2]" class="grid-row__column--right">
      <PostItem :post="posts[2]" :size="sizeBig" />
      <div class="ad-placeholder">
        Ad placeholder
        <div>850x200</div>
      </div>
    </div>
  </div>
</template>

<script>
import PostItem, { SIZE_DOUBLE } from '~/components/blocks/Post/Item.vue'

export default {
  name: 'GridRow',
  components: { PostItem },
  props: {
    posts: {
      type: Array,
      default: () => []
    },
    inverse: Boolean
  },
  computed: {
    sizeBig () {
      return SIZE_DOUBLE
    }
  }
}
</script>
<style lang="scss" scoped>
.grid-row {
  @apply pb-6 mb-6;

  display: grid;
  grid-gap: 1.5rem;
  grid-template-columns: 2fr 1fr;

  border-bottom: 1px solid theme('colors.grey.light');

  &--inverse {
    grid-template-columns: 1fr 2fr;
  }

  &__column {
    &--left {
      @apply pr-6;
      border-right: 1px solid theme('colors.grey.light');
    }
    &--right {
      @apply pl-6;
      border-left: 1px solid theme('colors.grey.light');
    }
  }
}
.ad-placeholder {
  @apply mt-8 bg-grey-lighter flex items-center flex-col justify-center;

  height: 200px;
}
</style>
