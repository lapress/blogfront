import { Post } from '~/modules/blogfront/store/types'

export interface PostState {
  list: Post[],
  current: Post|null,
  count: number|null,
  currentQuery: any
}
