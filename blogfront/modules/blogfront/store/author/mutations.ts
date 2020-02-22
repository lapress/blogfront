import { Author, Post } from '../types'
import { SET_AUTHOR_POSTS, SET_AUTHOR_POSTS_TOTAL_COUNT, SET_CURRENT_AUTHOR } from './mutation-types'

export const mutations = {
  [SET_AUTHOR_POSTS] (state, posts: Array<Post>) {
    state.posts = posts
  },

  [SET_CURRENT_AUTHOR] (state, author: Author) {
    state.current = author
  },

  [SET_AUTHOR_POSTS_TOTAL_COUNT] (state, count: number) {
    state.count = count
  }
}
