<!DOCTYPE html>

<?php

$name = null;
$last = null;

if (isset($_SESSION['first']) && !empty($_SESSION['first'])) {

	$name = $_SESSION['first'];
	//$last = $me->getLastName();
}

/*if (isset($_SESSION['me']) && !empty($_SESSION['me'])) {

	$me = $_SESSION['me'];
	$name = $me->getName();
	//$last = $me->getLastName();
}*/

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
        
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Hola. esta es mi prueba para Wunderman</div>
                
         <div id="body">
            <?php echo $__env->yieldContent('body'); ?>
         </div>

                <div class="form-group">

					<?php echo Form::open(array('route' => 'sandy', 'class' => 'form')); ?>


						<?php echo Form::text('name', $name, 
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


					<?php echo Form::close(); ?>


					<?php echo Form::open(array('route' => 'gallery', 'class' => 'form')); ?>

				
						<br/><div class="form-group">
							<?php echo Form::submit('Registrarse', 
						  array('class'=>'btn btn-primary')); ?>

						</div>
						
						<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

					<?php echo Form::close(); ?>


					<?php echo Form::open(array('route' => 'gallery', 'class' => 'form')); ?>

				
						<br/><div class="form-group">
							<?php echo Form::submit('Vamos a ver fotos', 
						  array('class'=>'btn btn-primary')); ?>

						</div>
						
						<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

					<?php echo Form::close(); ?>

										
				</div>

            </div>
        </div>
    </body>
</html>
