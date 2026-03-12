<?php if (isset($component)) { $__componentOriginald819fa024fa6d382567c72bcf8897f25 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald819fa024fa6d382567c72bcf8897f25 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'theme::components.layout-dashboard','data' => ['title' => ''.e(__('Messages History')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('Messages History')).'']); ?>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb breadcrumb-custom-icon">
			<li class="breadcrumb-item">
				<a href="javascript:void(0);"><?php echo e(__('Reports')); ?></a>
				<i class="breadcrumb-icon icon-base ti tabler-chevron-right align-middle icon-xs"></i>
			</li>
			<li class="breadcrumb-item active"><?php echo e(__('Messages History')); ?></li>
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
	
			<div class="card shadow-sm border-0">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 d-flex align-items-center gap-2">
            <?php echo e(__('Messages History')); ?>

        </h5>
        <?php if($messages->total() > 0): ?>
            <a href="javascript:void(0);" onclick="deleteAll(<?php echo e($userId); ?>)"
               class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1">
                <i class="ti tabler-trash"></i>
                <span><?php echo e(__('Delete All history?')); ?></span>
            </a>
        <?php endif; ?>
    </div>

    <div class="card-body px-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 w-100">

                <thead class="border-top">
                    <tr>
                        <th class="text-nowrap"><?php echo e(__('Sender')); ?></th>
                        <th class="text-nowrap"><?php echo e(__('Number')); ?></th>
                        <th class="text-nowrap"><?php echo e(__('Message')); ?></th>
                        <th class="text-nowrap"><?php echo e(__('Status')); ?></th>
                        <th class="text-nowrap"><?php echo e(__('Via')); ?></th>
                        <th class="text-nowrap"><?php echo e(__('Last Updated')); ?></th>
                        <th class="text-nowrap text-center"><?php echo e(__('Action')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($messages->total() == 0): ?>
                        <?php if (isset($component)) { $__componentOriginalf93c233e0d4ceea9c88c0d88798bcfbc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf93c233e0d4ceea9c88c0d88798bcfbc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'theme::components.no-data','data' => ['colspan' => '7','text' => ''.e(__('No Messages History')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('no-data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['colspan' => '7','text' => ''.e(__('No Messages History')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf93c233e0d4ceea9c88c0d88798bcfbc)): ?>
<?php $attributes = $__attributesOriginalf93c233e0d4ceea9c88c0d88798bcfbc; ?>
<?php unset($__attributesOriginalf93c233e0d4ceea9c88c0d88798bcfbc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf93c233e0d4ceea9c88c0d88798bcfbc)): ?>
<?php $component = $__componentOriginalf93c233e0d4ceea9c88c0d88798bcfbc; ?>
<?php unset($__componentOriginalf93c233e0d4ceea9c88c0d88798bcfbc); ?>
<?php endif; ?>
                    <?php endif; ?>

                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <div class="badge bg-label-primary"><?php echo e($msg->device->body); ?></div>
                            </td>

                            <td>
                                <span class="badge bg-label-secondary">
									<?php echo e(\Illuminate\Support\Str::limit(strip_tags($msg->number), 13)); ?>

                                </span>
                            </td>

                            <td>
                                <div class="text-truncate" style="max-width: 220px;">
                                    <span class="badge bg-info-subtle text-info me-1"><?php echo e($msg->type); ?></span>
                                    <?php echo e(\Illuminate\Support\Str::limit(strip_tags($msg->message), 50)); ?>

                                </div>
                            </td>

                            <td>
                                <?php if($msg->status === 'success'): ?>
                                    <span class="badge bg-success-subtle text-success"><?php echo e(__('Sent')); ?></span>
                                <?php else: ?>
                                    <span class="badge bg-danger-subtle text-danger"><?php echo e(__('Failed')); ?></span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if($msg->send_by === 'web'): ?>
                                    <span class="badge bg-primary-subtle text-primary"><?php echo e(__('Web')); ?></span>
                                <?php else: ?>
                                    <span class="badge bg-warning-subtle text-warning"><?php echo e(__('API')); ?></span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <small class="text-muted"><?php echo e($msg->updated_at->format('d M Y')); ?></small>
                            </td>

                            <td class="text-center">
                                <a href="javascript:void(0);" onclick="resend(<?php echo e($msg->id); ?>, '<?php echo e($msg->status); ?>')"
                                   class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1">
                                    <i class="ti tabler-refresh"></i> <?php echo e(__('Resend')); ?>

                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

		<div class="p-3">
			<?php echo e($messages->links('pagination::bootstrap-5')); ?>

		</div>
    </div>
</div>
	<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content border-0 shadow">
				<div class="modal-body text-center py-4">
					<i class="ti tabler-alert-circle text-danger mb-3" style="font-size:48px;"></i>
					<h5 class="mb-2"><?php echo e(__('Confirm Deletion')); ?></h5>
					<p class="text-muted mb-4"><?php echo e(__('Are you sure you want to delete all message history?')); ?></p>
					<div class="d-flex justify-content-center gap-2">
						<button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
						<button type="button" id="confirmDeleteButton" class="btn btn-outline-danger btn-sm"><?php echo e(__('Delete')); ?></button>
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
function resend(id, status) {
	if (status == 'success') {
		notyf.open({type:"info",message: '<?php echo e(__("Message already sent")); ?>',background:config.colors.info,className:"notyf__info",icon:{className:"icon-base ti tabler-info-circle-filled icon-md text-white",tagName:"i"}});
		return;
	}

	$.ajax({
		url: '<?php echo e(route("resend.message")); ?>',
		type: 'POST',
		data: {
			id: id,
			_token: '<?php echo e(csrf_token()); ?>'
		},
		success: function (res) {
			if (res.error) {
				notyf.error(res.msg);
				return;
			} else {
				notyf.success(res.msg);
				return;
			}
		},
		error: function (err) {
			notyf.error('<?php echo e(__("Something went wrong")); ?>');
		}
	});
}
let deleteAllId = null;

function deleteAll(id) {
	deleteAllId = id;

	const myModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
	myModal.show();
}

document.getElementById('confirmDeleteButton').addEventListener('click', function () {
	$.ajax({
		url: '<?php echo e(route("delete.messages")); ?>',
		type: 'POST',
		data: {
			id: deleteAllId,
			_token: '<?php echo e(csrf_token()); ?>'
		},
		success: function (res) {
			if (res.error) {
				notyf.error(res.msg);
			} else {
				notyf.success(res.msg);
				setTimeout(function () {
					location.reload();
				}, 1500);
			}
		},
		error: function (err) {
			notyf.error('<?php echo e(__("Something went wrong")); ?>');
		},
		complete: function () {
			const myModal = bootstrap.Modal.getInstance(document.getElementById('confirmDeleteModal'));
			myModal.hide();
		}
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
<?php endif; ?><?php /**PATH /www/wwwroot/public_html/website/wa.bdi.asia/resources/themes/vuexy/views/pages/histories/message.blade.php ENDPATH**/ ?>