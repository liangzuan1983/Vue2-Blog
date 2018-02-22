import Vue from 'vue'

var bus = new Vue({
  data: {
    // component-articles组件引用
    pageCount: 0,
    curPage: 1,
    // router引用，判断是否登录
    isLogon: 1
  }
})

export default bus
