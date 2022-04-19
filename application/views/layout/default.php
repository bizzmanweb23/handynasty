<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title_for_layout; ?></title>

  <?php $this->load->view('layout/stylesheets'); ?>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Preloader -->
  
  <?php $this->load->view('layout/top_nav'); ?>
  <!--?php $this->load->view('layout/navbar'); ?-->
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar ">
    <!-- Brand Logo -->
    

    <?php $this->load->view('layout/sidebar'); ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <?php echo $content_for_layout ?>
  <!-- /.content-wrapper -->
  <?php $this->load->view('layout/footer'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php $this->load->view('layout/scripts'); ?>
</body>
</html>
