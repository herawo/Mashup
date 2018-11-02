<link href="display-video.css" rel="stylesheet">

<?php
  $number_vid_disp = 10;
  $ytb_name = 'fauxsceptique';
  $my_key = 'AIzaSyDRFTFQF8zH4ngQ-Od5b7tYaUD8oTkderk';
  $request_id = "https://www.googleapis.com/youtube/v3/channels?key=".$my_key."&forUsername=".$ytb_name."&part=id";

  $response_id = file_get_contents($request_id);
  $decoded_id=json_decode($response_id);
  $id =  $decoded_id->items[0]->id;

  $request_vid = "https://www.googleapis.com/youtube/v3/search?key=".$my_key."&channelId=".$id."&part=snippet,id&order=date&maxResults=50";
  $response_vid = file_get_contents($request_vid);

  $videos = json_decode($response_vid,true);

  echo '<div class="video-container">';
    echo '<div class="video-div">';
      for($i = ($page - 1)*$number_vid_disp; $i< $number_vid_disp*$page; $i++){
        $video = $videos['items'][$i];
        if(isset($video)){
          if(isset($video['id']['videoId'])){
            echo "<div class=video-item>";
              echo '<div class="thumbnail">';
                if(isset($video['snippet']['thumbnails']['medium']['url'])){
                  echo '<a href="http://localhost/Mashup/video.php?video_url='.$video['id']['videoId'].'">';
                    echo '<img class= "video-disp" src ='.$video['snippet']['thumbnails']['medium']['url'].'>';
                  echo '</a>';
                }
              echo '</div>';
              echo '<div class = "text-data">';
                echo '<a href="http://localhost/Mashup/video.php?video_url='.$video['id']['videoId'].'">';
                  echo '<div class="title">';
                    if(isset($video['snippet']['title'])){
                        echo '<p>'.$video['snippet']['title'].'</p>';
                    }
                  echo '</div>';
                  echo '<div class="description">';
                    if(isset($video['snippet']['description'])){
                        echo '<p>'.$video['snippet']['description'].'</p>';
                    }
                  echo '</div>';
                echo '</a>';
              echo '</div>';
            echo "</div>";
          }
        }
        echo "<hr/>";
      }
      echo '</table>';
    echo '</div>';
    echo '<div class="video-page-select">';
      for($i = 1; $i <= count($videos['items'])/$number_vid_disp; $i++){
        echo '<a href="youtube.php?page='.$i.'" class="btn btn-secondary" id="menu-toggle">'.$i.'</a> ';
      }
    echo '</div>';
  echo '</div>';
?>