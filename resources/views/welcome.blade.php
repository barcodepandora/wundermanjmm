<!DOCTYPE html>

<?php


session_start();

require_once '/home/uzupis/public_html/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';

// CONNECT
$fb = new Facebook\Facebook([
  'app_id' => '498588776999846',
  'app_secret' => '2e2fdc3eeaeec1bfec03f16e0ff43037',
  'default_graph_version' => 'v2.5',
]);

// GET TOKEN
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional
$loginUrl = $helper->getLoginUrl('http://projectrevista.com/wundermanjmm/public/login-callback.php', $permissions);

//$_SESSION['me'] = null;

?>


@extends('register')

@section('body')
         <div class="form-group">
                     {!! Form::open(array('url'=> $loginUrl, 'class' => 'form')) !!}
                        {!! Form::submit('Importarse de Facebook', 
						  array('class'=>'btn btn-primary')) !!}
                     {!! Form::close() !!}
         </div>
@stop