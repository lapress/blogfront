<template>
  <div class="select" @mouseover="showDropdown" @mouseleave="hideDropdown">
    <div class="select__label">
      {{ title }} <i class="caret caret--white" />
    </div>
    <transition name="slide">
      <div v-show="show" class="dropdown">
        <ul class="dropdown-list">
          <li v-for="(heading, key) in headings" :key="key" class="dropdown-list__item">
            <button class="dropdown-item" :class="{ 'dropdown-item--active' : key === active }" @click.prevent="setActive(key)" v-text="heading" />
          </li>
        </ul>
      </div>
    </transition>
  </div>
</template>

<script>
export const HEADINGS = {
  new: 'Najnowsze',
  popular: 'Popularne',
  commented: 'Komentowane'
}
export default {
  name: 'TopSelector',
  props: {
    active: {
      type: String,
      default: 'new'
    }
  },
  data: () => ({
    show: false
  }),
  computed: {
    title () {
      return HEADINGS[this.active]
    },
    headings () {
      return HEADINGS
    }
  },
  methods: {
    showDropdown () {
      this.show = true
    },
    hideDropdown () {
      this.show = false
    },
    setActive (key) {
      this.$emit('change', key)
    }
  }
}
</script>
<style lang="scss" scoped>
.select {
  @apply relative;

  &__label {
    @apply bg-secondary text-white flex items-center justify-between h-10 px-5 font-semibold text-lg;

    width: 10.5rem;
  }
}
.dropdown {
  @apply pt-2 absolute w-full;

  &-list{
    @apply bg-black;
  }

  &-item {
    @apply border-0 text-white font-semibold text-lg px-4 py-2 w-full text-left leading-normal cursor-pointer;

    border-bottom: 1px solid theme('colors.grey.dark');

    &:hover {
      @apply bg-grey-darker;
    }

    &--active {
      @apply text-secondary;
    }
  }
}
</style>
