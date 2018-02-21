<template>
  <div>
      <div class="container">
          <p class="title">最近文章</p>
          <div class="line"></div>
          <ul class="nameList" v-if="nameList.length">
              <li v-for="(item, index) in nameList" :key="index">
                  <router-link :to="'/article/' + item">{{item}}</router-link>
              </li>
          </ul>
          <div v-else class="nameList-empty">
              <p>最近没有文章</p>
          </div>
      </div>
  </div>
</template>

<script>
export default {
  props: {
    url: {
      type: String,
      default: ''
    }
  },
  data () {
    return {
      nameList: []
    }
  },
  mounted () {
    let _this = this
    _this.$http.get(_this.url).then(function (response) {
      _this.nameList = []
      if (response.data === '[]') {
        return
      }
      let data = response.data
      for (let i = 0; i < data.length; i++) {
        _this.nameList.push(data[i])
      }
    })
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
  margin-top: 5px;
}
.container .nameList > li a {
  text-decoration: none;
  color: #666;
}
.container .nameList > li a:hover {
  color: #888;
}
</style>
