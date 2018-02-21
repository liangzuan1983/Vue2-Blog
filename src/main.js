import Vue from 'vue'
import router from './router'
import axios from 'axios'

import App from './App'

axios.defaults.headers['Content-Type'] = 'application/x-www-form-urlencoded;charset=UTF-8'
Vue.prototype.$http = axios

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  render: h => h(App)
})
