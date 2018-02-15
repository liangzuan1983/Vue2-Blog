<template>
  <div class="container" v-cloak>
      <nav>
          <!-- logo -->
          <div class="nav-logo"><router-link to="homePage">YJ</router-link></div>
          <!-- 窄屏下的菜单按钮 -->
          <div class="nav-menu-button" @click="toggleSidebar">
              <span></span>
              <span></span>
              <span></span>
          </div>
          <!-- 菜单项 -->
          <ul :class="['nav-list',{'nav-list-opend': opended}]" v-clickoutside="clickOutside">
              <li v-for="item in navList" :key="item.url">
                  <a v-if="item.hasList">{{item.text}}<div class="nav-down-arrow"></div></a>
                  <router-link v-if="!item.hasList" :to="item.url">{{item.text}}</router-link>
                  <ul class="nav-list-menu" v-if="item.hasList">
                      <li v-for="childItem in item.list" :key="childItem.url">
                          <router-link :to="childItem.url">{{childItem.text}}</router-link>
                      </li>
                  </ul>
              </li>
          </ul>
      </nav>
  </div>
</template>

<script>
export default {
  data () {
    return {
      navList: [
        {
          text: '首页',
          url: '/',
          hasList: false
        },
        {
          text: '分类',
          hasList: true,
          list: [
            {
              text: 'HTML',
              url: '/classification/html'
            },
            {
              text: 'CSS',
              url: '/classification/css'
            },
            {
              text: 'JavaScript',
              url: '/classification/javascript'
            },
            {
              text: 'Vue.js',
              url: '/classification/vue'
            }
          ]
        },
        {
          text: 'demos',
          url: '/demos'
        }
      ],
      opended: false
    }
  },
  methods: {
    toggleSidebar (e) {
      this.opended = !this.opended
      e.stopPropagation()
    },
    clickOutside () {
      this.opended = false
    }
  }
}
</script>

<style scoped>
/* 宽屏模式 */
.container {
  width: 100%;
  height: auto;
  box-shadow: 0 2px 4px #ccc;
}
nav {
  width: 75%;
  margin: 0 auto;
  height: 55px;
  box-sizing: border-box;
  padding: 10px 0;
}
nav .nav-logo {
  width: auto;
  height: 100%;
  margin-left: 20px;
  float: left;
}
nav .nav-logo a {
  text-decoration: none;
  color: #666;
  font-size: 30px;
  font-weight: bold;
}
nav .nav-logo a:hover {
  color: #777;
}
nav .nav-list {
  float: right;
  margin: 5px 0 0 0;
}
nav .nav-list > li {
  list-style: none;
  float: left;
  text-align: center;
}
nav .nav-list > li a {
  display: block;
  line-height: 30px;
  padding: 0 15px;
  margin: 0 10px 10px 0;
  border-radius: 5px;
  text-decoration: none;
  color: #666;
}
nav .nav-list > li a:hover {
  color: #fff;
  background: #666;
}
nav .nav-list > li .nav-list-menu {
  /* min-width: 100px; */
  background: #fff;
  box-shadow: 0 2px 10px #ccc;
  position: relative;
  border-radius: 5px;
  height: 0;
  overflow: hidden;
  padding: 0;
}
nav .nav-list > li .nav-list-menu li {
  list-style: none;
}
nav .nav-list > li .nav-list-menu li a {
  margin: 15px 0 0 0;
}
nav .nav-list > li:hover .nav-list-menu {
  height: auto;
}
nav .nav-down-arrow {
  border-top: 6px solid;
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  width: 0;
  height: 0;
  display: inline-block;
  margin-left: 5px;
}
nav .nav-menu-button {
  display: none;
  background: #fff;
}
nav .nav-menu-button:active {
    box-shadow: 0 0 2px 1px #ccc;
}

/* 窄屏 */
@media (max-width: 980px) {
  nav .nav-list {
    position: fixed;
    height: 100%;
    width: 50%;
    background: #fff;
    margin: 0;
    top: 0;
    left: -50%;
    padding: 15px 0 0 0;
    transition: 0.5s;
  }
  nav .nav-list > li {
    width: 100%;
    margin: 0 0 15px 0;
  }
  nav .nav-list > li a {
    border-radius: 0;
    margin: 0;
  }
  nav .nav-menu-button {
    display: block;
    float: right;
    padding: 8px 5px;
    position: relative;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  nav .nav-menu-button span {
    height: 2px;
    width: 25px;
    display: block;
    background: #ccc;
  }
  nav .nav-menu-button span + span {
    margin-top: 6px;
  }
  nav .nav-logo {
      margin-left: 0;
  }
}
nav .nav-list-opend {
  left: 0%;
  overflow: auto;
  box-shadow: 2px 0px 8px #ccc;
}
</style>
