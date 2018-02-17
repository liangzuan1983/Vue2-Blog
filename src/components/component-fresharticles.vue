<template>
  <div>
      <div class="container">
          <p class="title">最近文章</p>
          <div class="line"></div>
          <ul class="nameList">
              <li v-for="(item, index) in nameList" :key="index">
                  {{item}}
              </li>
          </ul>
      </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      nameList: ['first', 'second', 'three', 'four', 'five']
    }
  }
}
</script>

<style scoped>
.container {
  width: 290px;
  height: auto;
  box-sizing: border-box;
  background: #fff;
  box-shadow: 0 1px 5px #ccc;
  padding: 10px;
  color: #666;
}
.container .line {
    width: 100%;
    height: 2px;
    background: #666;
    margin-bottom: 10px;
}
.container .title {
    font-size: 20px;
    font-weight: bold;
}
.container .nameList {
    padding: 0;
    margin: 0;
}
.container .nameList li {
    list-style: none;
}
</style>
