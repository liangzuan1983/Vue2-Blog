<template>
  <div v-cloak>
    <!-- <div class="article-container"> -->
      <!-- 文章区域 -->
      <div class="article">
        <p>
          <a class="article-title">{{title}}</a>
        </p>
        <p class="article-type-date">
          分类：{{type}}&nbsp;&nbsp;&nbsp;&nbsp;发布时间：{{date}}
        </p>
        <div class="article-content" v-html="content"></div>
        <!-- 留言区域 -->
        <div class="leave-word">
          <p class="tip">您的邮箱不会被泄露</p>
          <input type="text" v-model="leaveWord.name" placeholder="昵称" />
          <input type="text" v-model="leaveWord.mail" placeholder="邮箱" />
          <textarea v-model="leaveWord.content" placeholder="写点什么..."></textarea>
          <button class="publish">发布</button>
        </div>
        <div class="leave-words" v-for="(item, index) in leaveWords" :key="index" v-if="leaveWords.length">
          <p class="leave-name-date">
            <span class="leave-name">{{item.name}}：</span><br />
            <span class="leave-date">{{item.date}}</span>
          </p>
          <p class="leave-content">
            {{item.content}}
          </p>
        </div>
      </div>
    </div>
  <!-- </div> -->
</template>

<script>
export default {
  data () {
    return {
      title: '',
      type: '',
      content: '',
      date: '',
      leaveWord: {
        content: '',
        name: '',
        mail: ''
      },
      leaveWords: []
    }
  },
  methods: {
    getArticle (title) {
      let _this = this
      _this.$http
        .get('/getarticle.php?title=' + title)
        .then(function (response) {
          if (response.data === '[]]') {
            _this.$router.push('homePage')
            return
          }
          _this.leaveWords = []
          let leaveWords = response.data.pop()
          let article = response.data[0]

          _this.title = article.title
          _this.type = article.type
          _this.content = article.content
          _this.date = article.date

          for (let i = 0; i < leaveWords.length; i++) {
            _this.leaveWords.push(leaveWords[i])
          }
        })
    }
  },
  mounted () {
    let title = this.$route.params.title
    this.getArticle(title)
  }
}
</script>

<style scoped>
.article {
  max-width: 680px;
  margin: 30px 0;
  box-sizing: border-box;
  padding: 10px 10px;
  border-radius: 5px;
  height: auto;
  background: #fff;
  box-shadow: 0 1px 5px #ccc;
}
.article .article-title {
  font-size: 30px;
  font-weight: bold;
  color: #666;
  cursor: pointer;
}
.article .article-title:hover {
  color: #777;
}
.article .article-type-date {
  color: #999;
}
.article .article-content {
  text-indent: 2em;
  letter-spacing: 2px;
  font-size: 1.1em;
  color: #666;
}
.article .article-content img {
  display: block;
  margin: 10px auto;
  max-width: 660px;
  width: 100%;
}
.article pre {
  color: #fff;
  background: #555;
  font-size: 1.2em;
  padding: 10px;
  text-indent: 0;
}

.leave-word {
  margin-top: 100px;
  width: 100%;
  max-width: 640px;
  padding-right: 10px;
  border-top: 2px solid #ccc;
}
.leave-word .tip {
  line-height: 50px;
  background: #ddd;
  font-size: 25px;
  font-weight: bold;
  color: #666;
}
.leave-word input {
  display: block;
  margin: 20px 10px;
  height: 25px;
  border-radius: 5px;
  outline: none;
  border: none;
  background: #eee;
}
.leave-word textarea {
  display: block;
  margin: 20px auto;
  height: 100px;
  max-width: 620px;
  width: 100%;
  border-radius: 5px;
  outline: none;
  border: none;
  background: #eee;
  resize: none;
}
.leave-word .publish {
  width: 48px;
  height: 32px;
  color: #666;
  outline: none;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-left: 10px;
}
.leave-word .publish:hover {
  box-shadow: 0 0 7px #ccc;
}
.leave-word .publish:active {
  background: #fff;
}

.leave-words {
  margin: 50px auto;
  width: 100%;
  max-width: 640px;
  color: #666;
}
.leave-words .leave-name-date {
  margin-top: 0px;
  background: #ddd;
  padding: 5px 0;
}
.leave-words .leave-name-date .leave-name {
  font-weight: bold;
  color: #666;
}
.leave-words .leave-name-date .leave-date {
  color: #888;
  font-size: 0.8em;
}
.leave-words .leave-content {
  text-indent: 2em;
}
</style>
