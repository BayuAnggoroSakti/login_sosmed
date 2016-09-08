<?php
session_start();
include_once("../src/Google/Google_Client.php");
include_once("../src/Google/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '210874259151-18e3irphefmtciphplo52i4hmjmcmpq7.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = 'RI290-D190LS1_t6kCHLeP7O'; //Google CLIENT SECRET
$redirectUrl = 'http://localhost/login_google';  //return url (url to script)
$homeUrl = 'http://localhost/login_google';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('Login');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>