<!DOCTYPE html>

<!-- 

register.blade.php.

Template for register

-->


<!-- PHP section. -->
<?php

// Fields for client
$name = null;
$last = null;

// We validate if there's previous values
if (isset($_SESSION['first']) && !empty($_SESSION['first'])) {

	$name = $_SESSION['first'];
	//$last = $me->getLastName();
}

// Trying to load objects
/*if (isset($_SESSION['me']) && !empty($_SESSION['me'])) {

	$me = $_SESSION['me'];
	$name = $me->getName();
	$last = $me->getLastName();
}*/

?>

<!-- Blade section. -->
<html>
    <head>
        <title>Wunderman test with Laravel</title>

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
        
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <div class="container">
        
            <div class="content">
            
                <div class="title">Hi. Presenting Wunderman test</div>
                
         		<div id="body">
            		@yield('body')
         		</div>

                <div class="form-group">

					<!-- Form for registering -->
					{!! Form::open(array('route' => 'register', 'class' => 'form')) !!}

						{!! Form::text('firstname', $name, 
							array('required', 
								  'class'=>'form-control', 
								  'placeholder'=>'Nombre')) !!}
						{!! Form::text('lastname', $last, 
							array('required', 
								  'class'=>'form-control', 
								  'placeholder'=>'Apellido')) !!}
						{!! Form::text('typeid', null, 
							array('required', 
								  'class'=>'form-control', 
								  'placeholder'=>'Tipo documento')) !!}
						{!! Form::text('noid', null, 
							array('required', 
								  'class'=>'form-control', 
								  'placeholder'=>'No. documento')) !!}
						{!! Form::text('mobile', null, 
							array('required', 
								  'class'=>'form-control', 
								  'placeholder'=>'Celular')) !!}
						{!! Form::text('email', null, 
							array('required', 
								  'class'=>'form-control', 
								  'placeholder'=>'email')) !!}
						{{ Form::checkbox('terms') }}
						{{ Form::label('Acepto términos y condiciones') }}
						<br/>
						{{ Form::checkbox('receive') }}
						{{ Form::label('Acepto recibir noticias y promociones') }}
						
						<br/><div class="form-group">
							{!! Form::submit('Registrarse', 
						  array('class'=>'btn btn-primary')) !!}
						</div>
						
					{!! Form::close() !!}

					<!-- Form for visiting gallery -->
					{!! Form::open(array('route' => 'gallery', 'class' => 'form')) !!}
				
						<br/><div class="form-group">
							{!! Form::submit('Vamos a ver fotos', 
						  array('class'=>'btn btn-primary')) !!}
						</div>
					{!! Form::close() !!}
										
				</div>
            </div>
        </div>        
    </body>
</html>
