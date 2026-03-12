<?php if (isset($component)) { $__componentOriginald819fa024fa6d382567c72bcf8897f25 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald819fa024fa6d382567c72bcf8897f25 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'theme::components.layout-dashboard','data' => ['title' => ''.e(__('Edit Welcome Page')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('Edit Welcome Page')).'']); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css" />
<script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
<style>
.tab-nav-wrapper {
	position: relative;
	overflow: hidden;
}
.tab-nav-scroll {
	display: flex;
	overflow-x: auto;
	scroll-behavior: smooth;
	-ms-overflow-style: none;
	scrollbar-width: none;
}
.tab-nav-scroll::-webkit-scrollbar {
	display: none;
}
.tab-scroll-btn {
	position: absolute;
	top: 50%;
	transform: translateY(-50%);
	width: 32px;
	height: 32px;
	border-radius: 50%;
	border: none;
	background-color: var(--bs-light);
	color: var(--bs-primary);
	box-shadow: 0 2px 6px rgba(0,0,0,0.1);
	z-index: 10;
	display: flex;
	align-items: center;
	justify-content: center;
	cursor: pointer;
	transition: all .2s ease;
}
.tab-scroll-btn:hover {
	background-color: var(--bs-primary);
	color: #fff;
}
.tab-scroll-left {
	left: -8px;
}
.tab-scroll-right {
	right: -8px;
}
.nav-tabs .nav-link {
	white-space: nowrap;
}
</style>
<!-- Breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb breadcrumb-custom-icon">
			<li class="breadcrumb-item">
				<a href="javascript:void(0);"><?php echo e(__('Admin')); ?></a>
				<i class="breadcrumb-icon icon-base ti tabler-chevron-right align-middle icon-xs"></i>
			</li>
			<li class="breadcrumb-item active"><?php echo e(__('Edit Welcome Page')); ?></li>
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

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <?php echo e(__('Edit Welcome Page')); ?>

                </h5>
                <form method="POST" action="<?php echo e(route('admin.index.enable')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php if(env('ENABLE_INDEX') == "no"): ?>
                        <button class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1" name="enableindex" value="yes">
                            <i class="ti tabler-eye-check"></i> <?php echo e(__('Enable Welcome Page')); ?>

                        </button>
                    <?php else: ?>
                        <button class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1" name="enableindex" value="no">
                            <i class="ti tabler-eye-off"></i> <?php echo e(__('Disable Welcome Page')); ?>

                        </button>
                    <?php endif; ?>
                </form>
            </div>

            <div class="card-body">
                <form method="POST" action="<?php echo e(route('admin.index.update')); ?>">
                    <?php echo csrf_field(); ?>
                    <h6 class="text-muted mb-3 d-flex align-items-center">
                        <i class="ti tabler-language me-2"></i> <?php echo e(__('Text')); ?>

                    </h6>
                    <div class="tab-nav-wrapper">
						<button class="tab-scroll-btn tab-scroll-left"><i class="ti tabler-chevron-left"></i></button>
						<div class="tab-nav-scroll">
							<ul class="nav nav-tabs mb-3" role="tablist">
								<?php $__currentLoopData = $translations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $texts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li class="nav-item" role="presentation">
										<button class="nav-link <?php echo e($loop->first ? 'active' : ''); ?>" data-bs-toggle="tab" data-bs-target="#tab-<?php echo e($lang); ?>" type="button" role="tab">
											<i class="ti tabler-world me-1"></i> <?php echo e(strtoupper($languages[$lang]['name'])); ?>

										</button>
									</li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
						<button class="tab-scroll-btn tab-scroll-right"><i class="ti tabler-chevron-right"></i></button>
					</div>
                    <div class="tab-content">
                        <?php $__currentLoopData = $translations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $texts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="tab-pane fade <?php echo e($loop->first ? 'show active' : ''); ?>" id="tab-<?php echo e($lang); ?>" role="tabpanel">
                            <div class="row g-3">
                                <?php $__currentLoopData = $texts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold"><?php echo e($key); ?></label>
                                    <input 
                                        type="text" 
                                        class="form-control shadow-sm" 
                                        name="translations[<?php echo e($lang); ?>][<?php echo e($key); ?>]" 
                                        value="<?php echo e($value); ?>" 
                                        <?php if(in_array(strtolower($lang), ['ar', 'he', 'fa', ''])): ?> dir="rtl" <?php endif; ?>
                                    >
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-sm btn-outline-primary d-flex align-items-center gap-2">
                            <i class="ti tabler-device-floppy"></i> <?php echo e(__('Save')); ?>

                        </button>
                    </div>
                </form>
            </div>
        </div>
		
		<div class="card shadow-sm border-0 mt-4">
			<div class="card-header d-flex align-items-center">
				<h5 class="card-title mb-0"><?php echo e(__('Site Config')); ?></h5>
			</div>
			<div class="card-body">
				<form method="POST" action="<?php echo e(route('admin.index.config.update')); ?>">
					<?php echo csrf_field(); ?>
					<div class="row g-4">
						<?php $__currentLoopData = $configSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-md-6">
								<label class="form-label fw-semibold"><?php echo e(ucfirst(str_replace('_', ' ', $key))); ?></label>

								<?php if(is_bool($value)): ?>
									<select class="form-select" name="config[<?php echo e($key); ?>]">
										<option value="true" <?php echo e($value === true ? 'selected' : ''); ?>>true</option>
										<option value="false" <?php echo e($value === false ? 'selected' : ''); ?>>false</option>
									</select>
								<?php elseif(is_string($value)): ?>
									<input type="text" class="form-control" name="config[<?php echo e($key); ?>]" value="<?php echo e($value); ?>">
									<?php if(str_contains($value, '{version}')): ?>
										<small class="text-muted"><?php echo e(__('Tip: {version} will be replaced with the app version')); ?></small>
									<?php endif; ?>
								<?php endif; ?>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					<div class="mt-4">
						<button type="submit" class="btn btn-sm btn-outline-primary d-flex align-items-center gap-2">
							<i class="ti tabler-device-floppy"></i> <?php echo e(__('Save')); ?>

						</button>
					</div>
				</form>
			</div>
		</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
	const wrapper = document.querySelector('.nav-tabs').closest('.tab-nav-wrapper');
	if (!wrapper) return;
	const nav = wrapper.querySelector('.tab-nav-scroll');
	const leftBtn = wrapper.querySelector('.tab-scroll-left');
	const rightBtn = wrapper.querySelector('.tab-scroll-right');

	function updateButtons() {
		leftBtn.style.display = nav.scrollLeft > 10 ? 'flex' : 'none';
		rightBtn.style.display = nav.scrollWidth - nav.clientWidth - nav.scrollLeft > 10 ? 'flex' : 'none';
	}

	leftBtn.addEventListener('click', (e) => {
		e.preventDefault();
		nav.scrollBy({ left: -150, behavior: 'smooth' });
	});
	rightBtn.addEventListener('click', (e) => {
		e.preventDefault();
		nav.scrollBy({ left: 150, behavior: 'smooth' });
	});
	nav.addEventListener('scroll', updateButtons);
	updateButtons();
});
</script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald819fa024fa6d382567c72bcf8897f25)): ?>
<?php $attributes = $__attributesOriginald819fa024fa6d382567c72bcf8897f25; ?>
<?php unset($__attributesOriginald819fa024fa6d382567c72bcf8897f25); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald819fa024fa6d382567c72bcf8897f25)): ?>
<?php $component = $__componentOriginald819fa024fa6d382567c72bcf8897f25; ?>
<?php unset($__componentOriginald819fa024fa6d382567c72bcf8897f25); ?>
<?php endif; ?>
<?php /**PATH /www/wwwroot/public_html/website/wa.bdi.asia/resources/themes/vuexy/views/pages/admin/index.blade.php ENDPATH**/ ?>