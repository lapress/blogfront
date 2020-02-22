<template>
  <div :class="className">
    <div v-for="n in lines" :key="n" :class="`${className}__line`" />
  </div>
</template>

<script>
export default {
  name: 'ContentPlaceholdersText',
  props: {
    lines: {
      type: Number,
      default: 4
    }
  },
  data () {
    return {
      className: 'vue-content-placeholders-text'
    }
  }
}
</script>
