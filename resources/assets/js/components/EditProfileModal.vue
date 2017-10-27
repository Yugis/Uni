<template>
  <div class="Pmodal" :class="custom">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Profile</h5>
        </div>
        <div class="modal-body">
          <center>
            <img :src="src" width="150px" height="150px" style="border-radius: 100px">
          </center>
          <hr>
          <!-- <form enctype="multipart/form-data" action="{{ route('student.profile.edit', ['id' => $student->id, 'slug' => $student->slug]) }}" method="POST"> -->
              <label for="avatar">Update Profile Image</label>
              <input type="file" name="avatar" class="form-control" accept="image/*">
              <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
              <!-- <input type="submit" class="pull-right btn btn-sm btn-primary"> -->
          </form>
        </div>
        <div class="modal-footer">
          <div v-if="status == 'success'" class="spinner"></div>
          <button type="button" class="btn btn-primary" @click="SaveImage">Save changes</button>
          <button type="button" class="btn btn-secondary" @click="$emit('close');" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {

  props: ['src', 'id', 'slug'],
  data: function () {
    return {
      custom: 'animated fadeInDown',
      image: '',
      status: ''
    }
  },
  mounted() {
    // this.$http.get('/' + this.id + '/' + this.slug + '/edit').then((resp) => {
    //   console.log(resp);
    // })
  },
  methods: {
    SaveImage() {
      this.$http.post('/' + this.id + '/' + this.slug + '/edit').then((resp) => {
        console.log(resp)
      })
      // this.$http.get('/' + this.id + '/' + this.slug + '/edit').then((resp) => {
      //   console.log(resp);
      // })
    }
    // imageChanged(e) {
    //   var reader, files = e.target.files;
    //
    //   if (files.length === 0) {
    //     return;
    //   }
    //
    //   reader = new FileReader();
    // }
  }
}
</script>
