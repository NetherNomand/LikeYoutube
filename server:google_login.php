<?php
// Load Google API PHP Client Library
require_once 'vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setClientId('YOUR_GOOGLE_CLIENT_ID');
$client->setClientSecret('YOUR_GOOGLE_CLIENT_SECRET');
$client->setRedirectUri('http://localhost/my-video-site/server/google_login.php');
$client->addScope('email');
$client->addScope('profile');

if (isset($_GET['code'])) {
    $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    $oauth = new Google_Service_Oauth2($client);
    $userInfo = $oauth->userinfo->get();

    // Store user information in session or database
    $_SESSION['user_id'] = $userInfo->id;
    $_SESSION['name'] = $userInfo->name;
    $_SESSION['email'] = $userInfo->email;
    $_SESSION['profile_picture'] = $userInfo->picture;

    header('Location: ../profile.html');
}
?>
