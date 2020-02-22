import config from 'config'

export const getApiUrl = (path = null) => {
  return process.env.API_URL + path
}

export const buildSearchUrl = (type = null) => {
  const suffix = type ? type + '/' : ''
  return process.env.API_URL + '/index/' + suffix + '_search'
}

export const getImageUrl = (path, width, height, method = 'fit') => {
  return `${process.env.BASE_URL}/img/${width}/${height}/${method}${path}`
}

export const getImageSizeUrl = (path, size, method = null) => {
  const config = getImageSize(size)
  return getImageUrl(path, config.width, config.height, method || config.method)
}

export const getImageSize = (size) => {
  const imageSize = config.images.sizes[size]

  if (imageSize === undefined) {
    throw new Error(`Image size does not exist (${size})`)
  }

  return imageSize
}

export const getFacebookImageUrl = (path) => {
  if (!path) {
    return `${process.env.BASE_URL}/facebook.jpg`
  }

  return getImageSizeUrl(path, 'show')
}

export const hexToRgba = (hex, alpha) => {
  let c
  if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)) {
    c = hex.substring(1).split('')
    if (c.length === 3) {
      c = [c[0], c[0], c[1], c[1], c[2], c[2]]
    }
    c = '0x' + c.join('')
    return 'rgba(' + [(c >> 16) & 255, (c >> 8) & 255, c & 255].join(',') + `, ${alpha})`
  }
  throw new Error('Bad Hex')
}
