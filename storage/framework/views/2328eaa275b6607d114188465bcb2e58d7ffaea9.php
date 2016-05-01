<!DOCTYPE html>

<!-- 

global-layout.blade.php.

Template for managing images
Juan Manuel Moreno B. 29/04/2016

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
		<style>
		
			.whitetext {
				color: white;
			}
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
                    
                    	<h1 class="whitetext"><strong>Wunderman Test Image Gallery</strong></h1>

						<!-- A special div for adding more sections from views those import this template. -->
						<div id="body">
							<?php echo $__env->yieldContent('body'); ?>
						</div>

						<!-- Modal view for showing data -->
						<div id="myModal" class="modal fade" role="dialog">
		
							<div class="modal-dialog">

								<div class="modal-content">
			
									<div class="modal-header">
		
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<p class="modal-body">La foto es de</p>
									</div>
									<div class="modal-title">
				
										<h4><?php echo $me; ?></h4>
									</div>
									<div class="modal-footer">
		
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
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