<template>
  <div class="tab-box">
    <div class="tab-box__header">
      <button class="tab-trigger" :class="{'tab-trigger--active': active === 'popular'}" @click.prevent="setActive('popular')">
        Popularne
      </button>
      <button class="tab-trigger" :class="{'tab-trigger--active': active === 'commented'}" @click.prevent="setActive('commented')">
        Komentowane
      </button>
    </div>
    <div class="tab-box__content">
      <component :is="tabItemComponentName" v-for="post in posts" :key="post.id" :post="post" />
    </div>
  </div>
</template>

<script>
import PopularTabLineItem from '~/components/atoms/Post/PopularTabLineItem'
import CommentedTabLineItem from '~/components/atoms/Post/CommentedTabLineItem'
export default {
  name: 'PopularCommentedTabBox',
  components: { PopularTabLineItem, CommentedTabLineItem },
  props: {
    popular: {
      type: Array,
      required: true
    },
    commented: {
      type: Array,
      required: true
    }
  },
  data: () => ({
    active: 'popular'
  }),
  computed: {
    posts () {
      return this[this.active]
    },
    tabItemComponentName () {
      if (this.active === 'commented') {
        return 'CommentedTabLineItem'
      }
      return 'PopularTabLineItem'
    }
  },
  methods: {
    setActive (active) {
      this.active = active
    }
  }
}
</script>

<style lang="scss" scoped>
.tab-box {
  @screen md {
    @apply pl-6;
  }

  &__header {
    @apply mb-2;
  }
}

.tab-trigger {
  @apply bg-grey-dark text-white font-semibold inline px-2 leading-normal mr-2 cursor-pointer;

  &--active {
    @apply bg-white text-black;
  }
}
</style>
