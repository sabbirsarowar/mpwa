<?php if (isset($component)) { $__componentOriginald819fa024fa6d382567c72bcf8897f25 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald819fa024fa6d382567c72bcf8897f25 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'theme::components.layout-dashboard','data' => ['title' => ''.e(__('Themes Manager')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('Themes Manager')).'']); ?>
	<!--breadcrumb-->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb breadcrumb-custom-icon">
			<li class="breadcrumb-item">
				<a href="javascript:void(0);"><?php echo e(__('Admin')); ?></a>
				<i class="breadcrumb-icon icon-base ti tabler-chevron-right align-middle icon-xs"></i>
			</li>
			<li class="breadcrumb-item active"><?php echo e(__('Themes Manager')); ?></li>
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
		<div class="card-header d-flex justify-content-between">
			<h5 class="card-title"><?php echo e(__('Installed Themes')); ?></h5>
		</div>
		<div class="container mt-3">
			<?php if(session('status')): ?>
				<div class="alert alert-success">
					<?php echo e(session('status')); ?>

				</div>
			<?php endif; ?>
			<div class="themes">
				<div class="row mb-5">
					<?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-md-4 mb-4">
							<div class="card shadow-sm h-100 border">
								<img src="<?php echo e($theme['screenshot']); ?>" class="card-img-top theme-img cursor-pointer border-bottom" alt="<?php echo e($theme['name']); ?>" data-bs-toggle="modal" data-bs-target="#themeModal" data-img="<?php echo e($theme['screenshot']); ?>">
								<div class="card-body text-center">
									<h5 class="card-title"><?php echo e(ucfirst($theme['name'])); ?></h5>
									<p class="card-text"><?php echo e(__('Version:')); ?> <?php echo e($theme['version']); ?></p>
									<p class="card-text"><?php echo e(__('Author:')); ?> <?php echo e($theme['author']); ?></p>
									<div class="d-flex flex-wrap justify-content-center gap-2 mt-3">
										<?php if($theme['folder'] != env('THEME_NAME') && $theme['folder'] != 'veuxy'): ?>
											<form method="POST" action="<?php echo e(route('themes.delete')); ?>" onsubmit="return confirm('<?php echo e(__('Are you sure will delete this theme?')); ?>')">
												<?php echo csrf_field(); ?>
												<input type="hidden" name="folder" value="<?php echo e($theme['folder']); ?>">
												<button type="submit" class="btn btn-outline-danger text-danger btn-sm d-flex align-items-center justify-content-center px-3" style="min-width: 40px;height: 100%;">
													<i class="ti tabler-trash"></i>
												</button>
											</form>
										<?php else: ?>
											<button class="btn btn-outline-danger text-danger btn-sm d-flex align-items-center justify-content-center px-3" style="min-width: 40px;" disabled>
												<i class="ti tabler-trash"></i>
											</button>
										<?php endif; ?>

										<?php if($theme['website'] != ''): ?>
											<a href="<?php echo e($theme['website']); ?>" target="_blank" class="btn btn-outline-primary text-primary btn-sm d-flex align-items-center px-3">
												<i class="ti tabler-external-link me-1"></i> <?php echo e(__('Visit')); ?>

											</a>
										<?php endif; ?>
										
										<?php if(!in_array($currentVersion, $theme['compatibility'])): ?>
											<button class="btn btn-outline-danger text-danger btn-sm d-flex align-items-center px-3" disabled>
												<i class="ti tabler-x me-1"></i> <?php echo e(__('Not compatible')); ?>

											</button>
										<?php else: ?>
											<?php if($theme['folder'] == env('THEME_NAME')): ?>
												<button class="btn btn-outline-dark text-dark btn-sm d-flex align-items-center px-3" disabled>
													<i class="ti tabler-check me-1"></i> <?php echo e(__('Activated')); ?>

												</button>
											<?php else: ?>
												<a href="<?php echo e(route('themes.active', $theme['folder'])); ?>" class="btn btn-outline-success text-success btn-sm d-flex align-items-center px-3">
													<i class="ti tabler-rocket me-1"></i> <?php echo e(__('Activate')); ?>

												</a>
											<?php endif; ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>
	</div>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title"><?php echo e(__('Home Page Themes')); ?></h5>
        </div>
        <div class="container mt-3">
            <div class="row mb-5">
                <?php $__currentLoopData = $indexThemes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100 border">
                            <img src="<?php echo e($theme['screenshot']); ?>"
                                 class="card-img-top theme-img cursor-pointer border-bottom"
                                 data-bs-toggle="modal"
                                 data-bs-target="#themeModal"
                                 data-img="<?php echo e($theme['screenshot']); ?>">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo e(ucfirst($theme['name'])); ?></h5>
                                <p class="card-text"><?php echo e(__('Version:')); ?> <?php echo e($theme['version']); ?></p>
                                <p class="card-text"><?php echo e(__('Author:')); ?>  <?php echo e($theme['author']); ?></p>
                                <div class="d-flex justify-content-center flex-wrap gap-2 mt-3">
                                    <?php if($theme['folder'] == env('THEME_INDEX')): ?>
                                        <button class="btn bg-outline-dark text-dark btn-sm" disabled>
                                            <i class="ti tabler-check me-1"></i> <?php echo e(__('Activated')); ?>

                                        </button>
                                        <input type="hidden" name="folder" value="<?php echo e($theme['folder']); ?>">
                                        <button type="submit" class="btn bg-outline-danger text-danger btn-sm" disabled>
                                            <i class="ti tabler-trash"></i>
                                        </button>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('themes.activeIndex', ['name' => $theme['folder']])); ?>"
                                           class="btn bg-outline-success text-success btn-sm">
                                            <i class="ti tabler-rocket me-1"></i> <?php echo e(__('Activate')); ?>

                                        </a>
										<form method="POST" action="<?php echo e(route('themes.deleteIndex')); ?>"
                                          onsubmit="return confirm('<?php echo e(__('Are you sure will delete this theme?')); ?>')">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="folder" value="<?php echo e($theme['folder']); ?>">
                                        <button type="submit" class="btn bg-outline-danger text-danger btn-sm">
                                            <i class="ti tabler-trash"></i>
                                        </button>
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="themeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Theme Preview')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="" id="theme-modal-img" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var themeModal = document.getElementById('themeModal');
        themeModal.addEventListener('show.bs.modal', function (event) {
            var imgSrc = event.relatedTarget.getAttribute('data-img');
            themeModal.querySelector('#theme-modal-img').src = imgSrc;
        });
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
<?php /**PATH /www/wwwroot/public_html/website/wa.bdi.asia/resources/themes/vuexy/views/pages/admin/themes.blade.php ENDPATH**/ ?>