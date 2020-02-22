<script>
import CategoryLabel from './CategoryLabel'
export default {
  name: 'CategoryTag',
  extends: CategoryLabel,
  data: () => ({}),
  computed: {},
  methods: {}
}
</script>

<style lang="scss" scoped>
.c-label {
  @apply bg-grey-light font-semibold text-white px-2 leading-normal mr-2 hidden;

  @screen md {
    @apply inline;
  }

  &:hover {
    @apply bg-primary;
  }
}
</style>
