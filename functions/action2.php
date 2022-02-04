<?php 

require '../vendor/autoload.php';
require '../config.php';

$session = new SpotifyWebAPI\Session(
    $CLIENT_ID,
    $CLIENT_SECRET,
    'http://localhost/motherPlaylist/'
);

$options = [
    'scope' => [
		'ugc-image-upload',
		'user-read-recently-played',
		'user-top-read',
		'user-read-playback-position',
		'user-read-playback-state',
		'user-modify-playback-state',
		'user-read-currently-playing',
		'app-remote-control',
		'streaming',
		'playlist-modify-public',
		'playlist-modify-private',
		'playlist-read-private',
		'playlist-read-collaborative',
		'user-follow-modify',
		'user-follow-read',
		'user-library-modify',
		'user-library-read',
		'user-read-email',
		'user-read-private'
    ],
	'show_dialog' => true
];

$api = new SpotifyWebAPI\SpotifyWebAPI();
if (isset($_POST['code'])) {


    $session->refreshAccessToken($_POST['refresh']);
    $accessToken = $session->getAccessToken();
    $refreshToken = $session->getRefreshToken();
    $api->setAccessToken($accessToken);

    $motherlink = $_POST['motherlink'];
    $childlink = $_POST['childlink'];
    $number = $_POST['number'];

    $ml = substr(substr($motherlink, 34),0, -20);
    $cl = substr(substr($childlink, 34),0, -20);
    $n = $number;

    echo "motherlink: " . substr(substr($motherlink, 34),0, -20);
    echo "<br/>childlink: " . substr(substr($childlink, 34),0, -20);
    echo "<br/>number: " . $number;



        $playlistTracks = $api->getPlaylistTracks($ml);
        $musics = array( );

        foreach ($playlistTracks->items as $track) {
            $track = $track->track;
            $musics[$track->id] = $track->id;
            echo '<a href="' . $track->external_urls->spotify . '">' . $track->name.$track->id . '</a> <br>' ;
        }
        
        $random = array_rand($musics, $n);

        $playlist2 = $api->getPlaylist($cl);

        $api->replacePlaylistTracks($cl, $random);



   
} else {

    header('Location: ' . $session->getAuthorizeUrl($options));
    die();
}