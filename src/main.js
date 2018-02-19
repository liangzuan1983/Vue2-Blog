import Vue from 'vue'
import router from './router'
import axios from 'axios'
// import '../node_modules/iview/dist/styles/iview.css'

import App from './App'
// import './iview-components'

Vue.prototype.$http = axios

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  render: h => h(App)
})
