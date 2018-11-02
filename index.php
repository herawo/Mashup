<?php
  $ytb_name = 'fauxsceptique';
  $my_key = 'AIzaSyDRFTFQF8zH4ngQ-Od5b7tYaUD8oTkderk';
  $request_id = "https://www.googleapis.com/youtube/v3/channels?key=".$my_key."&forUsername=".$ytb_name."&part=id";
  $response_id = file_get_contents($request_id);
  $decoded_id=json_decode($response_id);
  $id =  $decoded_id->items[0]->id;
  $request_vid = "https://www.googleapis.com/youtube/v3/search?key=".$my_key."&channelId=".$id."&part=snippet,id&order=date&maxResults=50";
  $response_vid = file_get_contents($request_vid);
  $videos = json_decode($response_vid,true);
  $video = $videos['items'][0];
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
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="DataTables/datatables.min.css" rel="stylesheet" type="text/css"> -->
    <!-- <link href="css/freelancer.min.css" rel="stylesheet"> -->
    <link href="page_d_accueil.css" rel="stylesheet">
</head>

<body>
  <div id="wrapper">
    <?php 
    require_once('sidebar.php');
    ?>
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <div class="container-fluid">
        <h1>Bienvenue sur le site</h1>
        <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Menu</a>
        <p></p>
      </div>
      <div class = "tabs">
        <div class = "tab-accueil">
          <div class = "title">
            <a href="http://localhost/site-streaming/Sources/youtube.php"><h3>Youtube</h3></a>
          </div>
          <div class = "show">
            <div class="">
              <?php
              if(isset($video['snippet']['thumbnails']['medium']['url'])){
                echo '<a href="https://www.youtube.com/watch?v='.$video['id']['videoId'].'">';
                  echo '<img class= "last-video" src ='.$video['snippet']['thumbnails']['medium']['url'].'>';
                echo '</a>';
              }
              ?>
            </div>
          </div>
        </div>
      </div>
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