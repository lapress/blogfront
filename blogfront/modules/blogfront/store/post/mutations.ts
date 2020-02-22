import { MutationTree } from 'vuex'
import { PostState } from './types'

import { SET_CURRENT_POST, SET_POSTS, SET_TOTAL_COUNT, SET_PRODUCT_QUERY, MERGE_PRODUCT_QUERY } from './mutation-types'

export const mutations: MutationTree<PostState> = {
  [ SET_CURRENT_POST ] (state, post) {
    state.current = post
  },

  [ SET_POSTS ] (state, posts) {
    state.list = posts
  },

  [ SET_TOTAL_COUNT ] (state, count) {
    state.count = count
  },

  [ SET_PRODUCT_QUERY ] (state, query) {
    state.currentQuery = query
  },

  [ MERGE_PRODUCT_QUERY ] (state, query) {
    state.currentQuery = {
      ...state.currentQuery,
      ... query
    }
  }
}
