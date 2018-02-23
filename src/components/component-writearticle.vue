<template>
  <div v-cloak>
      <div class="container">
          <!-- 标题 -->
          <input type="text" v-model="title" placeholder="文章标题" />
          <!-- 选择类型 -->
          <select v-model="type">
              <option v-for="(item, index) in typeList" :key="index" :value="item">{{item}}</option>
          </select>
          <!-- 文章内容区域 -->
          <div class="content-container">
            <textarea v-model="content" placeholder="文章内容区域"></textarea>
          </div>
          <!-- 提交按钮 -->
          <button @click="submit" class="submit">提交</button>
      </div>
  </div>
</template>

<script>
export default {
  props: {
    url: {
      type: String,
      default: ''
    },
    typeList: {
      type: Array,
      default () {
        return []
      }
    }
  },
  data () {
    return {
      title: '',
      titleError: false,
      type: '',
      typeError: false,
      content: '',
      contentError: false
    }
  },
  methods: {
    checkForm () {
      let title = this.title.trim()
      let type = this.type.trim()
      let content = this.content.trim()
      let flag = true

      if (title.length === 0) {
        flag = false
        this.titleError = true
      }
      if (type.length === 0) {
        flag = false
        this.typeError = true
      }
      if (content.length === 0) {
        flag = false
        this.contentError = true
      }
      return flag
    },
    submit () {
      let _this = this
      if (!_this.checkForm()) return
      let dataObj = {
        articletitle: _this.title,
        articletype: _this.type,
        articlecontent: _this.content
      }
      let data = ''
      for (let key in dataObj) {
        data += (key + '=' + dataObj[key] + '&')
      }
      _this.$http
        .post(_this.url, data)
        .then(function (response) {
          // window.location.reload()
          // 数据提交后清空
          _this.title = ''
          _this.content = ''
          _this.type = ''
          // 提示提交成功
        })
        .catch(function (error) {
          console.log(error)
        })
    }
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
.container > input,
select {
  display: block;
  position: relative;
  left: 50%;
  transform: translateX(-50%);
  margin-top: 30px;
  border-radius: 5px;
  border: solid #ccc 1px;
  outline: none;
  box-shadow: 0 1px 7px #ccc;
  font-size: 20px;
}
.container .content-container {
  padding-right: 6px;
  max-width: 980px;
  margin: 0 auto;
  box-sizing: border-box;
}
.container textarea {
  max-width: 800px;
  width: 100%;
  display: block;
  margin: 50px auto;
  border-radius: 5px;
  border: solid #ccc 1px;
  outline: none;
  box-shadow: 0 1px 7px #ccc;
  font-size: 20px;
  resize: none;
  height: 800px;
}
.container .submit {
  width: 90px;
  height: 30px;
  margin-bottom: 20px;
  outline: none;
  position: relative;
  left: 50%;
  transform: translateX(-50%);
  border-radius: 5px;
  border: solid #ccc 1px;
  background: #2d8cf0;
  color: #fff;
}
.container .submit:hover {
  background: #57a3f3;
}
.container .submit:active {
  background: #2d8cf0;
}
</style>
