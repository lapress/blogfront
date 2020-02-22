export interface Item {
  anchor: string;
  type: string;
  value: string;
  meta: null;
  items: Item[];
  css: null | string;
}

export interface Menu {
  key: string;
  items: Item[];
}

export interface UiState {
  menus: {
    [key: string]: Menu
  },
  loading: boolean,
  isMobileMenuOpened: boolean,
  isSearchOpened: boolean,
  transparentHeader: boolean,
}
