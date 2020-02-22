<template>
  <div class="footer__authors">
    <div class="container">
      <div class="authors-lead">
        <p class="authors-lead__heading">
          ANTYWEB DREAM TEAM dziękuje za uwagę!
        </p>
        <p class="authors-lead__cta">
          <nuxt-link to="/about" class="authors-lead__btn">
            Dowiedz się o nas więcej
          </nuxt-link>
        </p>
      </div>

      <div class="authors">
        <Tile v-for="author in authors" :key="author.key" :author="author" />
      </div>
    </div>
  </div>
</template>

<script>
import config from 'config'
import Tile from '~/components/atoms/Author/Tile'

export default {
  name: 'Authors',
  components: { Tile },

  computed: {
    authors () {
      return config.entities.author.data
    }
  }
}
</script>

<style lang="scss" scoped>
.footer__authors {
  @apply py-20 hidden;

  background: theme('colors.grey.lighter') url(~assets/images/bg-footer.jpg) no-repeat center bottom;

  @screen md {
    @apply block;
  }
}

.authors {
  @apply flex;

  justify-content: space-evenly;

  &-lead {
    @apply text-center;

    &__heading {
      @apply text-3xl mb-4;
    }

    &__btn {
      @apply text-lg font-medium;
    }
  }
}
</style>
