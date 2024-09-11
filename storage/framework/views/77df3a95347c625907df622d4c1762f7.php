<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Place</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('places.index')); ?>"> Back</a>
            </div>
        </div>
    </div>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('places.update', $places->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" value="<?php echo e($places->name); ?>">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description"><?php echo e($places->description); ?></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Repair:</strong>
                <select name="repair" class="form-select" aria-label="Пример выбора по умолчанию">
                    <option selected>Откройте это меню выбора</option>
                    <option
                    <?php if($places->repair === 0): ?>
                        selected
                    <?php endif; ?>
                    value="0">Repair</option>
                    <option 
                    <?php if($places->repair === 1): ?>
                        selected
                    <?php endif; ?>
                    value="1">Washing</option>
                  </select>
                </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Work:</strong>
                <select name="work" class="form-select" aria-label="Пример выбора по умолчанию">
                    <option selected>Откройте это меню выбора</option>
                    <option 
                    <?php if($places->work === 0): ?>
                        selected
                    <?php endif; ?>
                    value="0">Waiting</option>
                    <option 
                    <?php if($places->work === 1): ?>
                        selected
                    <?php endif; ?>                   
                    value="1">Working</option>
                  </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/p/papievpn/papievpn.beget.tech/resources/views/places/edit.blade.php ENDPATH**/ ?>