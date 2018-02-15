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
      title: 'YJ-主页'
    },
    children: [
      {
        path: '/classification/html',
        name: 'html',
        component: Html,
        meta: {
          title: 'YJ-HTML'
        }
      },
      {
        path: '/classification/css',
        name: 'css',
        component: Css,
        meta: {
          title: 'YJ-CSS'
        }
      },
      {
        path: '/classification/javascript',
        name: 'javascript',
        component: JavaScript,
        meta: {
          title: 'YJ-JavaScript'
        }
      },
      {
        path: '/classification/vue',
        name: 'vue',
        component: Vuepage,
        meta: {
          title: 'YJ-Vue.js'
        }
      }
    ]
  },
  {
    path: '/demos',
    name: 'demosPage',
    component: Demos,
    meta: {
      title: 'Demos'
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
