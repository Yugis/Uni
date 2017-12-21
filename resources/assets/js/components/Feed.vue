<template lang="html">
  <div class="col-lg-12">
    <div class="panel panel-danger">
      <div class="panel-heading" style="text-align:center">
        Posts
      </div>
      <div class="panel-body">
        <p style="color: green;">News Feed</p>
        <hr>

          <div v-if="!loading" v-for="post in posts">
            <p>
              {{post.body}} <span class="pull-right">{{post.created_at}}</span>
            </p>
            <hr>
          </div>

          <center><div v-if="loading" class="spinner"></div></center>

      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      loading: true
    }
  },

  props: ['id'],

  mounted() {
    this.newsfeed()
  },

  methods: {
    newsfeed() {
      this.$http.get('/api/get_related_posts/' + this.id)
          .then( (resp) => {
            resp.body.forEach( (post) => {
              this.$store.commit('add_post', post)
              this.loading = false
            })
          })
    }
  },

  computed: {
      posts() {
        return this.$store.getters.all_posts
      }
  }
}
</script>
