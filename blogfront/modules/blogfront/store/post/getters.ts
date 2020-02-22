import { GetterTree } from 'vuex'
import { PostState } from './types'

export const getters: GetterTree<PostState, any> = {
  list: state => state.list,
  current: state => state.current,
  count: state => state.count,
  getCurrentProductQuery: state => state.currentQuery
}
