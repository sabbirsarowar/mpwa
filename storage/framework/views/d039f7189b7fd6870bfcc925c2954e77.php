<?php if (isset($component)) { $__componentOriginald819fa024fa6d382567c72bcf8897f25 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald819fa024fa6d382567c72bcf8897f25 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'theme::components.layout-dashboard','data' => ['title' => ''.e(__('Cronjob')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('Cronjob')).'']); ?>
	<!--breadcrumb-->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb breadcrumb-custom-icon">
			<li class="breadcrumb-item">
				<a href="javascript:void(0);"><?php echo e(__('Admin')); ?></a>
				<i class="breadcrumb-icon icon-base ti tabler-chevron-right align-middle icon-xs"></i>
			</li>
			<li class="breadcrumb-item active"><?php echo e(__('Cronjob')); ?></li>
		</ol>
	</nav>
	<!--end breadcrumb-->
	<?php if(session()->has('alert')): ?>
        <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'theme::components.alert','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php $__env->slot('type', session('alert')['type']); ?>
            <?php $__env->slot('msg', session('alert')['msg']); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
    <?php endif; ?>
    <?php if($errors->any()): ?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<h4 class="alert-heading d-flex align-items-center">
				<span class="alert-icon rounded">
					<i class="icon-base ti tabler-face-id-error icon-md"></i>
				</span>
				<?php echo e(__('Oh Error :(')); ?>

			</h4>
			<hr>
			<p class="mb-0">
				<p><?php echo e(__('The given data was invalid.')); ?></p>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
			</p>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
    <?php endif; ?>
		<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between pb-2">
        <h6 class="mb-0"><?php echo e(__('Execute Start Blast')); ?></h6>
        <span class="avatar bg-label-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
    <i class="ti tabler-rocket icon-20px"></i>
</span>
    </div>
    <div class="card-body">
        <div class="bg-dark text-white rounded p-3 mb-2">
            <code class="text-white d-block text-break"><?php echo e($cron_path); ?> -s "<?php echo e(route('blast-start')); ?>" &gt;/dev/null 2&gt;&amp;1</code>
        </div>
        <span class="badge bg-label-info"><?php echo e(__('Every 1 Min')); ?></span>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between pb-2">
        <h6 class="mb-0"><?php echo e(__('Execute User Subscribe, History, Order')); ?></h6>
        <span class="avatar bg-label-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
    <i class="ti tabler-user-check icon-20px"></i>
</span>
    </div>
    <div class="card-body">
        <div class="bg-dark text-white rounded p-3 mb-2">
            <code class="text-white d-block text-break"><?php echo e($cron_path); ?> -s "<?php echo e(route('subscription-check')); ?>" &gt;/dev/null 2&gt;&amp;1</code>
        </div>
        <span class="badge bg-label-info"><?php echo e(__('Every 10 Min')); ?></span>
    </div>
</div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald819fa024fa6d382567c72bcf8897f25)): ?>
<?php $attributes = $__attributesOriginald819fa024fa6d382567c72bcf8897f25; ?>
<?php unset($__attributesOriginald819fa024fa6d382567c72bcf8897f25); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald819fa024fa6d382567c72bcf8897f25)): ?>
<?php $component = $__componentOriginald819fa024fa6d382567c72bcf8897f25; ?>
<?php unset($__componentOriginald819fa024fa6d382567c72bcf8897f25); ?>
<?php endif; ?><?php /**PATH /www/wwwroot/public_html/website/wa.bdi.asia/resources/themes/vuexy/views/pages/admin/cronjob.blade.php ENDPATH**/ ?>