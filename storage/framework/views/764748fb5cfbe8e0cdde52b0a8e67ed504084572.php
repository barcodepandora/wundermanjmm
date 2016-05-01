<!DOCTYPE html>

<!-- 

register.blade.php.

Template for register
Juan Manuel Moreno B. 29/04/2016

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
		<style>

			.btnform {
				width: 100%;
			}
		</style>
        

<!-- 
	Import section 
	REFERENCE: http://azmind.com/2015/03/15/bootstrap-registration-forms-3-free-responsive-templates/
-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
        
    </head>
    
    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                    
                    	<!-- Left sectio -->
                        <div class="col-sm-7 text">
                            <h1><strong>Wunderman</strong> Test</h1>
                            <div class="description">
                            	<p>
	                            	Esta es mi prueba. Look and feel con <a href="http://azmind.com"><strong>AZMIND</strong></a>
                            	</p>
                            </div>
                            <div class="top-big-link">
                            </div>
                        </div>
                        
                        <!-- Register section -->
                        <div class="col-sm-5 form-box">

							<!-- Form header -->
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Ejercicio forma registro</h3>
                            		<p>Completar</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            
                            <div class="form-bottom">

								<!-- Section for export content -->
								<div id="body">
									<?php echo $__env->yieldContent('body'); ?>
								</div>

								<!-- Form for registering -->
								<?php echo Form::open(array('route' => 'register', 'class' => 'form')); ?>


									<?php echo Form::text('firstname', $name, 
										array('required', 
											  'class'=>'form-control', 
											  'placeholder'=>'Nombre')); ?>

									<?php echo Form::text('lastname', $last, 
										array('required', 
											  'class'=>'form-control', 
											  'placeholder'=>'Apellido')); ?>

									<?php echo Form::text('typeid', null, 
										array('required', 
											  'class'=>'form-control', 
											  'placeholder'=>'Tipo documento')); ?>

									<?php echo Form::text('noid', null, 
										array('required', 
											  'class'=>'form-control', 
											  'placeholder'=>'No. documento')); ?>

									<?php echo Form::text('mobile', null, 
										array('required', 
											  'class'=>'form-control', 
											  'placeholder'=>'Celular')); ?>

									<?php echo Form::text('email', null, 
										array('required', 
											  'class'=>'form-control', 
											  'placeholder'=>'email')); ?>

									<?php echo e(Form::checkbox('terms')); ?>

									<?php echo e(Form::label('Acepto términos y condiciones')); ?>

									<br/>
									<?php echo e(Form::checkbox('receive')); ?>

									<?php echo e(Form::label('Acepto recibir noticias y promociones')); ?>

						
									<br/><div class="form-group">
										<?php echo Form::submit('Registrarse', 
									  		array('class'=>'btn btn-primary  btnform')); ?>

									</div>
						
								<?php echo Form::close(); ?>


								<!-- Form for visiting gallery -->
								<?php echo Form::open(array('route' => 'gallery', 'class' => 'form')); ?>

				
									<div class="form-group">
										<?php echo Form::submit('Vamos a ver fotos', 
											array('class'=>'btn btn-primary btnform')); ?>

									</div>
								<?php echo Form::close(); ?>

		                    </div>
		            	</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
             
    </body>
</html>
