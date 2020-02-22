import config from 'config'

export default {
  buildModules: [
    '@nuxt/typescript-build'
  ],
  head: {
    title: config.meta.title,
    titleTemplate: config.meta.titleTemplate,
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: config.meta.description },
      { hid: 'keywords', name: 'keywords', content: config.meta.keywords },
      { hid: 'description', name: 'description', content: config.meta.description },
      { hid: 'og:title', property: 'og:title', content: config.meta.socials.title || config.meta.title },
      { hid: 'og:url', property: 'og:url', content: config.baseUrl },
      { hid: 'og:image', property: 'og:image', content: config.baseUrl + config.meta.socials.facebook.image },
      { hid: 'twitter:card', property: 'twitter:card', content: 'summary' },
      { hid: 'twitter:site', property: 'twitter:site', content: config.meta.socials.twitter.site }
    ],

    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      { rel: 'apple-touch-icon', sizes: '57x57', href: '/favicon/apple-icon-57x57.png' },
      { rel: 'apple-touch-icon', sizes: '60x60', href: '/favicon/apple-icon-60x60.png' },
      { rel: 'apple-touch-icon', sizes: '72x72', href: '/favicon/apple-icon-72x72.png' },
      { rel: 'apple-touch-icon', sizes: '76x76', href: '/favicon/apple-icon-76x76.png' },
      { rel: 'apple-touch-icon', sizes: '114x114', href: '/favicon/apple-icon-114x114.png' },
      { rel: 'apple-touch-icon', sizes: '120x120', href: '/favicon/apple-icon-120x120.png' },
      { rel: 'apple-touch-icon', sizes: '144x144', href: '/favicon/apple-icon-144x144.png' },
      { rel: 'apple-touch-icon', sizes: '152x152', href: '/favicon/apple-icon-152x152.png' },
      { rel: 'apple-touch-icon', sizes: '180x180', href: '/favicon/apple-icon-180x180.png' },
      { rel: 'icon', type: 'image/png', sizes: '192x192', href: '/favicon/android-icon-192x192.png' },
      { rel: 'icon', type: 'image/png', sizes: '32x32', href: '/favicon/favicon-32x32.png' },
      { rel: 'icon', type: 'image/png', sizes: '96x96', href: '/favicon/favicon-96x96.png' },
      { rel: 'icon', type: 'image/png', sizes: '16x16', href: '/favicon/favicon-16x16.png' }
    ]
  },
  svgLoader: {
    svgoConfig: {
      plugins: [
        { prefixIds: false } // Disables prefixing for SVG IDs
      ]
    }
  },
  loading: {
    color: config.ui.loadingColor
  },
  modules: [
    // Doc: https://axios.nuxtjs.org/usage
    '@nuxtjs/axios',
    '@nuxtjs/pwa',
    '@nuxtjs/eslint-module',
    'portal-vue/nuxt',
    'nuxt-device-detect',
    'nuxt-svg-loader',
    // '@nuxtjs/google-analytics'
    // '@nuxtjs/redirect-module'
    '~/modules/blogfront/module'
  ],
  /*
  ** Build configuration
  */
  build: {
    publicPath: '/_lapress/',
    postcss: {
      plugins: {
        tailwindcss: './tailwind.config.js'
      }
    },
    splitChunks: {
      layouts: true
    },
    /*
    ** You can extend webpack config here
    */
    // eslint-disable-next-line @typescript-eslint/no-unused-vars
    extend (config, ctx) {
      const configFile = require('config')
      const fs = require('fs')
      const path = require('path')

      fs.writeFileSync(path.resolve(this.buildContext.options.buildDir, 'config.json'), JSON.stringify(configFile))
      config.resolve.alias.config = path.resolve(this.buildContext.options.buildDir, 'config.json')
      config.resolve.alias.vue = 'vue/dist/vue.common'
    }
  },
  css: [
    '~/assets/sass/style.scss'
  ],
  manifest: config.meta.manifest
}
