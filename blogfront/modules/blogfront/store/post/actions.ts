import { ActionTree } from 'vuex'
import get from 'lodash.get'
import bodybuilder from 'bodybuilder'
import config from 'config'

import { PostState } from './types'
import { SET_CURRENT_POST, SET_POSTS, SET_PRODUCT_QUERY } from './mutation-types'
import { quickSearchByQuery } from '~/modules/blogfront/utils/search'

// const bodybuilder = () => import(/* webpackChunkName: "bodybuilder" */'bodybuilder')

export const actions: ActionTree<PostState, any> = {
  single ({ commit, getters }, { urlKey, type, setCurrent = true }) {
    return new Promise((resolve, reject) => {
      if (get(getters.current, 'urlKey', false) === urlKey) {
        resolve(getters.current)
        return
      }

      const query = bodybuilder()
        .filter('term', 'urlKey', urlKey)

      quickSearchByQuery({ query, type }).then(({ hits }) => {
        if (setCurrent && hits[0]) {
          commit(SET_CURRENT_POST, hits[0])
        }

        resolve(hits[0])
      }).catch((err) => {
        reject(err)
      })
    })
  },

  list({ commit, state }, { query, start = 0, size = null, append = false, updateState = true, type = 'post', includeFields = null, excludeFields = null }) {
    size = size || config.list.perPage

    return new Promise((resolve, reject) => {
      quickSearchByQuery({query, type}).then((list) => {
        let posts = []

        if (append) {
          posts = [
            ...state.list
          ]
        }

        posts = [
          ...posts
        ]
        if (updateState) {
          commit(SET_POSTS, posts)
        }

        resolve(list)
      }).catch(() => {
        reject([])
      })
    })
  },

  setSearchQuery({commit}, query) {
    commit(SET_PRODUCT_QUERY, query)
  },

  mergeSearchQuery({commit, state}, query) {
      commit(SET_PRODUCT_QUERY, {
        ...state.currentQuery,
        ...query
      })
  }

}
