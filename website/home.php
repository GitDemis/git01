<?php
  $page_title = 'Home Page';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('admin.php', false);}
  $user_p = find_by_id('users',$_SESSION['user_id']);
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php// echo display_msg($msg); ?>
  </div>
 <div class="col-md-12">
    <div class="panel">
      <div class="jumbotron text-center">
         <!-- <h1>Esta es su nueva página de inicio</h1> -->
        <h1>Bienvenido <?php echo $user_p['name']; ?></h1>
      </div>
    </div>
 </div>
</div>
<?php include_once('layouts/footer.php'); ?>
