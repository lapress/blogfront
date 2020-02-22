<template>
  <ul class="breadcrumbs">
    <li class="breadcrumb-item">
      <nuxt-link to="/" class="breadcrumb-item__link" v-text="home" />
    </li>
    <li v-for="(route, index) in routes" :key="index" class="breadcrumb-item breadcrumb-item--inner">
      <nuxt-link :to="route.path" class="breadcrumb-item__link" v-text="route.name" />
    </li>
    <li class="breadcrumb-item breadcrumb-item--active" v-text="active" />
  </ul>
</template>

<script>
import config from 'config'

export default {
  name: 'Breadcrumbs',
  props: {
    routes: {
      type: Array,
      default: () => []
    },
    active: {
      type: String,
      default: null
    }
  },
  computed: {
    home () {
      return config.app.name
    }
  },
  methods: {}
}
</script>

<style lang="scss" scoped>
.breadcrumbs {
  @apply flex items-center opacity-75;
  margin-bottom: 1.75rem;

  &:hover {
    @apply opacity-100;
  }
}

.breadcrumb-item {
  @apply text-black text-sm;

  line-height: 1rem;

  &__link {
    @apply text-grey-darker;
  }

  &--active {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  &--inner {
    @media screen and (max-width: 756px) {
      @apply hidden;
    }
  }

  a {
    @apply flex items-center;

    &:after {
      @apply inline-block mx-2;
      content: '\00BB'
    }
  }
}

</style>
