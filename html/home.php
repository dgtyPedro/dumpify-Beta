<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./html/css/homestyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<script src="https://kit.fontawesome.com/b0c45caebd.js" crossorigin="anonymous"></script>
<body >
    <div class="container">
    <div class="logoicon"><a href="<?=$BASE_URL?>"><i class="fab fa-spotify"></i> Mother Playlist <i class="fas fa-fighter-jet"></i></a></div>
        
      </div>
    <form method="post" action="functions/child" style="margin-inline: 10%; margin-top: 100px;">
        <input type="hidden" value="<?=$_GET['code']?>" name="code" required>
        <input type="hidden" value="<?=$refreshToken?>" name="refresh" required>
        <input type="text" name="motherlink" placeholder="Mother Playlist Link" required><br/>
        <input type="text" name="number" placeholder="Number of Songs for the Child (max. 100)" required><br/>
        <input type="text" name="childlink" placeholder="Child Playlist Link" required><br/>
        <div class="lastrow" style="color: #FFE100;"> <button type="submit">Give Birth</button> You MUST own both playlists.</div>
    </form>
</body>
</html>