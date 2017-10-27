<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        <p>{{greeting}} world</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default = {
      data: function () {
        return {
          greeting : 'Hello'
        }
      },
      mounted() {
          alert('Component is ready.')
      }

    }
</script>
