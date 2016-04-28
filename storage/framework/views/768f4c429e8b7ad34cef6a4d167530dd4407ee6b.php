<?php $__env->startSection('body'); ?>
   <div class="row">
      <?php if(count($images) > 0): ?>
         <div class="col-md-12 text-center" >
            <a href="<?php echo e(url('/image/create')); ?>" class="btn btn-primary" role="button">
               Add New Image
            </a>
            <hr />
         </div>
      <?php endif; ?>
      <?php $__empty_1 = true; foreach($images as $image): $__empty_1 = false; ?>
         <div class="col-md-3">
            <div class="thumbnail">
               <img src="<?php echo e(asset($image->file)); ?>" />
               <div class="caption">
                  <h3><?php echo e($image->caption); ?></h3>
                  <p><?php echo substr($image->description, 0,100); ?></p>
                  <p>
                     <div class="row text-center" style="padding-left:1em;">
                     <a href="<?php echo e(url('/image/'.$image->id.'/edit')); ?>" class="btn btn-warning pull-left">Edit</a>
                     <span class="pull-left">&nbsp;</span>
                     <?php echo Form::open(['url'=>'/image/'.$image->id, 'class'=>'pull-left']); ?>

                        <?php echo Form::hidden('_method', 'DELETE'); ?>

                        <?php echo Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick'=>'return confirm(\'Are you sure?\')']); ?>

                     <?php echo Form::close(); ?>

                     </div>
                  </p>
               </div>
            </div>
         </div>
      <?php endforeach; if ($__empty_1): ?>
         <p>No images yet, <a href="<?php echo e(url('/image/create')); ?>">add a new one</a>?</p>
      <?php endif; ?>
   </div>
   <div align="center"><?php echo $images->render(); ?></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('global-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>