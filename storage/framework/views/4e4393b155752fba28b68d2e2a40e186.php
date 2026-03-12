<?php if (isset($component)) { $__componentOriginald819fa024fa6d382567c72bcf8897f25 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald819fa024fa6d382567c72bcf8897f25 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'theme::components.layout-dashboard','data' => ['title' => ''.e(__('Manage Plans')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('Manage Plans')).'']); ?>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb breadcrumb-custom-icon">
			<li class="breadcrumb-item">
				<a href="javascript:void(0);"><?php echo e(__('Users')); ?></a>
				<i class="breadcrumb-icon icon-base ti tabler-chevron-right align-middle icon-xs"></i>
			</li>
			<li class="breadcrumb-item active"><?php echo e(__('Plans')); ?></li>
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
	<?php
		$features = [
			'messages_limit' => __('Messages Limit'),
			'device_limit' => __('Device Limit'),
			'ai_message' => __('AI Message'),
			'schedule_message' => __('Schedule Message'),
			'bulk_message' => __('Bulk Message'),
			'autoreply' => __('Auto Reply'),
			'send_message' => __('Send Message'),
			'send_text_channel' => __('Send Text To Channel'),
			'send_product' => __('Send Product'),
			'send_media' => __('Send Media'),
			'send_list' => __('Send List'),
			'send_button' => __('Send Button'),
			'send_location' => __('Send Location'),
			'send_poll' => __('Send Poll'),
			'send_sticker' => __('Send Sticker'),
			'send_vcard' => __('Send VCard'),
			'webhook' => __('Webhook'),
			'api' => __('API'),
		];
    ?>

    <div class="row g-4 mt-2">
		<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-md-4">
				<div class="card border-0 shadow-sm position-relative">
					<?php if($plan->is_recommended): ?>
						<span class="badge bg-success-subtle text-success position-absolute top-0 end-0 m-2"><?php echo e(__('Recommended')); ?></span>
					<?php endif; ?>
					<div class="card-body text-center">
						<h5 class="card-title d-flex justify-content-center align-items-center gap-2">
							<i class="ti tabler-crown text-warning"></i> <?php echo e($plan->title); ?>

						</h5>
						<h6 class="text-muted" dir="ltr">
							<i class="ti tabler-currency-dollar text-primary"></i>
							<?php echo e(number_format($plan->price)); ?> <?php echo e($plan->symbol); ?> /
							<span dir="<?php echo e(in_array(app()->getLocale(), ['ar', 'he', 'fa', 'ur']) ? 'rtl' : 'ltr'); ?>">
								<?php echo e($plan->days); ?> <?php echo e(__('days')); ?>

							</span>
						</h6>
						<p class="text-muted mb-2">
							<?php if($plan->trial_days != '0'): ?>
							<i class="ti tabler-clock-hour-4 me-1"></i>
							<?php echo e(__('Trial')); ?>: <?php echo e($plan->trial_days); ?> <?php echo e(__('days')); ?>

							<?php else: ?>
							<br />
							<?php endif; ?>
						</p>
						<hr>
						<ul class="list-unstyled text-start small">
							<?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php $value = $plan->data[$key] ?? 0; ?>
									<li class="mb-1">
										<?php if(!empty($value)): ?>
											<span class="badge badge-center rounded-pill bg-primary-subtle text-primary p-0 me-1">
												<i class="icon-base ti tabler-check icon-7px"></i>
											</span>
										<?php else: ?>
											<span class="badge badge-center rounded-pill bg-danger-subtle text-danger p-0 me-1">
												<i class="icon-base ti tabler-x icon-7px"></i>
											</span>
										<?php endif; ?>

										<?php if($key == "messages_limit" || $key == "device_limit"): ?>
											<?php echo e($label); ?> <span class="text-muted">(<?php echo e(number_format($value)); ?>)</span>
										<?php else: ?>
											<?php echo e($label); ?>

										<?php endif; ?>
									</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
						<div class="d-grid mt-8">
						<?php if(Auth::user()->active_subscription == 'lifetime'): ?>
								<button class="btn <?php echo e($plan->is_recommended == 1 ? 'btn-primary' : 'btn-label-primary'); ?>" disabled>
                                    <?php echo e(__('Your plan is lifetime')); ?>

                                </button>
						<?php else: ?>
							<?php if(Auth::user()->plan_name == $plan->title && Auth::user()->active_subscription == 'active'): ?>
								<button class="btn <?php echo e($plan->is_recommended == 1 ? 'btn-primary' : 'btn-label-primary'); ?>" disabled>
                                    <?php echo e(__('Your current plan')); ?>

                                </button>
							<?php else: ?>
                                <?php if($plan->is_trial != 1): ?>
                                <a href="<?php echo e(route('payments.checkout', $plan->id)); ?>"
                                    class="btn <?php echo e($plan->is_recommended == 1 ? 'btn-primary' : 'btn-label-primary'); ?>">
                                    <?php echo e(__('Buy Now')); ?>

                                </a>
                                <?php else: ?>
								<div class="d-flex justify-content-center gap-2">
									<a href="<?php echo e(route('payments.checkout', $plan->id)); ?>"
										class="btn <?php echo e($plan->is_recommended == 1 ? 'btn-primary' : 'btn-label-primary'); ?>">
										<?php echo e(__('Buy Now')); ?>

									</a>
									<a href="<?php echo e(route('payments.trial', $plan->id)); ?>"
										class="btn <?php echo e($plan->is_recommended == 1 ? 'btn-danger' : 'btn-label-primary'); ?>">
										<?php echo e(__('Free :trial_days days trial', ['trial_days' => $plan->trial_days])); ?>

									</a>
								</div>
                                <?php endif; ?>
							<?php endif; ?>
						<?php endif; ?>
                        </div>
					</div>
				</div>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH /www/wwwroot/public_html/website/wa.bdi.asia/resources/themes/vuexy/views/pages/user/plans/index.blade.php ENDPATH**/ ?>