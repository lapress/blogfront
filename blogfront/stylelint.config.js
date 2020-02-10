module.exports = {
  rules: {
    indentation: 2,
    'block-no-empty': null,
    'color-no-invalid-hex': true,
    'comment-empty-line-before': [
      'always',
      {
        ignore: ['stylelint-commands', 'after-comment']
      }
    ],
    'max-empty-lines': 1,
    'unit-whitelist': ['em', 'rem', '%', 's', 'vh']
  }
}
