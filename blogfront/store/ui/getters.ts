import { GetterTree } from 'vuex'
import get from 'lodash.get'
import config from 'config'
import { UiState } from './types'

const getters: GetterTree<UiState, any> = {
  // eslint-disable-next-line @typescript-eslint/no-unused-vars
  hasMenu: (state, getters) => key => getters.getMenu(key) !== null,
  getMenu: state => (key) => {
    if (get(config.menus, `${key}.items`, false)) {
      return config.menus[key]
    }
    return get(state.menus, key, null)
  },
  // eslint-disable-next-line @typescript-eslint/no-unused-vars
  getMenuItems: (state, getters) => key => get(getters.getMenu(key), 'items', []),
  menus: state => state.menus,
  loading: state => state.loading,
  isHeaderTransparent: state => state.transparentHeader
}

export default getters
