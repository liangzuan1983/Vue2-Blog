import Vue from 'vue'
import Router from 'vue-router'

import Index from '../components/page-index'
import Demos from '../components/page-demos'
import Html from '../components/page-html'
import JavaScript from '../components/page-javascript'
import Css from '../components/page-css'
import Vuepage from '../components/page-vue'

Vue.use(Router)

const Routers = [
  {
    path: '/',
    name: 'homePage',
    component: Index,
    meta: {
      title: 'YJ-首页'
    }
  },
  {
    path: '/html',
    name: 'htmlPage',
    component: Html,
    meta: {
      title: 'YJ-HTML'
    }
  },
  {
    path: '/css',
    name: 'cssPage',
    component: Css,
    meta: {
      title: 'YJ-CSS'
    }
  },
  {
    path: '/javascript',
    name: 'javascriptPage',
    component: JavaScript,
    meta: {
      title: 'YJ-JavaScript'
    }
  },
  {
    path: '/vue',
    name: 'vuePage',
    component: Vuepage,
    meta: {
      title: 'YJ-Vue.js'
    }
  },
  {
    path: '/demos',
    name: 'demosPage',
    component: Demos,
    meta: {
      title: 'YJ-Demos'
    }
  },
  {
    path: '*',
    redirect: '/'
  }
]

const RouterConfig = {
  mode: 'history',
  routes: Routers
}

const router = new Router(RouterConfig)

router.beforeEach((to, from, next) => {
  window.document.title = to.meta.title
  next()
})

router.afterEach((to, from, next) => {
  window.scrollTo(0, 0)
})

export default router
