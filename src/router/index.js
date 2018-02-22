import Vue from 'vue'
import Router from 'vue-router'
import Bus from '../bus.js'

import Index from '../views/page-index'
import Demos from '../views/page-demos'
import Html from '../views/page-html'
import JavaScript from '../views/page-javascript'
import Css from '../views/page-css'
import Vuepage from '../views/page-vue'
import Otherpage from '../views/page-other'
import Articlepage from '../views/page-article'
import Searchpage from '../views/page-search'
import Managementlogin from '../views/page-login'
import Managementpage from '../views/page-management'
import Writearticle from '../views/page-writearticle'
import Managearticle from '../views/page-managearticle'
import Manageleaveword from '../views/page-manageleaveword'

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
    path: '/article/:title',
    name: 'articlePage',
    component: Articlepage
  },
  {
    path: '/search/:word',
    name: 'searchPage',
    component: Searchpage,
    meta: {
      title: 'YJ-搜索'
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
    path: '/management/login',
    name: 'loginPage',
    component: Managementlogin,
    meta: {
      title: 'YJ-登录管理'
    }
  },
  {
    path: '/management',
    name: 'managementpage',
    component: Managementpage,
    meta: {
      title: 'YJ-管理界面',
      auth: true
    },
    children: [
      {
        path: 'writearticle',
        name: 'writeArticle',
        component: Writearticle,
        meta: {
          title: 'YJ-写文章',
          auth: true
        }
      },
      {
        path: 'managearticle',
        name: 'manageArticle',
        component: Managearticle,
        meta: {
          title: 'YJ-管理文章',
          auth: true
        }
      },
      {
        path: 'managelaveword',
        name: 'manageLeaveword',
        component: Manageleaveword,
        meta: {
          title: 'YJ-管理评论',
          auth: true
        }
      }
    ]
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
  if (to.meta.title) {
    window.document.title = to.meta.title
  } else {
    window.document.title = 'YJ-' + to.params.title
  }
  // 验证是否登录
  if (to.meta.auth) {
    if (Bus.$data.isLogon) {
      next()
    } else {
      next({name: 'loginPage'})
    }
  }
  next()
})

router.afterEach((to, from, next) => {
  window.scrollTo(0, 0)
})

export default router
