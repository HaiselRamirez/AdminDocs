<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= COMPANY;?> | <?= $this->uri->segment(1)?></title>
  <link rel="shortcut icon" href="<?=base_url()?>dist/img/icon.ico" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="background: #535657;">
<div class="login-box">
  <!-- /.login-logo -->
  
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1">
        <img src="<?=base_url()?>dist/img/logo.png" class="img-fluid" width="100" alt="">
        <strong>Admin</strong>Docs
      </a>
    </div>
    <div class="card-body">
      <form action="Login/entrar" method="post" id="formLogin">
        <div class="form-group mb-3">
           <div class="input-group">
            <input type="text" class="form-control" id="tUser" name="tUser" placeholder="Usuario">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <span class="text-red" id="eUser"></span>
        </div>
       
        <div class="form-group mb-3">
           <div class="input-group">
            <input type="password" class="form-control" id="tPass" name="tPass" placeholder="Contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock-open"></span>
              </div>
            </div>
          </div>
          <span class="text-red" id="ePass"></span>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block mb-3">
              <i class="fas fa-sign-in-alt text-dark"></i>
              <strong class="ml-2">ENTRAR</strong>
            </button>
            <a href="#"><span class="text-dark">Olvide la contraseña</span></a>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>
  $(function(){
    $("#formLogin").submit(function(s) {
      $("#ePass, #eUser").html('').addClass('d-none');
      s.preventDefault();
      $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        dataType: 'json',
        data: $(this).serialize(),
        success:function(data){
          if(data.error){
            if(data.eUser){
              $("#eUser").html(data.eUser).toggleClass('d-none');
            }
            if(data.ePass){
              $("#ePass").html(data.ePass).toggleClass('d-none');
            }
            if(data.eLogin){
              Swal.fire({
                position: 'center',
                icon: 'error',
                title: data.eLogin
              })
            }
          }else{
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Bienvenid@ ' +data.nombre,
              showConfirmButton: false,
              timer: 2500
            }).then((result) => {
              if (result.dismiss === Swal.DismissReason.timer) {
                location.reload();
              }
            });
          }
        }
      })
      
    });
  });

</script>
</body>
</html>
