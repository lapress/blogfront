import { ActionTree } from 'vuex'
import { AuthorState } from './types'

const bodybuilder = () => import(/* webpackChunkName: "bodybuilder" */'bodybuilder')

export const actions: ActionTree<AuthorState, any> = {

}
