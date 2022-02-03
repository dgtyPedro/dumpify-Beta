<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Russo+One&display=swap');
    body{
        background-color: #181212;
        font-family: 'Russo One', sans-serif;
        color: #FEFFFB;
    }
    
    input{
        width: 100%;
        height: 60px;
        border: 0px solid white;
        border-bottom: 2px solid #CC2E2D ;
        font-size: 30px;
        margin-bottom: 10px;
        background-color: transparent;
        color: #FEFFFB;
        font-family: 'Russo One', sans-serif;   
    }
    ::-webkit-input-placeholder { /* Edge */
    color: #CC2E2D;
    font-size: 30px;
    font-family: 'Russo One', sans-serif;
    }

    input:focus, textarea:focus, select:focus{
        outline: none;
        border-bottom: 2px solid #FEFFFB ;
        font-family: 'Russo One', sans-serif;
    }
    button{
        width: 20%;
        height: 60px;
        background-color: #CC2E2D;
        border: #7E1E29 3px solid;
        border-radius:7px;
        color: #181212;
        font-size: 30px;
        font-family: 'Russo One', sans-serif;
        cursor: pointer; 
    }
    .container {
    display: flex;
    }
    
    .container > div {
    flex: 1; /*grow*/
    }

    .logoicon{
        font-size: 40px;
        color: #FFE100;
    }
    .buggy{
        text-align: end;
        font-size: 30px;
        color: #7E1E29;
    }

    .container2 {
    display: flex;
    margin-block: 50px;
    }

    img{
        border-radius:10px;
        -webkit-box-shadow: 0px 0px 36px 13px #7E1E29; 
        box-shadow: 0px 0px 36px 13px #7E1E29;
    }

    .imageplaylist{
        margin-inline: 100px;
    }

    .tablemusics{
        margin-top: -20px;
        width: 100%;
    }

    table, th, td {
    border: 3px solid #7E1E29;
    color: #FEFFFB;
}

    table{
        width: 80%;
    }

    a:visited{
        color:#FFE100;
    }

    a{
        text-decoration: none;
        color: #FFE100;
    }

</style>
<script src="https://kit.fontawesome.com/b0c45caebd.js" crossorigin="anonymous"></script>
<body >
    <div class="container">
        <div class="logoicon"><a href="<?=$BASE_URL?>"><i class="fab fa-spotify"></i> Mother Playlist <i class="fas fa-fighter-jet"></i></a></div>
        

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
    