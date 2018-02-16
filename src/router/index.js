import Vue from 'vue'
import Router from 'vue-router'

import Index from '../views/page-index'
import Demos from '../views/page-demos'
import Html from '../views/page-html'
import JavaScript from '../views/page-javascript'
import Css from '../views/page-css'
import Vuepage from '../views/page-vue'
import Otherpage from '../views/page-other'

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
    path: '/other',
    name: 'otherPage',
    component: Otherpage,
    meta: {
      title: 'YJ-杂七杂八'
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
