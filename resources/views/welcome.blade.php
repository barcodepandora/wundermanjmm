<!DOCTYPE html>

<!-- 

welcome.balde.php.

View for register with Facebook

REFERENCES:
https://developers.facebook.com/docs/php/howto/example_facebook_login
-->

<!-- PHP section. -->
<?php

session_start(); // Launching session. Required.

require_once '/home/uzupis/public_html/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';
	// Impoting autoload. TODO: Do it with relative paths.

// Connecting
$fb = new Facebook\Facebook([
  'app_id' => '498588776999846',
  'app_secret' => '2e2fdc3eeaeec1bfec03f16e0ff43037',
  'default_graph_version' => 'v2.5',
]);

// Get Token
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional
$loginUrl = $helper->getLoginUrl('http://projectrevista.com/wundermanjmm/public/login-callback.php', $permissions);

//$_SESSION['me'] = null; // 4 test.

?>

<!-- Blade section. -->
@extends('register') <!-- Importing register blade. -->

@section('body')  <!-- Adding to body. -->

         <div class="form-group">
         
         		 <!-- Form to import data from Facebook, -->
                {!! Form::open(array('url'=> $loginUrl, 'class' => 'form')) !!}
					{!! Form::submit('Importarse de Facebook', 
						  array('class'=>'btn btn-primary btnform')) !!}
      			{!! Form::close() !!}
         </div>
@stop