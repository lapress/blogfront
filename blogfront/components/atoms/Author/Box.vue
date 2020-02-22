<template>
  <div ref="box" class="author-box">
    <router-link :to="authorLink">
      <img class="author-box__avatar" :src="authorDetails.avatar" :alt="authorDetails.name">
      <span v-if="label" class="author-box__label" v-text="label" />
      <strong class="author-box__name" v-text="author.name" />
      <span class="author-box__desc" v-text="description" />
      <transition name="fade">
        <span v-show="!show" class="author-box__desc-trigger" @click.prevent="unfold">więcej</span>
      </transition>
    </router-link>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
import { authorRoute } from '~/utils/url'

const LIMIT = 75

export default {
  name: 'Box',
  props: {
    author: {
      type: Object,
      required: true
    },
    label: {
      type: String,
      default: null
    }
  },
  data: () => ({
    show: false
  }),
  computed: {
    ...mapGetters('author', {
      authorDetails: 'current'
    }),
    authorLink () {
      return authorRoute(this.author)
    },
    description () {
      const desc = this.authorDetails.description

      if (!desc || this.show || desc.length <= LIMIT) {
        return desc
      }

      return desc.substring(0, LIMIT) + '...'
    }
  },
  async mounted () {
    if (!this.authorDetails || this.authorDetails.key !== this.author.key) {
      await this.fetch(this.author.key)
    }

    await this.$emit('resize', this.$refs.box.offsetHeight)
  },
  async serverPrefetch () {
    await this.fetch(this.author.key)
  },
  methods: {
    ...mapActions('author', ['fetch']),
    unfold () {
      this.show = true

      this.$nextTick(() => {
        this.$emit('resize', this.$refs.box.offsetHeight)
      })
    }
  }
}
</script>
<style lang="scss" scoped>
.author-box {
  @screen md {
    @apply text-center;
    width: 20rem;
  }

  &__avatar {
    @apply rounded-full block mx-auto mb-4;
  }

  &__label {
    @apply block text-xl text-black mb-4 font-bold;
  }

  &__name {
    @apply block text-3xl mb-4 font-bold;
  }

  &__desc {
    @apply block text-lg text-grey leading-normal font-semibold mb-4;
  }

  &__desc-trigger {
    @apply block text-center text-lg font-bold;
  }
}
</style>
