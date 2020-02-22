<template>
  <div>
    <component :is="getComponentName(module.type)" v-for="module in page" :key="module.id" :module="module" />
  </div>
</template>

<script>
import { getSectionComponentName } from '~/utils/sectionMapper'

const PostModule = () => import(/* webpackChunkName: "lp-pagebuilder-post-module" */'~/components/blocks/PageBuilder/Modules/PostModule')
const BannerModule = () => import(/* webpackChunkName: "lp-pagebuilder-banner-module" */'~/components/blocks/PageBuilder/Modules/BannerModule')
const PostsRowModule = () => import(/* webpackChunkName: "lp-pagebuilder-posts-module" */'~/components/blocks/PageBuilder/Modules/PostsRowModule')
const PostsTopSidebarModule = () => import(/* webpackChunkName: "lp-pagebuilder-top-module" */'~/components/blocks/PageBuilder/Modules/PostsTopSidebarModule')
const GridModule = () => import(/* webpackChunkName: "lp-pagebuilder-grid-module" */'~/components/blocks/PageBuilder/Modules/GridModule')
const AntywebTvModule = () => import(/* webpackChunkName: "lp-pagebuilder-tv-module" */'~/components/blocks/PageBuilder/Modules/AntywebTvModule')
const Posts1x4x3Module = () => import(/* webpackChunkName: "lp-pagebuilder-1x4x3-module" */'~/components/blocks/PageBuilder/Modules/Posts1x4x3Module')
const Posts1x3x3Module = () => import(/* webpackChunkName: "lp-pagebuilder-1x3x3-module" */'~/components/blocks/PageBuilder/Modules/Posts1x3x3Module')
const Posts3x3Module = () => import(/* webpackChunkName: "lp-pagebuilder-3x3-module" */'~/components/blocks/PageBuilder/Modules/Posts3x3Module')
const ReviewsModule = () => import(/* webpackChunkName: "lp-pagebuilder-reviews-module" */'~/components/blocks/PageBuilder/Modules/ReviewsModule')

export default {
  name: 'PageBuilder',
  components: {
    // eslint-disable-next-line vue/no-unused-components
    PostModule, BannerModule, PostsRowModule, PostsTopSidebarModule, GridModule, AntywebTvModule, Posts1x4x3Module, Posts1x3x3Module, Posts3x3Module, ReviewsModule
  },
  props: {
    page: {
      type: Array,
      default: () => []
    }
  },
  methods: {
    getComponentName (section) {
      return getSectionComponentName(section)
    }
  }
}
</script>
