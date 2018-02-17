<template>
  <div v-cloak>
  <my-container>
    <div class="article-container">
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
      <p class="tip">您的邮箱不会被公开</p>
      <input type="text" v-model="leaveWord.name" placeholder="昵称" />
      <input type="text" v-model="leaveWord.mail" placeholder="邮箱" />
      <textarea v-model="leaveWord.content" placeholder="写点什么..."></textarea>
      </div>
    </div>
    </div>
    <my-profile class="profile"></my-profile>
    <my-fresharticles class="fresharticles"></my-fresharticles>
  </my-container>
  </div>
</template>

<script>
export default {
  data () {
    return {
      url: 'htmlPage',
      title: '测试标题',
      type: 'javascript',
      content: `测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容
        测试内容测试内容测试内容测试内容测试内容内容内测试内容测试内容测试内容测试内容测试
        测试内容测试内容测试内容测试内容测试内容内容内`,
      date: '2018-1-20',
      leaveWord: {
        content: '',
        name: '',
        mail: ''
      }
    }
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

.profile {
  margin-left: 10px;
  margin-top: 30px;
  display: inline-block;
  position: fixed;
}
.article-container {
  display: inline-block;
  width: 680px;
}
.fresharticles {
  display: inline-block;
  position: fixed;
  margin-left: 10px;
  margin-top: 380px;
}

@media (max-width: 980px) {
  .profile {
  display: none;
  }
  .fresharticles {
  display: none;
  }
  .article-container {
  display: block;
  max-width: 680px;
  width: auto;
  margin: 30px auto 0 auto;
  }
}

.leave-word {
  margin-top: 100px;
  width: 100%;
  padding-right: 10px;
}
.leave-word .tip {
  line-height: 50px;
  background: #eee;
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
  margin: 20px 10px;
  height: 100px;
  max-width: 640px;
  width: 100%;
  border-radius: 5px;
  outline: none;
  border: none;
  background: #eee;
}
</style>
