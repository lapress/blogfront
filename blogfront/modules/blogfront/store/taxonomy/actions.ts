import { ActionTree } from 'vuex'
import { TaxonomyState } from './types'

const bodybuilder = () => import(/* webpackChunkName: "bodybuilder" */'bodybuilder')

export const actions: ActionTree<TaxonomyState, any> = {

}
