import config from 'config'

const { resolve, join } = require('path')
const { readdirSync } = require('fs')

export default function (options) {
  this.nuxt.hook('build:before', () => {
    this.nuxt.options.build.createRoutes = () => []
  })

  this.extendRoutes((routes, resolve) => {
    routes.push({
      name: 'homepage',
      path: '/',
      component: resolve('~/pages/index.vue')
    })

    for (const path of Object.keys(config.seo.redirections)) {
      routes.push({
        path,
        redirect: config.seo.redirections[path]
      })
    }

    const { seo } = config

    const entities = ['category', 'tag', 'author', 'taxonomy', 'post']

    for (const entity of entities) {
      routes.push({
        name: entity,
        path: seo.routes[entity],
        component: resolve(`~/pages/${entity}/show.vue`)
      })
    }
  })

  this.addPlugin({
    src: resolve(__dirname, 'store/index.ts'),
    fileName: join('blogfront', 'store/index.ts')
  })

  const path = resolve(__dirname, 'store')

  for (const file of readdirSync(path)) {
    if (file.includes('.')) {
      this.addTemplate({
        src: resolve(path, file),
        fileName: join('blogfront', 'store', file)
      })
      continue
    }

    const nestedPath = resolve(__dirname, `store/${file}`)

    for (const nestedFile of readdirSync(nestedPath)) {
      this.addTemplate({
        src: resolve(nestedPath, nestedFile),
        fileName: join('blogfront', `store/${file}`, nestedFile)
      })
    }
  }
}
