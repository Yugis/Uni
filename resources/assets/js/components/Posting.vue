<template>
  <div class="form-group">
      <textarea name="body" id="postarea" class="form-control" rows="2" v-model="body" placeholder="Write a new post..."></textarea>
      <input type="button" class="pull-right btn btn-sm btn-primary" @click="create_post()" value="Post" style="margin-top: 10px; margin-bottom: 10px;" :disabled="not_working">
  </div>
</template>

<script>
    export default {
      data: function () {
        return {
          body: '',
          not_working: true
        }
      },

      watch: {
        body() {
          if(this.body.length > 0)
            this.not_working = false
          else
            this.not_working = true
        }
      },

      props: ['id'],

      mounted() {

      },
      methods: {
        create_post() {
          this.$http.post('/instructor/'+ this.id, { body: this.body })
              .then( (resp) => {
                this.$store.commit('add_post', resp.body)
                this.body = ''
              })
        }
      }
    }
</script>
