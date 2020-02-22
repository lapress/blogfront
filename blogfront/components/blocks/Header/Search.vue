<template>
  <div class="search">
    <aButton class="search__trigger" size="square" type="header-icon" :class="{ 'btn--borderless' : isHeaderTransparent }" @click.native.prevent="toggleSearch">
      <SearchSvg />
    </aButton>
    <portal to="footer.after">
      <transition name="fade">
        <div v-show="isSearchOpened" class="search-modal">
          <div class="search-modal__content">
            <button class="search-modal__close-btn" @click.prevent="toggleSearch">
              <CloseSvg />
            </button>
            <input
              ref="input"
              v-model="query"
              class="search-modal__input"
              type="text"
              aria-placeholder="Wpisz szukaną frazę"
              placeholder="Wpisz szukaną frazę"
              @keydown.enter="submit"
              @keydown.esc="reset"
            >
            <transition name="fade">
              <span v-show="query" class="search-input-desc">Wciśnij enter, aby przejść na stronę z wynikami</span>
            </transition>
            <transition name="slide">
              <div v-show="posts.length" class="modal-search-results">
                <ModalSearchResultItem v-for="post in posts" :key="post.id" :post="post" @navigate="reset" />
              </div>
            </transition>
          </div>
          <div class="search-modal__overlay" />
        </div>
      </transition>
    </portal>
  </div>
</template>

<script>
import { mapState, mapActions, mapGetters } from 'vuex'

import { SearchSvg, CloseSvg } from '~/assets/images/icons'
import aButton from '~/components/atoms/Button'
const ModalSearchResultItem = () => import(/* webpackChunkName: "lp-modal-search-result-item" */'~/components/atoms/Post/ModalSearchResultItem')

export default {
  name: 'Search',
  components: {
    SearchSvg, aButton, CloseSvg, ModalSearchResultItem
  },
  data: () => ({
    query: '',
    timeout: null
  }),
  computed: {
    ...mapGetters('ui', ['isHeaderTransparent']),
    // ...mapGetters('post', ['posts']),
    ...mapState('ui', ['isSearchOpened']),
    posts () {
      return []
    }
  },
  watch: {
    query (query) {
      if (this.timeout) {
        clearTimeout(this.timeout)
      }

      this.timeout = setTimeout(() => {
        if (query) {
          this.search()
        } else {
          this.$store.dispatch('post/resetList')
        }
      }, 500)
    },
    isSearchOpened (isOpened) {
      if (isOpened) {
        this.$nextTick(() => {
          this.$refs.input.focus()
        })
      }
    }
  },
  methods: {
    ...mapActions('ui', ['toggleSearch']),
    activate () {
      if (this.folded) {
        this.folded = false
        return null
      }
    },
    reset () {
      this.query = ''
      this.toggleSearch(false)
      this.$store.dispatch('post/resetList')
    },
    submit () {
      this.toggleSearch(false)
      this.$router.push({
        name: 'szukaj',
        query: {
          s: this.query
        }
      })
    },
    async search () {
      this.$store.dispatch('ui/startLoading')
      await this.$store.dispatch('post/search', { query: this.query, start: 0 })
        .then(() => {
          this.$store.dispatch('ui/finishLoading')
        })
        .catch(() => {
          this.$store.dispatch('ui/finishLoading')
        })
    }
  }
}
</script>
<style lang="scss" scoped>
.search {
  @screen mobile {
    @apply hidden;
  }
}
.btn {
  &--borderless {
    @apply border-0;
  }
}
.search-modal {
  @apply fixed inset-0 z-50;

  &__content {
    @apply relative z-10 p-10;
  }

  &__close-btn {
    @apply text-grey-dark float-right cursor-pointer;
  }

  &__input {
    @apply bg-transparent w-full text-5xl text-white py-6;

    border: 0;
    border-bottom: 1px solid theme('colors.grey.darker');
  }

  &__overlay {
    @apply bg-black absolute inset-0;

    opacity: .98;
  }
}
.modal-search-results {
  @apply pt-10;

  @screen md {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 1.5rem 2rem;
  }
}
.search-input-desc {
  @apply text-grey block pt-2 opacity-75;
}
</style>
