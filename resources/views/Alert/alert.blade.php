<script>
    $(document).ready(function(){
        // console.log("ready");
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });
    @if(Session::has('alert-login-success'))
        Toast.fire({
        icon: 'success',
        title: '{{Session::get('alert-login-success')}}'
      })
    @elseif(Session::has('alert-store-success'))    
        Toast.fire({
        icon: 'success',
        title: '{{Session::get('alert-store-success')}}'
      })
    @elseif(Session::has('alert-edit-success'))
        Toast.fire({
        icon: 'warning',
        title: '{{Session::get('alert-edit-success')}}'
      })
    @elseif(Session::has('alert-deleted-success'))
        Toast.fire({
        icon: 'error',
        title: '{{Session::get('alert-deleted-success')}}'
      })
    @elseif(Session::has('alert-login-wrong'))
        Toast.fire({
        icon: 'error',
        title: '{{Session::get('alert-login-wrong')}}'
      })
      @elseif(Session::has('alert-register-success'))    
        Toast.fire({
        icon: 'success',
        title: '{{Session::get('alert-register-success')}}'
      })
    @endif
    })
</script>