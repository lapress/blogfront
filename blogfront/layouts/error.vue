<template>
  <div class="page page--error">
    <div class="container">
      <div class="error-msg">
        <h1 class="h1">
          404
        </h1>
        <h2 class="h2">
          Strona której szukałeś nie istnieje
        </h2>
        <p class="message">
          Sprawdź adres strony lub przejdź na <nuxt-link to="/">
            stronę głowną
          </nuxt-link>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Error',
  // eslint-disable-next-line vue/require-prop-types
  props: ['error'],
  layout: 'default'
}
</script>

<style lang="scss" scoped>
.error-msg {
  @apply text-center mb-20;
}
.h1 {
  font-size: 8rem;
  opacity: .1;
}
.h2 {
  @apply font-bold mb-4;

  font-size: 3rem;
}
.message {
  @apply text-2xl;
}
.posts {
  &__title {
    @apply text-center mb-6;
  }
}
</style>
