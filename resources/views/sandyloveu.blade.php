<!DOCTYPE html>


<?php


require_once '/home/uzupis/public_html/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';

// CONNECT
$fb = new Facebook\Facebook([
  'app_id' => '498588776999846',
  'app_secret' => '2e2fdc3eeaeec1bfec03f16e0ff43037',
  'default_graph_version' => 'v2.5',
]);

// GET TOKEN
/*$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional
$loginUrl = $helper->getLoginUrl('http://{your-website}/login-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';*/

?>

<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Hola. esta es mi prueba para Wunderman</div>
                
                <div class="form-group">

					{!! Form::open(array('route' => 'sandy', 'class' => 'form')) !!}

						{!! Form::text('name', null, 
							array('required', 
								  'class'=>'form-control', 
								  'placeholder'=>'Aqui va un nombre de facebook')) !!}
				
						<div class="form-group">
							{!! Form::submit('Trae tu facebook', 
						  array('class'=>'btn btn-primary')) !!}
						</div>
					{!! Form::close() !!}

					{!! Form::open(array('route' => 'gallery', 'class' => 'form')) !!}
				
						<div class="form-group">
							{!! Form::submit('Vamos a ver fotos', 
						  array('class'=>'btn btn-primary')) !!}
						</div>
						
						<a data-toggle="modal" href="<?php echo route('boo'); ?>" data-target="#modal">Click me</a>
					{!! Form::close() !!}
					
				</div>

            </div>
        </div>
    </body>
</html>
