<template>
  <div v-cloak>
      <!-- 文章区域 -->
      <div class="article">
        <p>
          <span class="article-title">{{title}}</span>
        </p>
        <p class="article-type-date">
          分类：{{type}}&nbsp;&nbsp;&nbsp;&nbsp;发布时间：{{date}}
        </p>
        <div class="article-content" v-html="content"></div>
        <!-- 留言区域 -->
        <div class="leave-word">
          <p class="tip">您的邮箱不会被泄露</p>
          <input type="text" v-model="leaveWord.name" placeholder="昵称" />
          <p v-show="leaveWord.nameFalse">昵称长度必须在1~20</p>
          <input type="text" v-model="leaveWord.mail" placeholder="邮箱" />
          <p v-show="leaveWord.mailFalse">邮箱格式错误</p>
          <textarea v-model="leaveWord.content" placeholder="写点什么..."></textarea>
          <p v-show="leaveWord.contentFalse">内容不能为空</p>
          <button class="publish" @click="submit">发布</button>
        </div>
        <!-- 已有留言区域 -->
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
</template>

<script>
export default {
  data () {
    return {
      title: '',
      type: '',
      content: '',
      date: '',
      // 用户填写的评论
      leaveWord: {
        content: '',
        name: '',
        mail: '',
        nameFalse: false,
        mailFalse: false,
        contentFalse: false
      },
      // 加载的评论
      leaveWords: []
    }
  },
  methods: {
    // 获取文章
    getArticle (title) {
      let _this = this
      _this.$http
        .get('/getarticle.php?title=' + title)
        .then(function (response) {
          if (response.data === '[]]') {
            // 如果没有相关数据则返回首页
            _this.$router.push('homePage')
            return
          }
          _this.leaveWords = []
          // 先提取出留言
          let leaveWords = response.data.pop()
          let article = response.data[0]

          _this.title = article.title
          _this.type = article.type
          _this.content = article.content
          _this.date = article.date

          // 循环添加加载的留言
          for (let i = 0; i < leaveWords.length; i++) {
            _this.leaveWords.push(leaveWords[i])
          }
        })
    },
    // 验证用户填写的信息
    checkForm () {
      let name = this.leaveWord.name.trim()
      let content = this.leaveWord.content.trim()
      let mail = this.leaveWord.mail.trim()
      let flag = true
      // 验证昵称
      if (name < 1 || name > 20) {
        flag = false
        this.leaveWord.nameFalse = true
      }
      // 验证邮箱
      if (!/[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/.test(mail)) {
        flag = false
        this.leaveWord.mailFalse = true
      }
      // 验证留言内容
      if (content < 1 || content > 300) {
        flag = false
        this.leaveWord.contentFalse = true
      }
      return flag
    },
    // 提交评论
    submit () {
      let _this = this
      if (this.checkForm()) {
        let dataObj = {
          articletitle: _this.title,
          name: _this.leaveWord.name,
          mail: _this.leaveWord.mail,
          content: _this.leaveWord.content
        }
        let data = ''
        for (let key in dataObj) {
          data += (key + '=' + dataObj[key] + '&')
        }
        // 发送数据
        _this.$http
          .post('/setleaveword.php', data)
          .then(function (response) {
            // 提示提交成功
          })
          .catch(function (error) {
            console.log(error)
          })
        // 获取用于前端显示的临时日期
        let d = new Date()
        let date = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate()
        let leaveWordData = {date: date}
        // 添加数据，清空表单
        for (let key in this.leaveWord) {
          leaveWordData[key] = this.leaveWord[key]
          this.leaveWord[key] = ''
        }
        this.leaveWords.push(leaveWordData)
      } else {
        return false
      }
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
.leave-word p {
  margin-left: 10px;
  color: #a00;
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
