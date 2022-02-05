<?php 

require 'vendor/autoload.php';
require 'config.php';

$session = new SpotifyWebAPI\Session(
    $CLIENT_ID,
    $CLIENT_SECRET,
    'http://localhost/MotherS_Playlist/'
);

$options = [
    'scope' => [
		'playlist-modify-public',
		'playlist-modify-private',
		'playlist-read-private',
		'playlist-read-collaborative',
    ],
	'show_dialog' => true
];


$api = new SpotifyWebAPI\SpotifyWebAPI();
if (isset($_GET['code'])) {
    
    try{
        $session->requestAccessToken($_GET['code']);
        $refreshToken = $session->getRefreshToken();
        $api->setAccessToken($session->getAccessToken());
        include ('html/home.php');
    }catch (exception $e){
        header('Location: ' . $session->getAuthorizeUrl($options));
        die();
    }
    
} else {
    header('Location: ' . $session->getAuthorizeUrl($options));
    die();
}