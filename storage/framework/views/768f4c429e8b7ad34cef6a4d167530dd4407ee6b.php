<!-- 

image-list.blade.php.

Extension for loading gallery
Juan Manuel Moreno B. 29/04/2016

REFERENCES:
http://the-amazing-php.blogspot.com.co/2015/06/laravel-5.1-image-gallery-crud.html
-->


<!--
	Body section
	This will be added in yield field of extends blade
-->
<?php $__env->startSection('body'); ?>

   <div class="row">
   
      <?php if(count($images) > 0): ?> <!-- There are images. -->
      
         <div class="col-md-12 text-center" >
         
         	<?php echo e(Form::hidden('client', $client->id)); ?> 

			<?php echo Form::open(['route'=>'nueva', 'class'=>'pull-left']); ?>

				<?php echo Form::hidden('client', $client->id); ?> <!-- Hidden client. -->
				<?php echo Form::submit('Add another new image', ['class' => 'btn btn-primary']); ?>

			<?php echo Form::close(); ?>


			 <!-- 
				<a href="<?php echo e(url('/image/create')); ?>" class="btn btn-primary" role="button"> <!-- link for adding -->
            
               		Add new image
            	</a>
			 -->
            
            <hr />
         </div>
      <?php endif; ?>
      
      <?php $__empty_1 = true; foreach($images as $image): $__empty_1 = false; ?> <!-- Loading section. -->
      
         <div class="col-md-3">
            <div class="thumbnail">

            	<a  data-toggle="modal" data-target="#myModal">
               		<img src="<?php echo e(asset($image->file)); ?>"/>
               	</a>

               <div class="caption">
               
                  <h3><?php echo e($image->caption); ?></h3>
                  <p><?php echo substr($image->description, 0,100); ?></p>
                  <p>
                     <div class="row text-center" style="padding-left:1em;">

                     	<span class="pull-left">&nbsp;</span>
                     	
							<?php echo Form::open(['url'=>'/image/'.$image->id, 'class'=>'pull-left']); ?>

								<?php echo Form::hidden('_method', 'DELETE'); ?>

								<?php echo Form::submit('Remove', ['class' => 'btn btn-danger btnform', 'onclick'=>'return confirm(\'Are you sure?\')']); ?>

							<?php echo Form::close(); ?>

                     </div>
                  </p>
               </div>
            </div>
         </div>
      <?php endforeach; if ($__empty_1): ?>
      
		<?php echo Form::open(['route'=>'nueva', 'class'=>'pull-left']); ?>

			<?php echo Form::hidden('client', $client->id); ?> <!-- Hidden client. -->
			<?php echo Form::submit('No images yet. Add a new one', ['class' => 'btn btn-primary']); ?>

		<?php echo Form::close(); ?>


         <!-- 
         	<p>No images yet, <a href="<?php echo e(url('/image/create')); ?>">add a new one</a>?</p>
         -->
      <?php endif; ?>
   </div>
   <div align="center"><?php echo $images->render(); ?></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('global-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>