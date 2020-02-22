<template>
  <article class="post">
    <!-- <Thumbnail v-if="post.thumbnail && !post.hideThumbnail" :class="{ 'container': !$device.isMobile }" /> -->
    <div class="container">
      <header class="post__header">
        <Breadcrumbs :routes="post.path" :active="post.title" class="post__breadcrumbs" />
        <h1 class="post-title title-1" v-text="post.title" />
        <CommentsCounter :count="post.commentCount" class="post__counter" size="big" />
        <!-- <ArticleMetaInfo :post="post" class="post__meta" /> -->
      </header>
      <div class="post__block">
        <p class="post__lead" v-text="post.excerpt" />
      </div>
      <!--    Banner ad      -->
      <div class="post__block">
        <VRuntimeTemplate :template="bodyTemplate" />
        <PostSocials :post="post" />
      </div>
      <DisqusComments :post="post" />
    </div>
  </article>
</template>

<script>
import { mapGetters } from 'vuex'
import VRuntimeTemplate from 'v-runtime-template'

import ArticleMetaInfo from '~/components/atoms/Post/ArticleMetaInfo'
import Breadcrumbs from '~/components/Breadcrumbs'
import CommentsCounter from '~/components/atoms/Post/CommentsCounter'
import Thumbnail from '~/components/blocks/Post/Thumbnail'
import PostSocials from '~/components/atoms/Post/PostSocials'
import DisqusComments from '~/components/blocks/Post/DisqusComments'

export default {
  name: 'PostFormatBase',
  components: {
    ArticleMetaInfo,
    Breadcrumbs,
    CommentsCounter,
    PostSocials,
    DisqusComments,
    Thumbnail,
    VRuntimeTemplate
  },
  computed: {
    ...mapGetters('post', {
      post: 'current'
    }),
    bodyTemplate () {
      return `<div class="post__content">${this.post.body}</div>`
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
    @apply mt-4 mb-2 opacity-75;

    @screen md {
      @apply mt-0 opacity-100;
    };
  }

  &__counter {
    @screen mobile {
      top: 1.5rem;
    }
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
</style>
