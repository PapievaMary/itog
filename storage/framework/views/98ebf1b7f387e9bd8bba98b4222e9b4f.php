<?php $__env->startSection('content'); ?>
<div class="container">
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <div class="navbar-brand"><h1><?php echo e($titleReport); ?></h1></div>
        </div>
    </nav>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Warranty</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $things; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($thing->name); ?></td>
                    <td><?php echo e($thing->description); ?></td>
                    <td><?php echo e($thing->wrnt); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/p/papievpn/papievpn.beget.tech/resources/views/things/report.blade.php ENDPATH**/ ?>