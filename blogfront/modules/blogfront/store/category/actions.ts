import { ActionTree } from 'vuex'
import { CategoryState } from './types'

const bodybuilder = () => import(/* webpackChunkName: "bodybuilder" */'bodybuilder')

export const actions: ActionTree<CategoryState, any> = {
  single() {

  },

}
