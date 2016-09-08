<?php
session_start();
include_once("Google_Client.php");
include_once("contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '210874259151-18e3irphefmtciphplo52i4hmjmcmpq7.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = 'jIrkLWwBjTcn5_ANJJBwsGCm'; //Google CLIENT SECRET
$redirectUrl = 'http://localhost/login_sosmed/src/Google/autoload.php';  //return url (url to script)
$homeUrl = 'http://localhost/login_sosmed';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('Login');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);

if(isset($_REQUEST['code'])){
	$gClient->authenticate();
	$_SESSION['token_google'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token_google'])) {
	$gClient->setAccessToken($_SESSION['token_google']);
}

if ($gClient->getAccessToken()) {
	$userProfile = $google_oauthV2->userinfo->get();
	//DB Insert
	/*$gUser = new Users();
	$gUser->checkUser('google',$userProfile['id'],$userProfile['given_name'],$userProfile['family_name'],$userProfile['email'],$userProfile['gender'],$userProfile['locale'],$userProfile['link'],$userProfile['picture']);*/
	//$_SESSION['id'] = $userProfile; // Storing Google User Data in Session
	$_SESSION['id'] = $userProfile['id'];
	$_SESSION['nama'] = $userProfile['given_name'];
	$_SESSION['email'] = $userProfile['email'];
	$_SESSION['sosmed'] = "Google"; 
	$_SESSION['foto'] = $userProfile['picture'];
	$_SESSION['token_google'] = $gClient->getAccessToken();
	header("location: ../../index.php");
} else {
	$authUrl = $gClient->createAuthUrl();
}

if(isset($authUrl)) {
	header("location:".$authUrl."");
	//echo '<a href="'.$authUrl.'"><img src="images/glogin.png" alt=""/></a>';
} else {
	echo '<a href="logout.php?logout">Logout</a>';
}

?>