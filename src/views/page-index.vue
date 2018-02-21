<template>
  <div>
    <my-articles url="/php/get/getarticles.php?pagination="></my-articles>
    <my-footer class="footer">
      浙ICP备18006943号
    </my-footer>
  </div>
</template>

<script>
import Vue from 'vue'
import myArticles from '../components/component-articles'
import myFooter from '../components/component-footer'

Vue.component('my-articles', myArticles)
Vue.component('my-footer', myFooter)

export default {}
</script>

<style scoped>
.footer {
  position: relative;
  top: 20px;
}
</style>
