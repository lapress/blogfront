import { ActionTree } from 'vuex'
import config from 'config'
import {
  ADD_MENU,
  SET_HEADER_TRANSPARENT,
  SET_LOADING,
  TOGGLE_MOBILE_MENU,
  TOGGLE_SEARCH_FORM
} from './mutation-types'

import { UiState } from '~/store/ui/types'

const actions: ActionTree<UiState, UiState> = {
  fetchMenu ({ commit, getters }, key) {
    return new Promise((resolve, reject) => {
      if (key === undefined) {
        reject(new Error('Given menu key does not exist'))
        return
      }

      if (config.menus[key] || getters.hasMenu(key)) {
        const menu = config.menus[key] || getters.getMenu(key)
        resolve(menu)
        return menu
      }
      commit(ADD_MENU, { key, items: [] })

      // await this.$axios.$get(getApiUrl(`/menus/${key}`)).then((response) => {
      //   commit(ADD_MENU, { key: response.key, items: response.items })
      // })
    })
  },

  startLoading ({ commit }) {
    commit(SET_LOADING, true)
  },

  finishLoading ({ commit }) {
    commit(SET_LOADING, false)
  },

  toggleSearch ({ commit }, value = null) {
    commit(TOGGLE_SEARCH_FORM, value)
  },

  toggleMobileMenu ({ commit }, value = null) {
    commit(TOGGLE_MOBILE_MENU, value)
  },

  setHeaderTransparent ({ commit }, value = true) {
    commit(SET_HEADER_TRANSPARENT, value)
  }
}

export default actions
