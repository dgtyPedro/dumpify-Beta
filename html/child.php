<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../html/css/childstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    
</style>
<script src="https://kit.fontawesome.com/b0c45caebd.js" crossorigin="anonymous"></script>
<body >
    <div class="container">
        <div class="logoicon"><a href="<?=$BASE_URL?>"><i class="fab fa-spotify"></i> Mother Playlist</i></a></div>
        

    </div>

    <div class="container2">
        <div class="imageplaylist"> <img src="<?=$image['url']?>" width="200"/></div>
        
        <div class="tablemusics">
            <p style="text-align: center; width: 80%; color:#FFE100;"><a href="<?=$birthedChild->external_urls->spotify?>"><?=$birthedChild->external_urls->spotify?></a></p>
            <table>
                <?php

                foreach ($birthedChildTracks->items as $track) {
                    $track = $track->track;
                    $artist = (array)$track->artists[0];
                    $album = get_object_vars($track->album)['name'];

                    // echo "<pre>";
                    // print_r(get_object_vars($track->album)['name']);

                echo    '<tr style="text-align:center;">
                            <td>'. $track->name.'</td>
                            <td>'.$artist['name'].'</td>
                            <td>'.$album.'</td>
                        </tr>'; 
                }

                

                ?>
            </table>

        </div>
    </div>
    
  
      
</body>
</html>
    