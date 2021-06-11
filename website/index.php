<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('admin.php', false);}
?>
<!-- <?php //include_once('layouts/header.php'); ?> -->
<!-- Agrego Nico -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Theme style -->
  <link rel="stylesheet" href="libs/css/styles.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- Font Awesome -->
  <link rel="stylesheet" href="libs/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
      <!-- DataTables -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">    
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>


<body class="hold-transition login-page">
  <div class="container">
    <div class="row align-items-sm-center">
      <div class="col-5 mx-auto d-sm-none d-block">
        <img src="libs/images/sigemin.png" class="img-fluid">
      </div>
      <div class="login-box pb-5 mx-auto mt-5">
        <!-- /.login-logo -->
        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Iniciar Sesión</p>
            <form method="post" action="auth.php" class="clearfix">
              <div class="input-group mb-3">
                <input type="texto" class="form-control" name="username" placeholder="Email" id="login-email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" placeholder="Contraseña" id="login-password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="icheck-primary">
                    <input type="checkbox" id="remember" >
                    <label for="remember">
                      <small>Recordar Contraseña</small>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <!-- /.col -->
                <div class="col-7 mx-auto mt-5">
                  <!-- <button type="submit" class="btn btn-info  pull-right">Entrar</button> -->
                   <button type="submit" class="btn btn-secondary btn-block">Ingresar <i class="fas fa-sign-in-alt"></i></button>
                </div>
                <!-- /.col -->
              </div>
            </form>

            <!-- <p class="mt-4 mb-0 text-center">
              <a href="forgot-password.html">Olvidé mi contraseña</a>
            </p>
            <p class="mb-0 text-center">
              <a href="register.html" class="text-center">Registrarme</a>
            </p> -->
          </div>
          <!-- /.login-card-body -->
        </div>
      </div>
      <!-- /.login-box -->
      <div class="col-5 mx-auto d-sm-none d-block">
        <img src="libs/images/login-bk1.png" class="img-fluid">
      </div>
    </div> <!-- ROW-->
  </div> <!-- container-->
  <script src="plugins/jquery/jquery.min.js"></script>
</body>

<!-- Comienza codigo original  -->
<!-- <div class="login-page">

    <div class="text-center">
       <h1>Bienvenido</h1>
       <p>Iniciar sesión </p>
     </div>
     <?php // echo display_msg($msg); ?>

      <form method="post" action="auth.php" class="clearfix">
        <div class="form-group">
              <label for="username" class="control-label">Usuario</label>
              <input type="name" class="form-control" name="username" placeholder="Usuario">
        </div>
        <div class="form-group">
            <label for="Password" class="control-label">Contraseña</label>
            <input type="password" name= "password" class="form-control" placeholder="Contraseña">
        </div>

        <div class="form-group">
                <button type="submit" class="btn btn-info  pull-right">Entrar</button>
        </div>
    </form>
</div> -->
<?php include_once('layouts/footer.php'); ?>


