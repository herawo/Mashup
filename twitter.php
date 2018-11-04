<?php
if(isset($_GET['page'])){
    $page = $_GET['page'];
  }else{
    $page=1;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Site Streamer</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="DataTables/datatables.min.css" rel="stylesheet" type="text/css">
    <link href="css/freelancer.min.css" rel="stylesheet">
</head>

<body>
  <div id="wrapper">
    <?php 
    require_once('sidebar.php');
    ?>
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <div class="container-fluid">
        <span><a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Menu</a><h1>Twitter</h1></span>
      </div>
      <a class="twitter-timeline" href="https://twitter.com/MashupTp?ref_src=twsrc%5Etfw">Tweets by MashupTp</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
  </div>
  <div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="DataTables/datatables.min.js"></script>
    <script src="Tableau_avec_tri.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <script src="js/freelancer.min.js"></script>
    <script src="sidebar.js"></script>
  </div>
</body>

</html>