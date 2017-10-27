<template>
  <li class="dropdown">
        <a href="#" class="dropdown-toggle notificaiton"  data-toggle="dropdown" role="button" aria-expanded="false">
          Unread Notifications
            <span class="badge">{{ all_nots_count }}</span>
             <span class="caret"></span>
        </a>

        <ul class="dropdown-menu" role="menu" id="showNofication">
                <li v-for="not in notifs.body">
                    <a :href="not.data.route">
                      {{ not.data.message }}
                      <li role="separator" class="divider"></li>
                    </a>
                </li>
        </ul>
  </li>

</template>

<script>
export default {
  data: function() {
    return {
      notifs: [],
      count: ''
    }
  },
  mounted() {
    this.get_unread()
  },
  methods: {
    get_unread() {
      this.$http.get('/get_unread')
          .then( (nots) => {
            nots.body.forEach( (not) => {
              this.$store.commit('add_not', not)
              this.notifs = nots
            })
          })
    },
    markAsRead() {
      this.$http.post('/mark_as_read')
    }
  },
  computed: {
    all_nots_count() {
      this.count = this.$store.getters.all_nots_count
      return this.$store.getters.all_nots_count
    }
  }
}
</script>
