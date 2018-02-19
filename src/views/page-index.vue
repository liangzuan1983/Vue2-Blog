<template>
  <div>
    <my-articles url="/getarticles.php?pagination=1">
      <my-pagebtn></my-pagebtn>
    </my-articles>
    <my-footer class="footer">
      浙ICP备18006943号
    </my-footer>
  </div>
</template>

<script>
import Vue from 'vue'
import myArticles from '../components/component-articles'
import myFooter from '../components/component-footer'
import myPagebtn from '../components/component-pagebtn'

Vue.component('my-articles', myArticles)
Vue.component('my-footer', myFooter)
Vue.component('my-pagebtn', myPagebtn)

export default {}
</script>

<style scoped>
.footer {
  position: relative;
  top: 20px;
}
</style>
