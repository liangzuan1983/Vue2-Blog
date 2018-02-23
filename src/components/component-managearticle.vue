<template>
  <div v-cloak>
      <div class="container">
          <div class="article-item" v-for="(item, index) in articleList" :key="index">
              <span>{{item}}</span><button @click="removeArticle(index)">删除</button>
          </div>
      </div>
  </div>
</template>

<script>
export default {
  props: {
    gUrl: {
      type: String,
      default: ''
    },
    sUrl: {
      type: String,
      default: ''
    }
  },
  data () {
    return {
      articleList: []
    }
  },
  methods: {
    removeArticle (index) {
      // 删除文章操作
      let _this = this
      _this.$http
        .get(_this.sUrl + _this.articleList[index])
        .then(function (response) {
          // 提示删除成功
        })
        .catch(function (error) {
          console.log(error)
        })
      // 输出前端数据
      _this.articleList.splice(index, 1)
    },
    getArticleList () {
      let _this = this
      _this.$http
        .get(_this.gUrl)
        .then(function (response) {
          // 如果数据为空则返回
          if (response.data === '[]') return
          // 文章列表
          let articleList = response.data
          // 循环添加文章数据
          for (let i = 0; i < articleList.length; i++) {
            _this.articleList.push(articleList[i])
          }
        })
    }
  },
  mounted () {
    this.getArticleList()
  }
}
</script>

<style scoped>
.container {
  max-width: 980px;
  width: 100%;
  position: absolute;
  top: 85px;
  left: 50%;
  transform: translateX(-50%);
  background: #fff;
  border: 1px solid #ccc;
  border-top: none;
}
.container .article-item {
    margin: 10px 0;
    line-height: 30px;
    font-size: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    box-shadow: 1px 1px 7px #ccc;
}
.container .article-item > span {
    word-wrap:break-word;
    word-break:break-all;
}
.container .article-item > button {
    float: right;
    width: 50px;
    height: 30px;
    outline: none;
    border-radius: 5px;
    border: #ccc solid 1px;
    background: #b00;
    color: #eee;
}
.container .article-item > button:hover {
    background: #c00;
    color: #fff;
}
.container .article-item > button:active {
    background: #a00;
    color: #ddd;
}
</style>
