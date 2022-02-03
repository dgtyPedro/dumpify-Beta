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
    <form method="post" action="child" style="margin-inline: 10%; margin-top: 100px;">
        <input type="hidden" value="<?=$_GET['code']?>" name="code" required>
        <input type="hidden" value="<?=$refreshToken?>" name="refresh" required>
        <input type="text" name="motherlink" placeholder="Mother Playlist Link" required><br/>
        <input type="text" name="number" placeholder="Number of Songs for the Child (max. 100)" required><br/>
        <input type="text" name="childlink" placeholder="Child Playlist Link" required><br/>
        <div class="lastrow" style="color: #FFE100;"> <button type="submit">Give Birth</button> You MUST own both playlists.</div>
    </form>
</body>
</html>