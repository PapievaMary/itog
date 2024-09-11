<?php $__env->startSection('content'); ?>
<div class="container">
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <div class="navbar-brand"><h1>My Things</h1></div>
            <div class="d-flex">
                <a class="btn btn-success" href="things/create" role="button">Create</a>
            </div>
        </div>
    </nav>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Warranty</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $things; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($thing->name); ?></td>
                    <td><?php echo e($thing->description); ?></td>
                    <td><?php echo e($thing->wrnt); ?></td>
                    <td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('transfer')): ?>
                        <a href="<?php echo e(route('things.uses', $thing->id)); ?>" class="btn btn-primary">Transfer</a>
                        <?php endif; ?>
                        <a href="<?php echo e(route('things.edit', $thing->id)); ?>" class="btn btn-primary">Edit</a>
                        <form action="<?php echo e(route('things.destroy', $thing->id)); ?>" method="POST" style="display:inline-block;">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/p/papievpn/papievpn.beget.tech/resources/views/things/index.blade.php ENDPATH**/ ?>