<?php if (isset($component)) { $__componentOriginald819fa024fa6d382567c72bcf8897f25 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald819fa024fa6d382567c72bcf8897f25 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'theme::components.layout-dashboard','data' => ['title' => ''.e(__('Setting')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('Setting')).'']); ?>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb breadcrumb-custom-icon">
			<li class="breadcrumb-item">
				<a href="javascript:void(0);"><?php echo e(__('User')); ?></a>
				<i class="breadcrumb-icon icon-base ti tabler-chevron-right align-middle icon-xs"></i>
			</li>
			<li class="breadcrumb-item active"><?php echo e(__('Settings')); ?></li>
		</ol>
	</nav>

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

	<div class="row g-4">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title mb-0"><?php echo e(__('API Key')); ?></h5>
				</div>
				<div class="card-body">
					<form action="<?php echo e(route('generateNewApiKey')); ?>" method="POST">
						<?php echo csrf_field(); ?>
						<div class="input-group">
							<span class="input-group-text"><?php echo e(__('API Key')); ?></span>
							<input type="text" class="form-control" value="<?php echo e(Auth::user()->api_key); ?>" readonly>
							<button type="submit" name="api_key" class="btn btn-outline-primary"><?php echo e(__('Generate New')); ?></button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="card h-100">
				<div class="card-header">
					<h5 class="card-title mb-0"><?php echo e(__('Change Password')); ?></h5>
				</div>
				<div class="card-body">
					<form action="<?php echo e(route('changePassword')); ?>" method="POST">
						<?php echo csrf_field(); ?>
						<div class="mb-3">
							<label for="settingsCurrentPassword" class="form-label"><?php echo e(__('Current Password')); ?></label>
							<input type="password" name="current" class="form-control <?php echo e($errors->has('current') ? 'is-invalid' : ''); ?>" id="settingsCurrentPassword" placeholder="●●●●●●●●">
							<?php if($errors->has('current')): ?>
								<div class="invalid-feedback"><?php echo e($errors->first('current')); ?></div>
							<?php endif; ?>
						</div>
						<div class="mb-3">
							<label for="password" class="form-label"><?php echo e(__('New Password')); ?></label>
							<input type="password" name="password" class="form-control <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>" id="password" placeholder="●●●●●●●●">
							<?php if($errors->has('password')): ?>
								<div class="invalid-feedback"><?php echo e($errors->first('password')); ?></div>
							<?php endif; ?>
						</div>
						<div class="mb-3">
							<label for="settingsConfirmPassword" class="form-label"><?php echo e(__('Confirm Password')); ?></label>
							<input type="password" name="password_confirmation" class="form-control" id="settingsConfirmPassword" placeholder="●●●●●●●●">
						</div>
						<button type="submit" class="btn btn-outline-primary w-100"><?php echo e(__('Change Password')); ?></button>
					</form>
				</div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="card mb-4">
				<div class="card-header">
					<h5 class="card-title mb-0"><?php echo e(__('Automatically delete message history:')); ?></h5>
				</div>
				<div class="card-body">
					<form method="POST" action="<?php echo e(route('deleteHistory')); ?>">
						<?php echo csrf_field(); ?>
						<div class="row g-3 align-items-end">
							<div class="col-md-8">
								<label for="delete_history" class="form-label"><?php echo e(__('Delete After')); ?></label>
								<select name="delete_history" id="delete_history" class="form-select">
									<option value="0" <?php if(auth()->user()->delete_history == 0): ?> selected <?php endif; ?>><?php echo e(__("Don't Delete")); ?></option>
									<?php $__currentLoopData = range(1, 30); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($number); ?>" <?php if($number == auth()->user()->delete_history): ?> selected <?php endif; ?>><?php echo e($number); ?> <?php echo e(__('In Days')); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
							<div class="col-md-4">
								<button type="submit" class="btn btn-outline-primary w-100"><?php echo e(__('Save')); ?></button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="card">
				<div class="card-header">
					<h5 class="card-title mb-0"><?php echo e(__('Select Timezone:')); ?></h5>
				</div>
				<div class="card-body">
					<form method="POST" action="<?php echo e(route('user.settings.timezone')); ?>">
						<?php echo csrf_field(); ?>
						<div class="mb-3">
							<label for="timezone" class="form-label"><?php echo e(__('Timezone')); ?></label>
							<select name="timezone" id="timezone" class="form-select">
								<?php $__currentLoopData = timezone_identifiers_list(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timezone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($timezone); ?>" <?php if(auth()->user()->timezone == $timezone): ?> selected <?php endif; ?>><?php echo e($timezone); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
						<button type="submit" class="btn btn-outline-primary w-100"><?php echo e(__('Save Timezone')); ?></button>
					</form>
				</div>
			</div>
		</div>

		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title mb-0"><?php echo e(__('Two-Factor Authentication')); ?></h5>
				</div>
				<div class="card-body">
					<form method="POST" action="<?php echo e(route('user.settings.2fa')); ?>">
						<?php echo csrf_field(); ?>
						<?php if(auth()->user()->two_factor_enabled): ?>
							<button type="submit" name="action" class="btn btn-danger w-100 mb-3" value="disable"><?php echo e(__('Disable Authenticator 2FA?')); ?></button>
						<?php else: ?>
							<button type="submit" name="action" class="btn btn-success w-100 mb-3" value="enable"><?php echo e(__('Enable Authenticator 2FA?')); ?></button>
						<?php endif; ?>
					</form>

					<?php if(auth()->user()->two_factor_enabled): ?>
						<div class="alert alert-info">
							<h6 class="alert-heading"><?php echo e(__('Recovery Codes')); ?></h6>
							<p class="small mb-3"><?php echo e(__('You can use Recovery Codes if you accidentally delete the Google Authenticator app or lose your phone. Use these codes when logging in instead of the app')); ?></p>
							<div class="row g-2">
								<?php $__currentLoopData = json_decode(auth()->user()->recovery_codes); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-6 col-md-3">
										<div class="badge bg-label-secondary w-100 p-2"><?php echo e($code); ?></div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
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
<?php endif; ?>
<?php /**PATH /www/wwwroot/public_html/website/wa.bdi.asia/resources/themes/vuexy/views/pages/user/settings.blade.php ENDPATH**/ ?>