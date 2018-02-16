<template>
  <div v-cloak>
    <div class="article-container">
      <div class="article" v-for="(item, index) in articles" :key="index">
        <p>
          <a @click="openUrl(index)" class="article-title">{{item.title}}</a>
        </p>
        <p class="article-type-date">
          分类：{{item.type}}&nbsp;&nbsp;&nbsp;&nbsp;发布时间：{{item.date}}
        </p>
        <div class="article-content" v-html="item.curContent"></div>
        <p class="article-openall-container">
          <a class="article-openall" @click="openAll(index)">{{item.toggleName}}</a>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      articles: [
        {
          url: 'htmlPage',
          title: '测试标题',
          type: 'javascript',
          content:
            `测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容
            测试内容测试内容测试内容测试内容测试内容内容内测试内容测试内容测试内容测试内容测试
            测试内容测试内容测试内容测试内容测试内容内容内`,
          curContent: '',
          date: '2018-1-20',
          opened: false,
          toggleName: '阅读全文'
        },
        {
          url: 'htmlPage',
          title: '测试标题',
          type: 'javascript',
          content:
            `测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容
            测试内容测试内容测试内容测试内容测试内容内容内测试内容测试内容测试内容测试内容测试
            测试内容测试内容测试内容测试内容测试内容内容内`,
          curContent: '',
          date: '2018-1-20',
          opened: false,
          toggleName: '阅读全文'
        },
        {
          url: 'htmlPage',
          title: '测试标题',
          type: 'javascript',
          content:
            `测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容
            测试内容测试内容测试内容测试内容测试内容内容内测试内容测试内容测试内容测试内容测试
            测试内容测试内容测试内容测试内容测试内容内容内`,
          curContent: '',
          date: '2018-1-20',
          opened: false,
          toggleName: '阅读全文'
        }
      ]
    }
  },
  methods: {
    openUrl (index) {
      this.$router.push({name: this.articles[index].url})
    },
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
    for (let i = 0; i < this.articles.length; i++) {
      this.setCurContent(i)
    }
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
  box-shadow: 0 0 5px #ccc;
}
.article-container .article .article-title {
  font-size: 30px;
  font-weight: bold;
  color: #666;
  cursor: pointer;
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
</style>
