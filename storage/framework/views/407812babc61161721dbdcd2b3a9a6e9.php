<!-- resources/views/things/index.blade.php -->


<?php $__env->startSection('content'); ?>
<div class="container">

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <div class="navbar-brand"><h1>Place</h1></div>
            <div class="d-flex">
                <a class="btn btn-success" href="<?php echo e(route('places.create')); ?>" role="button">Create</a>
            </div>
        </div>
    </nav>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Repair</th>
                <th>Work</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $place): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($place->name); ?></td>
                    <td><?php echo e($place->description); ?></td>
                    <td><?php echo e($place->repair); ?></td>
                    <td><?php echo e($place->work); ?></td>
                    <td>
                        <a href="<?php echo e(route('places.edit', $place->id)); ?>" class="btn btn-primary">Edit</a>
                        <form action="<?php echo e(route('places.destroy', $place->id)); ?>" method="POST" style="display:inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/p/papievpn/papievpn.beget.tech/resources/views/places/index.blade.php ENDPATH**/ ?>