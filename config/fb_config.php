<?php
session_start();
// added in v4.0.0
require_once '../src/Facebook/autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '1196329337084011','e8db428f9518eef3b09764eea9a632e7' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://localhost/login_sosmed/config/fb_config.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {


  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();

     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');
      $foto = $graphObject->getProperty('photo-id'); 
	    $_SESSION['id'] = $fbid;           
      $_SESSION['nama'] = $fbfullname;
	    $_SESSION['email'] =  $femail;
      $_SESSION['sosmed'] = "Facebook";
      $_SESSION['foto'] = $foto;
    /* ---- header location after session ----*/
 header("Location: ../index.php");
} else {
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>