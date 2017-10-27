<template>
    <div class="col-sm-12">
        <!-- <p v-if="loading" style="text-align: center;">
          Loading...
        </p> -->

        <center><div v-if="loading" class="spinner"></div></center>
        <center v-if="!loading" id="statusButton">
          <button class="btn btn-success" v-if="status == 'Unfollowed'" @click="toggle_following">Follow</button>
          <button class="btn btn-warning" v-if="status == 'Followed'" @click="toggle_following">Unfollow</button>
        </center>
    </div>
</template>

<script>
    export default {
      data: function () {
        return {
          status: '',
          loading: true
        }
      },
      props: ['instructor_id'],
      mounted() {
          this.$http.get('/status/' + this.instructor_id)
          .then((resp) => {
            this.status = resp.body.status,
            this.loading = false
          })
      },
      methods: {
        toggle_following() {
          this.loading = true
          this.$http.get('/toggle/' + this.instructor_id)
            .then((resp) => {
              this.status = resp.body.status,
              this.loading = false
            })
        }
      }

    }
</script>
