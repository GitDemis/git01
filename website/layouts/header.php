<?php
/*date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fechaActual = date('Y-m-d H:i:s');
    var_dump('Esta es la fecha:'.$fechaActual);*/
require_once('includes/load.php');
   $user = current_user(); 
//    $sql="SELECT fecha FROM `history` GROUP BY lote ORDER by id DESC LIMIT 1"; 
//    $result = $db->query($sql);
//    $hora = mysqli_fetch_array($result);
//    $horas = date_create($hora[0]);
//    $fecha = date_format($horas,  'd/m/Y H:i:s');

$sql="SELECT fecha FROM history GROUP BY lote ORDER BY fecha DESC LIMIT 1"; 
// >>>> Activar cuando el servidor sea productivo
// $sql = "SELECT now() as fechaOri, DATE_SUB(now(),INTERVAL '5-13' HOUR_MINUTE) as fechaAJU, DATE_SUB(fecha,INTERVAL '5-13' HOUR_MINUTE) as fechaDB FROM history GROUP BY lote ORDER BY fecha DESC LIMIT 1";
//    $sql = "SELECT DATE_SUB(fecha,INTERVAL '5-13' HOUR_MINUTE) as fecha FROM history GROUP BY lote ORDER BY fecha DESC LIMIT 1";
   $result = $db->query($sql);
   while($row = mysqli_fetch_array($result)){
    $fecha = date_create($row["fecha"]);
    $fechaHora = date_format($fecha,  'd/m/Y H:i:s');
   }

?>
<!DOCTYPE html>
  <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title><?php if (!empty($page_title))
           echo remove_junk($page_title);
            elseif(!empty($user))
           echo ucfirst($user['name']);
            else echo "Ejecución Presupuestaria";?>
    </title>
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="libs/css/main.css" />
      <!-- DataTables -->
    <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- <script>
        function getfyh(){
            // var f = new Date();
            // console.log(f.getFullYear() + "-" + ("0" + (f.getMonth() + 1)).slice(-2) + "-" + ("0" + f.getDate()).slice(-2) + " " +
            //             f.getHours() + ":" + f.getMinutes() + ":" + f.getSeconds());
            // var fechahora = f.getFullYear() + "-" + ("0" + (f.getMonth() + 1)).slice(-2) + "-" + ("0" + f.getDate()).slice(-2) + " " + f.getHours() + ":" + f.getMinutes() + ":" + f.getSeconds()
          return 'hola';  
        }
        // getfyh();
    </script> -->
    <style>
           .CellWithComment{position:relative;}
           .CellComment
           {
               visibility: hidden;
               width: 500px;
               position:absolute; 
               z-index:100;
               text-align: Left;
               opacity: 0.5;
               transition: opacity 1s;
               border-radius: 6px;
               background-color: yellow;
               padding:3px;
               top: 5px; 
               left:50px;
           }   
           .CellWithComment:hover span.CellComment {visibility: visible;opacity: 1;}
    </style>
  </head>
  <body>
  <?php if ($session->isUserLoggedIn(true)): ?>
    <header id="header">
      <div class="logo pull-left"> Presupuestos </div>
      <div class="header-content">
      <div class="header-date pull-left">
      <strong><?php echo 'Fecha de última importación: '.$fechaHora;?></strong>
      </div>
      <div class="pull-right clearfix">
        <ul class="info-menu list-inline list-unstyled">
          <li class="profile">
            <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
              <img src="uploads/users/<?php echo $user['image'];?>" alt="user-image" class="img-circle img-inline">
              <span><?php echo remove_junk(ucfirst($user['name'])); ?> <i class="caret"></i></span>
            </a>
            <ul class="dropdown-menu">
              <li>
                  <a href="profile.php?id=<?php echo (int)$user['id'];?>">
                      <i class="glyphicon glyphicon-user"></i>
                      Perfil
                  </a>
              </li>
             <li>
                 <a href="edit_account.php" title="Editar cuenta">
                     <i class="glyphicon glyphicon-cog"></i>
                     Configuración
                 </a>
             </li>
             <li class="last">
                 <a href="logout.php">
                     <i class="glyphicon glyphicon-off"></i>
                     Salir
                 </a>
             </li>
           </ul>
          </li>
        </ul>
      </div>
     </div>
    </header>
    <div class="sidebar">
      <?php if($user['user_level'] === '1'): ?>
        <!-- admin menu -->
      <?php include_once('admin_menu.php');?>

      <?php elseif($user['user_level'] === '2'): ?>
        <!-- Special user -->
      <?php include_once('special_menu.php');?>

      <?php elseif($user['user_level'] === '3'): ?>
        <!-- User menu -->
      <?php include_once('user_menu.php');?>

      <?php endif;?>

   </div>
<?php endif;?>

<div class="page">
  <div class="container-fluid">
