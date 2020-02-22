import { Author, Post } from '../types'

export interface AuthorState {
  posts: Array<Post>;
  current?: Author;
  count: number;
}
