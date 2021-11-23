
<?php $__env->startSection('main'); ?>
<div class="row">
    <div class="col-sm-8 offset-sm-2">
           <h1 class="display-3">New Product</h1>
           <?php if($errors->any()): ?>
             <div class="alert alert-danger">
                   <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   </ul>
            </div>
            <br />
        <?php endif; ?>
           <?php echo Form::open(['url' => 'products']); ?>

            <?php echo csrf_field(); ?>
            <div class="form-group">    
                <label for="sku">Nama Produk:</label>
                <?php echo Form::text('sku', null, ['class' => 'form-control']); ?>

            </div>
            <div class="form-group">
                <label for="name">Nama:</label>
                <?php echo Form::text('name', null, ['class' => 'form-control']); ?>

            </div>
            <div class="form-group">
                <label for="description">Alamat:</label>
                <?php echo Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3]); ?>

            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <?php echo Form::text('price', null, ['class' => 'form-control']); ?>

            </div>
            <div class="form-group">
                <label for="country">Inventory:</label>
                <?php echo Form::text('inventory', null, ['class' => 'form-control']); ?>

            </div>               
            <button type="submit" class="btn btn-primary">Create</button>
        <?php echo Form::close(); ?>

       </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crudlaravel\resources\views/products/create.blade.php ENDPATH**/ ?>