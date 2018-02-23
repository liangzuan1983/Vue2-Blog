<template>
  <div v-cloak>
    <div class="article-container" v-if="articles.length">
      <!-- 文章卡片 -->
      <div class="article" v-for="(item, index) in articles" :key="index">
        <!-- 文章标题 -->
        <p>
          <router-link :to="{ name: 'articlePage', params: {title:item.title}}" class="article-title">{{item.title}}</router-link>
        </p>
        <!-- 文章日期 -->
        <p class="article-type-date">
          分类：{{item.type}}&nbsp;&nbsp;&nbsp;&nbsp;发布时间：{{item.date}}
        </p>
        <!-- 文章内容 -->
        <div class="article-content" v-html="item.curContent"></div>
        <!-- 展开或收起按钮 -->
        <p class="article-openall-container">
          <a class="article-openall" @click="openAll(index)">{{item.toggleName}}</a>
        </p>
      </div>
      <!-- 选页按钮 -->
      <div class="article-pagenum-button">
        <button @click="prevPage" :disabled="pageButtonData.curPage<=1">&lt;&lt;</button>
          <button v-for="(item, index) in pageButtonData.pageCount" :key="index" :disabled="index+1===pageButtonData.curPage" @click="goPage(item)">
            {{item}}
          </button>
        <button @click="nextPage" :disabled="pageButtonData.curPage>=pageButtonData.pageCount">&gt;&gt;</button>
      </div>
    </div>
    <!-- 内容为空时显示 -->
    <div v-else class="article-empty">
      <p>没有相关内容</p>
    </div>
  </div>
</template>

<script>
import Vue from 'vue'
import Bus from '../bus.js'

export default {
  props: {
    url: {
      type: String,
      default: ''
    }
  },
  data () {
    return {
      articles: [],
      pageButtonData: {}
    }
  },
  methods: {
    // 显示全部
    openAll (index) {
      this.articles[index].opened = !this.articles[index].opened
      this.setCurContent(index)
      this.toggleOpen(index)
    },
    // 设置缩略文章数据
    setCurContent (index) {
      if (this.articles[index].opened) {
        this.articles[index].curContent = this.articles[index].content
      } else {
        this.articles[index].curContent =
          this.articles[index].content.slice(0, 64) + '...'
      }
    },
    // 变换全部或收齐按钮
    toggleOpen (index) {
      if (!this.articles[index].opened) {
        this.articles[index].toggleName = '阅读全文'
      } else {
        this.articles[index].toggleName = '收起'
      }
    },
    // 获取数据
    getData (pagination) {
      let _this = this
      _this.$http
        .get(_this.url + pagination)
        .then(function (response) {
          // 先清空文章数据
          _this.articles = []
          _this.curContent = []
          // 如果数据为空则返回
          if (response.data === '[,0]') {
            Vue.set(_this.pageButtonData, 'pageCount', Bus.$data.pageCount)
            Vue.set(_this.pageButtonData, 'curPage', Bus.$data.curPage)
            return
          }
          // 消除换行
          if (typeof response.data === 'string') {
            response.data = JSON.parse(response.data.replace(/\n/g, '\\n'))
          }
          // 提取文章总数量
          let pageCount = response.data.pop()
          // 每页10篇算出页数
          Bus.$data.pageCount = Math.ceil(pageCount / 10)
          // 文章数据
          let data = response.data
          // 循环添加文章
          for (let i = 0; i < data.length; i++) {
            // 替换实体字符双引号
            data[i].content = data[i].content.replace(/&quot;/g, '"')
            _this.articles.push(data[i])
            Vue.set(_this.articles[i], 'curContent', '')
            Vue.set(_this.articles[i], 'toggleName', '阅读全文')
            Vue.set(_this.articles[i], 'opened', false)
            // 初始化缩略文章数据
            _this.setCurContent(i)
            Vue.set(_this.pageButtonData, 'pageCount', Bus.$data.pageCount)
            Vue.set(_this.pageButtonData, 'curPage', Bus.$data.curPage)
            // 调用gototop组件是页面回到顶部
            Bus.$emit('scroll-gototop')
          }
        })
    },
    // 下一页
    nextPage () {
      if (this.pageButtonData.curPage >= this.pageButtonData.pageCount) return
      Bus.$data.curPage++
      this.getData(Bus.$data.curPage)
    },
    // 上一页
    prevPage () {
      if (this.pageButtonData.curPage <= 0) return
      Bus.$data.curPage--
      this.getData(Bus.$data.curPage)
    },
    // 点击数字跳转特定页
    goPage (num) {
      if (num > this.pageButtonData.pageCount || num < 1) return
      Bus.$data.curPage = num
      this.getData(Bus.$data.curPage)
    }
  },
  created: function () {
    let _this = this
    Bus.$on('search-change', function (url) {
      _this.url = url
      _this.getData(1)
    })
    this.getData(1)
  },
  beforeDestroy () {
    // 恢复初始翻页数据
    Bus.$data.pageCount = 0
    Bus.$data.curPage = 1
  }
}
</script>

<style>
.article-container .article {
  max-width: 680px;
  margin: 30px 0;
  box-sizing: border-box;
  padding: 10px 10px;
  border-radius: 5px;
  height: auto;
  background: #fff;
  box-shadow: 0 1px 5px #ccc;
}
.article-container .article .article-title {
  font-size: 30px;
  font-weight: bold;
  color: #666;
  cursor: pointer;
  text-decoration: none;
}
.article-container .article .article-title:hover {
  color: #777;
}
.article-container .article .article-type-date {
  color: #999;
}
.article-container .article .article-content {
  text-indent: 2em;
  letter-spacing: 2px;
  font-size: 1.1em;
  color: #666;
}
.article-container .article .article-content img, video {
  display: block;
  margin: 10px auto;
  max-width: 660px;
  width: 100%;
}
.article-container .article .article-content p, a, pre, u, i, h1, h2, h3, h4, h5, h6 {
  word-wrap:break-word;
  word-break:break-all;
}
.article-container .article .article-content a {
  text-decoration: underline;
  color: rgb(117, 117, 117);
}
.article-container .article .article-content a:hover {
  color: #175199;
}
.article-container .article .article-content pre {
  color: #fff;
  background: #555;
  font-size: 1.2em;
  padding: 10px;
  text-indent: 0;
  /* 支持根据容器大小换行 */
  white-space: pre-wrap;
  word-wrap: break-word;
}
.article-container .article .article-openall-container {
  text-align: right;
  margin-right: 10px;
}
.article-container .article .article-openall {
  color: #175199;
  cursor: pointer;
}
.article-pagenum-button {
  max-width: 640px;
  margin: 0 auto;
  text-align: center;
}
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

.article-empty {
  max-width: 680px;
  background: #fff;
  box-shadow: 0 0 5px #ccc;
  margin: 30px 0;
  padding: 96px 0;
}
.article-empty p {
  margin: 30px 0;
  padding: 10px 10px;
  font-size: 36px;
  font-weight: bold;
  color: #666;
  text-align: center;
}
</style>
