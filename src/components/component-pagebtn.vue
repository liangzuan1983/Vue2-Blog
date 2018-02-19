<template>
  <div class="article-pagenum-button">
    <button @click="prevPage">&lt;&lt;</button>
      <button v-for="(item, index) in pageCount" :key="index">
        {{item}}
      </button>
    <button @click="nextPage">&gt;&gt;</button>
  </div>
</template>

<script>
import bus from '../bus.js'

export default {
  data () {
    return {
      curPage: 1,
      pageCount: 0
    }
  },
  mounted () {
    let _this = this
    bus.$on('on-data', function (data) {
      _this.pageCount = data
    })
  }
}
</script>

<style scoped>
.article-pagenum-button > button {
  display: inline-block;
  width: 32px;
  height: 32px;
  border-radius: 5px;
  outline: none;
  border: 1px solid #ccc;
  background: #eee;
  font-weight: bold;
}
.article-pagenum-button > button:active {
  background: #fff;
}
</style>
