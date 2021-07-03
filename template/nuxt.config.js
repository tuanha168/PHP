export default {
  // Disable server-side rendering: https://go.nuxtjs.dev/ssr-mode
  ssr: false,

  target: 'static',

  server: {
    port: 8000
  },

  publicRuntimeConfig: {
    axios: {
      baseURL: 'http://localhost:3000'
    }
  },
  // privateRuntimeConfig: {
  // },

  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    titleTemplate: '%s',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' }
    ]
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: ['ant-design-vue/dist/antd.css', 'assets/style/scss/main.scss'],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: ['@/plugins/antd-ui', '@/plugins/api.js'],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: [{ path: '@/components/modal', prefix: 'modal' }],

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    // https://go.nuxtjs.dev/eslint
    '@nuxtjs/eslint-module',
    '@nuxtjs/style-resources'
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    '@nuxtjs/auth-next'
  ],

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {},

  styleResources: {
    scss: ['@/assets/style/scss/variables/*.scss']
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
    extend(config, { loaders }) {
      loaders.scss.additionalData = '@use "sass:math";'
    },
    plugins: []
  }
}
