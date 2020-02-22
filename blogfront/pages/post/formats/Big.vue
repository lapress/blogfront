<template>
  <article class="post">
    <Thumbnail v-if="post.thumbnail && !post.hideThumbnail" class="post__thumbnail" />
    <div class="container">
      <div class="post-intro">
        <header class="post__header">
          <Breadcrumbs v-if="$device.isMobile" :routes="post.path" :active="post.title" class="post__breadcrumbs" />
          <h1 class="post-title title-1" v-text="post.title" />
          <CommentsCounter :count="post.commentCount" class="post__counter" size="big" />
          <ArticleMetaInfo :post="post" class="post__meta" />
          <div class="post__header__bg" />
        </header>
        <div class="post__block post-intro__excerpt">
          <Breadcrumbs v-if="!$device.isMobile" :routes="post.path" :active="post.title" class="post__breadcrumbs" />
          <p class="post__lead" v-text="post.excerpt" />
        </div>
      </div>
      <!--    Banner ad      -->
      <div class="post__block">
        <VRuntimeTemplate :template="bodyTemplate" />
        <PostSocials :post="post" />
      </div>
    </div>
  </article>
</template>

<script>
import VRuntimeTemplate from 'v-runtime-template'

import ArticleMetaInfo from '~/components/atoms/Post/ArticleMetaInfo'
import Breadcrumbs from '~/components/Breadcrumbs'
import CommentsCounter from '~/components/atoms/Post/CommentsCounter'
import Thumbnail from '~/components/blocks/Post/Thumbnail'
import PostSocials from '~/components/atoms/Post/PostSocials'

const PostExcerpt = () => import(/* webpackChunkName: "lp-post-excerpt" */'~/components/atoms/Post/PostExcerpt')

export default {
  name: 'PostBase',
  components: {
    ArticleMetaInfo,
    Breadcrumbs,
    CommentsCounter,
    // eslint-disable-next-line vue/no-unused-components
    PostExcerpt,
    Thumbnail,
    PostSocials,
    VRuntimeTemplate
  },
  props: {
    post: {
      type: Object,
      required: true
    }
  },
  computed: {
    bodyTemplate () {
      return `<div class="post__content">${this.post.body}</div>`
    }
  }
}
</script>

<style lang="scss" scoped>
.post {
  @apply pt-0;

  @screen sm {
    @apply pb-10;
  }

  &__breadcrumbs {
    @apply mt-4 mb-8;

    @screen md {
      @apply mt-0 opacity-100;
    }
  }

  &-title {
    @screen lg {
      @apply text-4xl font-bold;
    }
  }

  /deep/ &__img {
    @apply w-full;
  }

  &__counter {
    @screen mobile {
      top: 1.5rem;
    }
  }

  &__header {

    @screen lg {
      @apply ml-0 relative w-1/3 pl-0 py-8 text-right;

      padding-right: 8.125rem;
      margin-top: -5rem;
    }

    &__bg {
      @screen lg {
        @apply absolute right-0 top-0 bottom-0 bg-white;

        width: 2000px;
        z-index: -1;
      }
    }
  }

  &__meta {
    @screen lg {
      @apply block text-left;
    }

    /deep/ .post__date {
      @screen lg {
        @apply block py-2 pl-10 mb-4;
      }
    }

    /deep/ .post-socials {
      @screen lg {
        @apply w-full mt-8 pt-4 text-right justify-end;

        border-top: 1px solid theme('colors.grey.lightest');
      }
    }
  }

  &__block {
    @screen lg {
      margin-left: 33%;
    }
  }
}

.post-intro {
  @screen lg {
    @apply flex;
  }

  &__excerpt {
    @screen lg {
      @apply ml-0 pt-10;
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
