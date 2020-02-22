<template>
  <article class="post">
    <div :id="`post-${post.id}-container`" class="container">
      <header class="post__header">
        <Breadcrumbs :routes="post.path" :active="post.title" class="post__breadcrumbs" />
        <h1 class="post-title title-1" v-text="post.title" />
        <CommentsCounter :count="post.commentCount" class="post__counter" size="big" />
        <ArticleMetaInfo :post="post" class="post__meta" hide-author />
      </header>
      <AuthorBox v-if="!$device.isMobile" :author="post.author" label="Felieton" @resize="(height) => ($refs.excerpt.style.minHeight = `${height}px`)" />
      <div ref="excerpt" class="post__block">
        <p class="post__lead" v-text="post.excerpt" />
      </div>
      <div style="background: #f2f2f2;width:1200px;height:400px;margin: 40px auto;display: flex; align-items: center;justify-content: center;max-width: 100%">
        Banner
      </div>
      <!--    Banner ad      -->
      <div class="post__block">
        <div class="post__content" v-html="post.body" />
        <PostSocials :post="post" />
      </div>
    </div>
  </article>
</template>

<script>
import ArticleMetaInfo from '~/components/atoms/Post/ArticleMetaInfo'
import Breadcrumbs from '~/components/Breadcrumbs'
import CommentsCounter from '~/components/atoms/Post/CommentsCounter'
import PostSocials from '~/components/atoms/Post/PostSocials'
import AuthorBox from '~/components/atoms/Author/Box'

export default {
  name: 'PostBase',
  components: {
    AuthorBox,
    ArticleMetaInfo,
    Breadcrumbs,
    CommentsCounter,
    PostSocials
  },
  props: {
    post: {
      type: Object,
      required: true
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

  &__block {
    @screen md {
      @apply mx-0;

      margin-left: 30%;
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

/deep/ .author-box {
  @screen md {
    @apply absolute;
  }
}
</style>
