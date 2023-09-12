<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/dist/css/adminlte.min.css">

  <style>
    body {
            background-image: url('https://www.enlight.mx/hs-fs/hubfs/Imported_Blog_Media/art-1-Los-sistemas-fotovoltaicos-ante-las-crisis-energeticas-3.jpg?width=900&height=500&name=art-1-Los-sistemas-fotovoltaicos-ante-las-crisis-energeticas-3.jpg'); /* Reemplaza la URL con la dirección de tu imagen en línea */
            background-size: cover; /* Ajusta el tamaño de la imagen para cubrir todo el cuerpo */
            background-repeat: no-repeat; /* Evita que la imagen de fondo se repita */
        }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- 
  <div class="login-logo">
    <a href="../../index2.html"><b>Inicie sesión</b></a>
  </div> -->
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

    <div class="login-logo">
    <a href="../../index2.html"><b>Inicie sesión</b></a>
    </div>
    <?php
    switch($msg)
    {
      case '1':
        $mensaje="Error de ingreso";
        $clase="primary";
        break;
      case '2':
        $mensaje="Acceso no valido";
        $clase="danger";
        break;
      case '3':
        $mensaje="Gracias por usar el sistema";
        $clase="warning";
        break;
      default:
        $mensaje="Ingrese su usuario y clave para iniciar sesion";
        $clase="primary";
        break;

    }
    ?>
      <p class="login-box-msg text-<?php echo $clase;?>"><?php echo $mensaje; ?></p>



<?php

echo form_open_multipart('usuarios/validarusuario', array('id'=>'form1','class'=>'needs-validation','method'=>'post'));

?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" name="login">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>-->
          <!-- /.col -->
          <div class="col-4 mx-auto">
            <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
          </div>
          <!-- /.col -->
        </div>
      
<?php
echo form_close();
?>



      <!--
      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->
      <!--
      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>-->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url();?>adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
