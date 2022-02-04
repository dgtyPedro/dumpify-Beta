<?php 

require '../vendor/autoload.php';
require '../config.php';

$session = new SpotifyWebAPI\Session(
    $CLIENT_ID,
    $CLIENT_SECRET,
    'http://localhost/motherPlaylist/'
);

if (!isset($_POST['motherlink']) && !isset($_POST['childlink']) && !isset($_POST['number'])){
    die();
}

$api = new SpotifyWebAPI\SpotifyWebAPI();
if (isset($_POST['code'])) {

    $session->refreshAccessToken($_POST['refresh']);
    $accessToken = $session->getAccessToken();
    $refreshToken = $session->getRefreshToken();
    $api->setAccessToken($accessToken);

    $motherlink = $_POST['motherlink'];
    $childlink = $_POST['childlink'];
    $number = $_POST['number'];

    // if ($number>100){
    //     $number = 100;
    // }

    $ml = substr(substr($motherlink, 34),0, -20); //Extract Mother's Link
    $cl = substr(substr($childlink, 34),0, -20); //Extract Child's Link

    $x = 0;
    $musics = array( );

    while($x<=10){
        $playlistTracks = $api->getPlaylistTracks($ml, ['offset' => $x*100]); //Get X chunk of Mother's Playlist, ex: $x = 1 (1st music - 100th music); $x = 2 (101th music - 200th music)
        foreach ($playlistTracks->items as $track) {
            $track = $track->track;
            $musics[$track->id] = $track->id;
        } 
        $x+=1;
    }

        $random = array_rand($musics, $number);
        $arraychunks = count($random)/100; 

        if ($arraychunks<=1){
            $api->replacePlaylistTracks($cl, $random);
        }else{
            $y = 0;
            $api->replacePlaylistTracks($cl, null);
            while ($y<$arraychunks*100){
                $chunktracks = array_slice($random, $y, $y+100);
                $api->addPlaylistTracks($cl, $chunktracks);
                $y = $y + 100;
            }

        }
        

        $birthedChild = $api->getPlaylist($cl);

        $birthedChildImage = $api->getPlaylistImage($cl);
        $image = (array)$birthedChildImage[0];

        $birthedChildTracks = $api->getPlaylistTracks($cl);
        include ('../html/child.php');
   
} else {
    header('Location: ' . $session->getAuthorizeUrl($options));
    die();
}