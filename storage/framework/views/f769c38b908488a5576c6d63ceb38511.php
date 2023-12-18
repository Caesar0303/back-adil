

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <?php if(Auth::check()): ?>
   <p>Welcome, <?php echo e(Auth::user()->name); ?></p>
<?php else: ?>
   <p>Welcome, Guest</p>
<?php endif; ?>

                    <p>I made it out of my tears</p>

                   
                    <a href="<?php echo e(route('clients.index')); ?>" class="btn btn-primary">Manage Clients</a>
                    <a href="<?php echo e(route('orders.index')); ?>" class="btn btn-secondary">Manage Orders</a>
                    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary">Manage Products</a>
                    <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-secondary">Manage Categories</a>

                    
                    <div id="contentArea"></div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programs\OSPanel\domains\front-adil\resources\views/dashboard.blade.php ENDPATH**/ ?>