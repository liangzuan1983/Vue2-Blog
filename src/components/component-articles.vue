<template>
  <div v-cloak>
    <div class="article-container" v-if="articles.length">
      <div class="article" v-for="(item, index) in articles" :key="index">
        <p>
          <router-link :to="{ name: 'articlePage', params: {title:item.title}}" class="article-title">{{item.title}}</router-link>
        </p>
        <p class="article-type-date">
          分类：{{item.type}}&nbsp;&nbsp;&nbsp;&nbsp;发布时间：{{item.date}}
        </p>
        <div class="article-content" v-html="item.curContent"></div>
        <p class="article-openall-container">
          <a class="article-openall" @click="openAll(index)">{{item.toggleName}}</a>
        </p>
      </div>
      <div class="article-pagenum-button">
        <slot></slot>
      </div>
    </div>
    <div v-else class="article-empty">
      <p>没有相关内容</p>
    </div>
  </div>
</template>

<script>
import Vue from 'vue'
import bus from '../bus.js'

export default {
  props: {
    url: {
      type: String,
      default: ''
    }
  },
  data () {
    return {
      articles: []
    }
  },
  methods: {
    openAll (index) {
      this.articles[index].opened = !this.articles[index].opened
      this.setCurContent(index)
      this.toggleOpen(index)
    },
    setCurContent (index) {
      if (this.articles[index].opened) {
        this.articles[index].curContent = this.articles[index].content
      } else {
        this.articles[index].curContent = this.articles[index].content.slice(0, 64) + '...'
      }
    },
    toggleOpen (index) {
      if (!this.articles[index].opened) {
        this.articles[index].toggleName = '阅读全文'
      } else {
        this.articles[index].toggleName = '收起'
      }
    }
  },
  mounted: function () {
    let _this = this
    _this.$http.get(_this.url)
      .then(function (response) {
        let pageCount = response.data.pop()
        let data = response.data
        for (let i = 0; i < data.length; i++) {
          _this.articles.push(data[i])
          Vue.set(_this.articles[i], 'curContent', '')
          Vue.set(_this.articles[i], 'toggleName', '阅读全文')
          Vue.set(_this.articles[i], 'opened', false)
          bus.$emit('on-data', Math.ceil(pageCount / 10))
          _this.setCurContent(i)
        }
      })
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
.article-container .article .article-content img {
  display: block;
  margin: 10px auto;
  max-width: 660px;
  width: 100%;
}
.article-container .article pre {
  color: #fff;
  background: #555;
  font-size: 1.2em;
  padding: 10px;
  text-indent: 0;
}
.article-container .article .article-openall-container {
  text-align: right;
  margin-right: 10px;
}
.article-container .article .article-openall {
  color: rgb(126, 161, 255);
  cursor: pointer;
}
.article-pagenum-button {
  max-width: 640px;
  margin: 0 auto;
  text-align: center;
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
