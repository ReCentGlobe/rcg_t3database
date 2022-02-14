module.exports = {
  root: true,
  globals: {
    SENTRY_DSN: 'readonly',
    SENTRY_RELEASE: 'readonly',
  },
  extends: ['airbnb-base', 'plugin:prettier/recommended', 'eslint:recommended'],
  parser: 'babel-eslint',
  env: {
    node: true,
    es6: true,
    amd: true,
    browser: true,
    jquery: true,
    jest: true,
  },
  parserOptions: {
    ecmaFeatures: {
      globalReturn: true,
      generators: false,
      objectLiteralDuplicateProperties: false,
    },
    ecmaVersion: 2018,
    sourceType: 'module',
  },
  plugins: ['prettier', 'import'],
  settings: {
    'import/core-modules': [],
    'import/ignore': ['node_modules', '\\.(coffee|scss|css|less|hbs|svg|json)$'],
  },
  rules: {
    'no-console': 0,
    'prettier/prettier': 'error',
    'comma-dangle': [
      'error',
      {
        arrays: 'always-multiline',
        objects: 'always-multiline',
        imports: 'always-multiline',
        exports: 'always-multiline',
        functions: 'ignore',
      },
    ],
  },
};
