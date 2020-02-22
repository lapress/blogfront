import { GetterTree } from 'vuex'
import { AuthorState } from '~/modules/blogfront/store/author/types'

export const getters: GetterTree<AuthorState, any> = {
  current: state => state.current,
  posts: state => state.posts,
  count: state => state.count
}
