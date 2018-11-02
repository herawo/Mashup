<?php

    $my_key = 'AIzaSyDRFTFQF8zH4ngQ-Od5b7tYaUD8oTkderk';
    

	if(isset($_GET['video_url'])){
        $video_url = $_GET['video_url'];
        $request_vid= "https://www.googleapis.com/youtube/v3/videos?part=snippet&id=".$video_url."&key=".$my_key;
        $response_vid = file_get_contents($request_vid);
        $videos = json_decode($response_vid,true);
        $video = $videos['items'][0];
    }else{
        $ytb_name = 'NemsWorld';
        $request_id = "https://www.googleapis.com/youtube/v3/channels?key=".$my_key."&forUsername=".$ytb_name."&part=id";
        $response_id = file_get_contents($request_id);
        $decoded_id = json_decode($response_id);
        $id =  $decoded_id->items[0]->id;
        $request_vid = "https://www.googleapis.com/youtube/v3/search?key=".$my_key."&channelId=".$id."&part=snippet,id&order=date&maxResults=50";
        $response_vid = file_get_contents($request_vid);
        $videos = json_decode($response_vid,true);
        $video = $videos['items'][0];
        $video_url = $video['id']['videoId'];
    }

    $request_comm = "https://www.googleapis.com/youtube/v3/commentThreads?part=snippet&videoId=".$video_url."&key=".$my_key;
    $response_comm = file_get_contents($request_comm);
    $comments = json_decode($response_comm, true);

    // $fp = fopen('commentaires.json', 'w');
    // fwrite($fp, $response_comm);
    // fclose($fp);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $video['snippet']['title']; ?></title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="video.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">
        <?php 
        require_once('sidebar.php');
        ?>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <span>
                    <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Menu</a><h1><?php echo $video['snippet']['title']; ?></h1>
                </span>
			</div>
			<div class = "container-youtube">
				<div class = "video-player">
				 	<iframe width="100%" height="100%" src= <?php echo"https://www.youtube.com/embed/".$video_url?> > </iframe> 
				</div>
				<div class = "video-comments">
                    <?php
                        foreach($comments['items'] as $comm){
                            echo '<div class = "comment">';
                                echo "<strong>";
                                    echo '<img src='.$comm['snippet']['topLevelComment']['snippet']['authorProfileImageUrl'].'>';
                                    echo $comm['snippet']['topLevelComment']['snippet']['authorDisplayName']." : ";
                                echo "</strong>";
                                echo "<p>";
                                    echo $comm['snippet']['topLevelComment']['snippet']['textDisplay'];
                                echo "</p>";
                            echo "</div>";
                        }
                    ?>
				</div>
			</div>
        </div>

    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="sidebar.js"></script>

</body>

</html>
