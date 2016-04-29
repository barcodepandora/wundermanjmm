
<!-- 

login-callback.php.

Callback to request a connection with Facebook

TODO: How to create a callback from a blade.

REFERENCES:
https://developers.facebook.com/docs/php/howto/example_facebook_login
-->

<!-- PHP section. -->
<?php

session_start(); // Launching session. Required.

require_once '/home/uzupis/public_html/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php'; // autoload

// Creating instance de app de facebook
$fb = new Facebook\Facebook([
  'app_id' => '498588776999846',
  'app_secret' => '2e2fdc3eeaeec1bfec03f16e0ff43037',
  'default_graph_version' => 'v2.5',
]);

$helper = $fb->getRedirectLoginHelper(); // Helper

// Token. Required for getting user.
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

// Validating token en la sesion.
if (! isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}



// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
echo '<h3>Metadata</h3>';
var_dump($tokenMetadata);

$_SESSION['fb_access_token'] = (string) $accessToken;

// User is logged in with a long-lived access token.
// You can redirect them to a members-only page.
//header('Location: https://example.com/members.php');

// Getting GraphUser
try {
  // Get the Facebook\GraphNodes\GraphUser object for the current user.
  // If you provided a 'default_access_token', the '{access-token}' is optional.
  $response = $fb->get('/me', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$me = $response->getGraphUser();

// Loading contents to session.
// TODO: *How to pass object without errors *Why we can't get getFirstName or getLastName?
//$_SESSION['me'] = $me;
//$_SESSION['first'] = $me->getFirstName();
$_SESSION['first'] = $me->getName();

// Redirecting
// TODO: Get a more elegant way to manage views
header('Location: http://projectrevista.com/wundermanjmm/public');

?>