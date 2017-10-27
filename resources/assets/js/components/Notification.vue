<template>
    <div>
      <!-- <div id="notification-info" class="alert alert-info animated fadeInUp" role="alert" name="noti" v-if="display == true">
        You have a new notification! -->
      </div>
    </div>
</template>

<script>
    export default {
      // data: function () {
      //   return {
      //     display: false
      //   }
      // },
      mounted() {
          this.listen()
      },
      props: ['id'],
      methods: {
        listen() {
            Echo.private('App.Student.' + this.id)
                .notification( (notification) => {

                    this.$store.commit('add_not', notification)

                    document.getElementById('notification_audio').play()
                })
        }
      }
    }
</script>
