<?php if (isset($component)) { $__componentOriginald819fa024fa6d382567c72bcf8897f25 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald819fa024fa6d382567c72bcf8897f25 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'theme::components.layout-dashboard','data' => ['title' => ''.e(__('Tickets')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('Tickets')).'']); ?>
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-12 text-end">
                <a href="<?php echo e(route('user.tickets.create')); ?>" class="btn btn-sm btn-outline-primary">
                    <?php echo e(__('Create New Ticket')); ?>

                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?php echo e(__('My Tickets')); ?></h5>
            </div>
            <div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover align-middle mb-0">
						<thead class="table-light">
							<tr>
								<th><?php echo e(__('ID')); ?></th>
								<th><?php echo e(__('Title')); ?></th>
								<th><?php echo e(__('Status')); ?></th>
								<th><?php echo e(__('Priority')); ?></th>
								<th><?php echo e(__('Last Update')); ?></th>
								<th><?php echo e(__('Created')); ?></th>
								<th><?php echo e(__('Action')); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php $__empty_1 = true; $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
								<tr>
									<td>#<?php echo e($ticket->id); ?></td>
									<td><?php echo e($ticket->title); ?></td>
									<td>
										<span class="badge bg-<?php echo e($ticket->status === 'open' ? 'success' : 'secondary'); ?>-subtle text-<?php echo e($ticket->status === 'open' ? 'success' : 'secondary'); ?>">
											<?php echo e(__(ucfirst($ticket->status))); ?>

										</span>
									</td>
									<td>
										<span class="badge bg-<?php echo e($ticket->priority === 'high' ? 'danger' : 
											($ticket->priority === 'medium' ? 'warning' : 'info')); ?>-subtle text-<?php echo e($ticket->priority === 'high' ? 'danger' : 
											($ticket->priority === 'medium' ? 'warning' : 'info')); ?>">
											<?php echo e(__(ucfirst($ticket->priority))); ?>

										</span>
									</td>
									<td><?php echo e($ticket->updated_at->format('Y-m-d H:i')); ?></td>
									<td><?php echo e($ticket->created_at->format('Y-m-d H:i')); ?></td>
									<td>
										<a href="<?php echo e(route('user.tickets.show', $ticket)); ?>" class="btn btn-sm btn-outline-primary">
											<i class="ti tabler-eye"></i> <?php echo e(__('View')); ?>

										</a>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								<tr>
									<td colspan="8" class="text-center text-muted"><?php echo e(__('No tickets found')); ?></td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
				<div class="mt-3">
					<?php echo e($tickets->links()); ?>

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
<?php endif; ?><?php /**PATH /www/wwwroot/public_html/website/wa.bdi.asia/resources/themes/vuexy/views/pages/user/tickets/index.blade.php ENDPATH**/ ?>