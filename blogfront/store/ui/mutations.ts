import { MutationTree } from 'vuex'
import { UiState } from './types'
import {
  ADD_MENU,
  SET_HEADER_TRANSPARENT,
  SET_LOADING,
  TOGGLE_MOBILE_MENU,
  TOGGLE_SEARCH_FORM
} from './mutation-types'

const mutations: MutationTree<UiState> = {
  [ADD_MENU] (state, { key, items }) {
    this._vm.$set(state.menus, key, items)
  },

  [SET_LOADING] (state, value) {
    state.loading = value
  },

  [TOGGLE_SEARCH_FORM] (state, value = null) {
    if (typeof value === 'boolean') {
      state.isSearchOpened = value
      return
    }

    state.isSearchOpened = !state.isSearchOpened
  },

  [TOGGLE_MOBILE_MENU] (state, value = null) {
    if (typeof value === 'boolean') {
      state.isMobileMenuOpened = value
      return
    }

    state.isMobileMenuOpened = !state.isMobileMenuOpened
  },

  [SET_HEADER_TRANSPARENT] (state, transparent = false) {
    state.transparentHeader = transparent
  }
}

export default mutations
