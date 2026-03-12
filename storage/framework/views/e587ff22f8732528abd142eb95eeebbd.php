<?php if (isset($component)) { $__componentOriginald819fa024fa6d382567c72bcf8897f25 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald819fa024fa6d382567c72bcf8897f25 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'theme::components.layout-dashboard','data' => ['title' => ''.e(__('Message Templates')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('Message Templates')).'']); ?>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb breadcrumb-custom-icon">
			<li class="breadcrumb-item">
				<a href="javascript:void(0);"><?php echo e(__('Templates')); ?></a>
				<i class="breadcrumb-icon icon-base ti tabler-chevron-right align-middle icon-xs"></i>
			</li>
			<li class="breadcrumb-item active"><?php echo e(__('Manage Templates')); ?></li>
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

	<div class="card shadow-sm border-0">
		<div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
			<h5 class="card-title mb-0"><?php echo e(__('Message Templates')); ?></h5>
			<div class="d-flex align-items-center gap-2">
				<input type="text" id="searchInput" class="form-control form-control-sm" placeholder="<?php echo e(__('Search templates...')); ?>" style="width: 200px;">
				<a href="<?php echo e(route('templates.create')); ?>" class="btn btn-outline-primary btn-sm">
				<i class="ti tabler-plus icon-xs me-1"></i><?php echo e(__('Create Template')); ?>

				</a>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover" id="templatesTable">
					<thead>
						<tr>
							<th><?php echo e(__('Name')); ?></th>
							<th><?php echo e(__('Type')); ?></th>
							<th><?php echo e(__('Category')); ?></th>
							<th><?php echo e(__('Status')); ?></th>
							<th><?php echo e(__('Usage')); ?></th>
							<th><?php echo e(__('Last Used')); ?></th>
							<th><?php echo e(__('Created')); ?></th>
							<th class="text-end"><?php echo e(__('Actions')); ?></th>
						</tr>
					</thead>
					<tbody id="templateRows">
						<?php $__empty_1 = true; $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
						<tr data-template-id="<?php echo e($template->id); ?>">
							<td>
								<div class="d-flex flex-column">
									<span class="fw-semibold"><?php echo e($template->name); ?></span>
									<?php if($template->description): ?>
									<small class="text-muted"><?php echo e(Str::limit($template->description, 50)); ?></small>
									<?php endif; ?>
								</div>
							</td>
							<td>
								<span class="badge bg-label-<?php echo e($template->type === 'text' ? 'primary' : ($template->type === 'media' ? 'success' : 'info')); ?>">
								<?php echo e($types[$template->type] ?? $template->type); ?>

								</span>
							</td>
							<td>
								<?php if($template->category): ?>
								<span class="badge bg-label-secondary"><?php echo e($categories[$template->category] ?? $template->category); ?></span>
								<?php else: ?>
								<span class="text-muted">-</span>
								<?php endif; ?>
							</td>
							<td>
								<div class="form-check form-switch">
									<input class="form-check-input status-toggle" type="checkbox" data-template-id="<?php echo e($template->id); ?>" <?php echo e($template->status === 'active' ? 'checked' : ''); ?>>
									<label class="form-check-label"><?php echo e($template->status === 'active' ? __('Active') : __('Inactive')); ?></label>
								</div>
							</td>
							<td><span class="badge bg-label-info"><?php echo e($template->usage_count); ?></span></td>
							<td>
								<?php if($template->last_used_at): ?>
								<span class="text-muted"><?php echo e($template->last_used_at->diffForHumans()); ?></span>
								<?php else: ?>
								<span class="text-muted"><?php echo e(__('Never')); ?></span>
								<?php endif; ?>
							</td>
							<td><span class="text-muted"><?php echo e($template->created_at->format('M d, Y')); ?></span></td>
							<td class="text-end">
								<div class="dropdown">
									<button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
									<i class="ti tabler-dots-vertical icon-xs"></i>
									</button>
									<ul class="dropdown-menu">
										<li><a href="javascript:;" onclick="viewTemplate(<?php echo e($template->id); ?>)" class="dropdown-item"><i class="ti tabler-eye icon-xs me-2"></i><?php echo e(__('Preview')); ?></a></li>
										<li><a class="dropdown-item" href="<?php echo e(route('templates.edit', $template->id)); ?>"><i class="ti tabler-edit icon-xs me-2"></i><?php echo e(__('Edit')); ?></a></li>
										<li>
											<hr class="dropdown-divider">
										</li>
										<li><a class="dropdown-item text-danger delete-template" href="#" data-template-id="<?php echo e($template->id); ?>"><i class="ti tabler-trash icon-xs me-2"></i><?php echo e(__('Delete')); ?></a></li>
									</ul>
								</div>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
						<tr>
							<td colspan="8" class="text-center py-4">
								<div class="text-muted">
									<i class="ti tabler-template icon-lg mb-2"></i>
									<p class="mb-0"><?php echo e(__('No templates found. Create your first template!')); ?></p>
								</div>
							</td>
						</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
			<?php if($templates->hasPages()): ?>
			<div class="d-flex justify-content-center mt-4">
				<?php echo e($templates->links('pagination::bootstrap-5')); ?>

			</div>
			<?php endif; ?>
		</div>
	</div>

	<div class="modal fade" id="modalView" tabindex="-1" aria-labelledby="modalViewLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalViewLabel"><?php echo e(__('Template Preview')); ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body showTemplate">
					<div class="text-center text-muted p-4">
						<i class="ti tabler-loader spin icon-lg mb-2"></i>
						<p class="mb-0"><?php echo e(__('Loading preview...')); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content border-0 shadow">
				<div class="modal-body text-center py-4">
					<i class="ti tabler-alert-circle text-danger mb-3" style="font-size:48px;"></i>
					<h5 class="mb-2"><?php echo e(__('Confirm Deletion')); ?></h5>
					<p class="text-muted mb-4"><?php echo e(__('Are you sure you want to delete this template? This action cannot be undone.')); ?></p>
					<div class="d-flex justify-content-center gap-2">
						<button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
						<button type="button" class="btn btn-outline-danger btn-sm" id="confirmDeleteBtn"><?php echo e(__('Delete')); ?></button>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script>
		function viewTemplate(id) {
				$.ajax({
					url: "<?php echo e(route('previewMessage')); ?>",
					headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
					type: "POST",
					data: { id: id, table: "message_templates", column: "message" },
					dataType: "html",
					beforeSend: function() {
						const loadingHtml = '<div class="text-center text-muted p-4"><i class="ti tabler-loader spin icon-lg mb-2"></i><p class="mb-0"><?php echo e(__("Loading preview...")); ?></p></div>';
						$(".showTemplate").html(loadingHtml);
					},
					success: function(result) {
						$(".showTemplate").html(result);
						$("#modalView").modal("show");
					},
					error: function(error) {
						console.error(error);
						const errorHtml = '<div class="alert alert-danger"><?php echo e(__("Failed to load preview. Please try again.")); ?></div>';
						$(".showTemplate").html(errorHtml);
					},
				});
		}

		document.addEventListener('DOMContentLoaded', function () {
			const deleteModalElement = document.getElementById('deleteConfirmationModal');
			const deleteModal = new bootstrap.Modal(deleteModalElement);
			const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

			document.getElementById('searchInput').addEventListener('input', function () {
				let query = this.value.toLowerCase();
				document.querySelectorAll('#templateRows tr').forEach(row => {
					row.style.display = row.innerText.toLowerCase().includes(query) ? '' : 'none';
				});
			});

			document.querySelectorAll('.status-toggle').forEach(toggle => {
				toggle.addEventListener('change', function () {
					const templateId = this.dataset.templateId;
					const isActive = this.checked;
					fetch('/templates/' + templateId + '/toggle-status', {
							method: 'POST',
							headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
						})
						.then(res => res.json())
						.then(response => {
							if (!response.error) {
								notyf.success(response.message);
								this.nextElementSibling.textContent = isActive ? '<?php echo e(__("Active")); ?>' : '<?php echo e(__("Inactive")); ?>';
							} else {
								notyf.error(response.message);
								this.checked = !isActive;
							}
						})
						.catch(() => {
							notyf.error('<?php echo e(__("Failed to update template status")); ?>');
							this.checked = !isActive;
						});
				});
			});

			document.querySelectorAll('.delete-template').forEach(btn => {
				btn.addEventListener('click', function (e) {
					e.preventDefault();
					const templateId = this.dataset.templateId;
					confirmDeleteBtn.dataset.templateId = templateId;
					deleteModal.show();
				});
			});

			confirmDeleteBtn.addEventListener('click', function () {
				const templateId = this.dataset.templateId;
				fetch('/templates/' + templateId, {
						method: 'DELETE',
						headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
					})
					.then(res => res.json())
					.then(response => {
						if (!response.error) {
							notyf.success(response.message);
							const row = document.querySelector('tr[data-template-id="' + templateId + '"]');
							if(row) row.remove();
						} else {
							notyf.error(response.message);
						}
					})
					.catch(() => notyf.error('<?php echo e(__("Failed to delete template")); ?>'))
					.finally(() => {
						deleteModal.hide();
					});
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
<?php endif; ?><?php /**PATH /www/wwwroot/public_html/website/wa.bdi.asia/resources/themes/vuexy/views/pages/template/index.blade.php ENDPATH**/ ?>