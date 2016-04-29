<!DOCTYPE html>

<!-- 

global-layout.blade.php.

Template for managing images

REFERENCES:
http://the-amazing-php.blogspot.com.co/2015/06/laravel-5.1-image-gallery-crud.html
-->

<!-- PHP section. -->
<?php

session_start(); // Launching session
$me = $_SESSION['first']; // Getting name from user.

?>

<!-- Blade section. -->
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Gallery for Wunderman test</title>

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

      <div id="container">
         <h1>Laravel 5 Image Gallery</h1>

		<!-- A special div for adding more sections from views those import this template. -->
         <div id="body">
            @yield('body')
         </div>
      </div>

<!-- Modal view for showing data -->
	<div id="myModal" class="modal fade" role="dialog">
  		
  		<div class="modal-dialog">

    	<div class="modal-content">
      		
      		<div class="modal-header">
        
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">La foto es de</h4>
      		</div>
      		<div class="modal-body">
        		
        		<p><?php echo $me; ?></p>
      		</div>
      		<div class="modal-footer">
        
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      		</div>
    	</div>
  		</div>
	</div>            
   </body>
</html>