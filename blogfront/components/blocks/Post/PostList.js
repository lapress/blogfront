import collect from 'collect.js'

export default {
  computed: {
    chunks () {
      return collect(this.posts).chunk(9).toArray()
    },
    hasMoreToLoad () {
      return this.posts.length < this.count
    }
  },
  methods: {
    async loadPosts () {
      this.$store.dispatch('ui/startLoading')
      const start = this.posts.length

      await this.list({ slug: this.$route.params.slug, append: true, start })
        .then(() => this.$store.dispatch('ui/finishLoading'))
        .catch((e) => {
          this.$store.dispatch('ui/finishLoading')
          // eslint-disable-next-line no-console
          console.log(e)
        })
    }
  }
}
