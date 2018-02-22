<template>
  <div v-cloak>
      <my-tabs :tabList="tabList" class="tabs"></my-tabs>
      <router-view class="content"></router-view>
  </div>
</template>

<script>
import Vue from 'vue'
import myTabs from '../components/component-tabs'

Vue.component('my-tabs', myTabs)

export default {
  data () {
    return {
      tabList: [
        {
          text: '管理留言',
          router: 'manageLeaveword'
        },
        {
          text: '管理文章',
          router: 'manageArticle'
        },
        {
          text: '写文章',
          router: 'writeArticle'
        }
      ]
    }
  }
}
</script>

<style scoped>
.tabs {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
}
@media (max-width: 980px) {
  .tabs {
      top: 35px;
  }
}
</style>
