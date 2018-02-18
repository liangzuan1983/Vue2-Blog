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
      </div>
    </div>
  <!-- </div> -->
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

.leave-word {
  margin-top: 100px;
  width: 100%;
  max-width: 640px;
  padding-right: 10px;
  border-top: 2px solid #ccc;
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
</style>
