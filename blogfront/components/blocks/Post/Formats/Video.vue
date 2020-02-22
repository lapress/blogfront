<template>
  <article class="post">
    <portal v-if="post.data.videoId" to="header.before">
      <div class="video">
        <Logo class="video__logo" hide-caret />
        <no-ssr>
          <youtube :video-id="post.data.videoId" :player-width="playerWidth" :player-height="playerHeight" />
        </no-ssr>
      </div>
    </portal>
    <div class="container">
      <header class="post__header">
        <Breadcrumbs :routes="post.path" :active="post.title" class="post__breadcrumbs" />
        <h1 class="post-title title-1" v-text="post.title" />
        <CommentsCounter :count="post.commentCount" class="post__counter" size="big" :color="color" />
        <ArticleMetaInfo :post="post" class="post__meta" />
      </header>
      <div class="post__block">
        <p class="post__lead" v-text="post.excerpt" />
      </div>
      <!--    Banner ad      -->
      <div class="post__block">
        <VRuntimeTemplate :template="`<div class='post__content'>${post.body}</div>`" />
        <PostSocials :post="post" />
      </div>
      <div class="more-box">
        <div class="more-box__header">
          <h3 class="more-box__title">
            Nie przegap kolejnych odcinków!
          </h3>
          <div class="g-ytsubscribe" data-channel="AntywebTV" data-layout="default" data-theme="dark" data-count="default" />
        </div>
        <div class="more-box__posts">
          <div v-for="_post in relatedPosts" :key="_post.id">
            {{ _post.title }}
          </div>
        </div>
      </div>
      <DisqusComments :post="post" />
    </div>
  </article>
</template>

<script>
import { mapActions } from 'vuex'

import VRuntimeTemplate from 'v-runtime-template'
import ArticleMetaInfo from '~/components/atoms/Post/ArticleMetaInfo'
import Breadcrumbs from '~/components/Breadcrumbs'
import CommentsCounter from '~/components/atoms/Post/CommentsCounter'
import PostSocials from '~/components/atoms/Post/PostSocials'
import DisqusComments from '~/components/blocks/Post/DisqusComments'
import tailwind from '~/tailwind.config'

const Logo = () => import('~/components/Logo.vue')

export default {
  name: 'VideoPost',
  components: {
    ArticleMetaInfo,
    Breadcrumbs,
    CommentsCounter,
    PostSocials,
    VRuntimeTemplate,
    DisqusComments,
    Logo
  },
  props: {
    post: {
      type: Object,
      required: true
    }
  },
  data: () => ({
    playerWidth: '100%',
    playerHeight: '100%',
    relatedPosts: []
  }),
  computed: {
    color () {
      return tailwind.theme.colors.primary
    }
  },
  async serverPrefetch () {
    // fixme

    this.relatedPosts = await this.list({ slug: 'wideo', size: 3, updateState: false })
  },
  async mounted () {
    if (!this.relatedPosts.length) {
      this.relatedPosts = await this.list({ slug: 'wideo', size: 3, updateState: false })
    }
  },
  methods: {
    ...mapActions('category', ['list'])
  },
  head () {
    return {
      script: [
        { src: 'https://apis.google.com/js/platform.js' }
      ]
    }
  }
}
</script>

<style lang="scss" scoped>
.post {
  @screen sm {
    @apply py-10;
  }

  &__breadcrumbs {
    @apply mt-4 mb-2;

    @screen md {
      @apply mt-0;
    };
  }

  &__counter {
    @screen mobile {
      top: 1.5rem;
    }
  }

  &__header {
    @apply ml-0 mt-0 pb-12;

    border-bottom: 1px solid theme('colors.grey.light');
  }
}

.section {
  @apply py-6;
}

.title-1 {
  @apply mb-6;

  @screen mobile {
    @apply text-2xl leading-normal;
  }
}
.video {
  @apply relative;

  height: 100vh;
  > div {
    height: 100%;
  }
  &__logo {
    @apply absolute mt-8 ml-6 top-0 left-0;
  }
}
.more-box {
  @screen md {
    @apply pt-10 mb-10;
  }
  &__header {
    @apply flex items-center;
  }

  &__title {
    @screen md {
      @apply mr-4 text-2xl;
    }
  }
}
</style>
