<template>
  <div>
      <div class="container">
        <div class="leave-container" v-for="(item, index) in leaveWords" :key="index" v-if="leaveWords.length">
            <p class="leave-name-date">
              <span class="leave-name">{{item.name}}：</span><br />
              <span class="leave-date">{{item.date}}</span>
            </p>
            <p class="leave-content">
              {{item.content}}
            </p>
            <button class="leave-del" @click="removeLeaveword(index)">删除</button>
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
  methods: {
    removeLeaveword (index) {
      //  删除评论操作
      let _this = this
      _this.$http
        .get(_this.sUrl + _this.leaveWords[index].id)
        .then(function (response) {
          // 提示删除成功
        })
        .catch(function (error) {
          console.log(error)
        })
      _this.leaveWords.splice(index, 1)
    },
    getLeaveword () {
      let _this = this
      _this.$http.get(_this.gUrl).then(function (response) {
        // 如果数据返回为空则返回
        if (response.data === '[]') return
        if (typeof response.data === 'string') {
          response.data = JSON.parse(response.data.replace(/\n/g, '\\n'))
        }
        // 留言列表
        let leaveWords = response.data
        // 循环添加留言数据
        for (let i = 0; i < leaveWords.length; i++) {
          _this.leaveWords.push(leaveWords[i])
        }
      })
    }
  },
  data () {
    return {
      leaveWords: []
    }
  },
  mounted () {
    this.getLeaveword()
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
.leave-container .leave-name-date {
  margin-top: 50px;
  background: #ddd;
  padding: 5px 0;
  border: 1px solid #ccc;
  box-shadow: 1px 1px 7px #ccc;
}
.leave-container * {
  word-wrap: break-word;
  word-break: break-all;
}
.leave-container .leave-name-date .leave-name {
  font-weight: bold;
  color: #666;
}
.leave-container .leave-name-date .leave-date {
  color: #888;
  font-size: 0.8em;
}
.leave-container .leave-content {
  text-indent: 2em;
}
.leave-container .leave-del {
  width: 50px;
  height: 30px;
  border-radius: 5px;
  border: 1px #ccc solid;
  outline: none;
  background: #b00;
  color: #eee;
  float: right;
}
.leave-container .leave-del:hover {
  background: #c00;
  color: #fff;
}
.leave-container .leave-del:active {
  background: #a00;
  color: #ddd;
}
</style>
