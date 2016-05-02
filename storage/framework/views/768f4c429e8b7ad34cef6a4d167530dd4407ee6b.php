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

	<!-- Javascript -->
	<script type="text/javascript">
	
		 /*
		 	Orders div images by caption field
		 	
		 	REFERENCE: http://jsfiddle.net/NfVxk/
		 */
		function order_caption() {
	
			var div = $('#photos');
			var listitems = div.children('.col-md-3');
			listitems.sort(function (a, b) {
	
				//alert("order_caption do it 4 " + $(a).attr('caption'));
				return (+$(a).attr('caption') > +$(b).attr('caption')) ?
				1 : (+$(a).attr('caption') < +$(b).attr('caption')) ? 
				-1 : 0;
			})
			$.each(listitems, function (idx, itm) { div.append(itm); });
		}

		/*
			Orders div images by date field
			
			REFERENCE: http://jsfiddle.net/NfVxk/
		 */
		 function order_date() {
 
				var div = $('#photos');
				var listitems = div.children('.col-md-3');
				listitems.sort(function (a, b) {
		
					return (+$(a).attr('saved') > +$(b).attr('saved')) ?
					-1 : (+$(a).attr('saved') < +$(b).attr('saved')) ? 
					1 : 0;
				})
				$.each(listitems, function (idx, itm) { div.append(itm); });
			}

	</script>
	
   <div class="row" id="photos"> <!-- Wrapper image list section-->
   
      <?php if(count($images) > 0): ?> <!-- There are images. -->
      
         <div class="col-md-12 text-center" caption="a" saved="1" >
         
         	<!-- Loading view for adding another new image. -->
			<?php echo Form::open(['route'=>'nueva', 'class'=>'pull-left']); ?>

				<?php echo Form::hidden('client', $client->id); ?> <!-- Hidden client. -->
				<?php echo Form::submit('Add another new image', ['class' => 'btn btn-primary']); ?>

			<?php echo Form::close(); ?>


			<input type="button" value="Ordenar por titulo" onclick="order_caption();"/>
			<input type="button" value="Ordenar por fecha" onclick="order_date();"/>
			
			 <!-- 
				<a href="<?php echo e(url('/image/create')); ?>" class="btn btn-primary" role="button"> <!-- link for adding -->
            
               		Add new image
            	</a>
			 -->
            
            <hr />
         </div>
      <?php endif; ?>
      
      <?php $__empty_1 = true; foreach($images as $image): $__empty_1 = false; ?> <!-- Loading section. -->
      
         <div class="col-md-3"  caption="<?php echo e($image->caption); ?>" saved="<?php echo e($image->created_at); ?>" > <!-- Image section-->
         
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
      
      	<!-- Loading view for adding the first image. -->
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