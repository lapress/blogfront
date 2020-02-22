import author from './author'
import category from './category'
import post from './post'
import taxonomy from './taxonomy'

export default ({ store }, inject) => {
  store.registerModule('', {
    modules: {
      author,
      post,
      category,
      taxonomy
    }
  })
}
