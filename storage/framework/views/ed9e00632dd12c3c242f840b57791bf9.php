<?php if (isset($component)) { $__componentOriginald819fa024fa6d382567c72bcf8897f25 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald819fa024fa6d382567c72bcf8897f25 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'theme::components.layout-dashboard','data' => ['title' => ''.e(__('Campaign')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('Campaign')).'']); ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom-icon">
            <li class="breadcrumb-item">
                <a href="javascript:void(0);"><?php echo e(__('Reports')); ?></a>
                <i class="breadcrumb-icon icon-base ti tabler-chevron-right align-middle icon-xs"></i>
            </li>
            <li class="breadcrumb-item active"><?php echo e(__('Campaign')); ?></li>
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
            <p class="mb-0"><?php echo e(__('The given data was invalid.')); ?></p>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

<?php if(!session()->has('selectedDevice')): ?>
    <div class="card shadow-sm border-0">
        <div class="alert alert-danger m-4 text-center">
            <?php echo e(__('Please select a device first')); ?>

        </div>
    </div>
<?php else: ?>
<div class="row g-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <form class="row g-3 align-items-end">
                    <div class="col-12 col-md-4">
                        <label class="form-label"><?php echo e(__('Device')); ?></label>
                        <input type="number" name="device" class="form-control form-control-sm" value="<?php echo e(request()->device ?? ''); ?>" placeholder="<?php echo e(__('Device ID')); ?>">
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="form-label"><?php echo e(__('Status')); ?></label>
                        <select name="status" class="form-select form-select-sm">
                            <option value="all" <?php echo e(request()->status == 'all' ? 'selected' : ''); ?>><?php echo e(__('All')); ?></option>
                            <option value="completed" <?php echo e(request()->status == 'completed' ? 'selected' : ''); ?>><?php echo e(__('Completed')); ?></option>
                            <option value="processing" <?php echo e(request()->status == 'processing' ? 'selected' : ''); ?>><?php echo e(__('Processing')); ?></option>
                            <option value="waiting" <?php echo e(request()->status == 'waiting' ? 'selected' : ''); ?>><?php echo e(__('Waiting')); ?></option>
                            <option value="paused" <?php echo e(request()->status == 'paused' ? 'selected' : ''); ?>><?php echo e(__('Paused')); ?></option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4 text-end">
                        <button class="btn btn-outline-primary btn-sm w-100" type="submit">
                            <i class="ti tabler-filter-search me-1"></i> <?php echo e(__('Filter Campaign')); ?>

                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0 d-flex align-items-center gap-2"><?php echo e(__('Campaigns')); ?></h5>
                <button type="button" class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1"
                    data-bs-toggle="modal" data-bs-target="#deleteAllModal">
                    <i class="ti tabler-trash"></i> <?php echo e(__('Clear Campaign')); ?>

                </button>
            </div>

            <div class="card-body">
                <div class="table-responsive border rounded">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="border-top">
                            <tr>
                                <th><?php echo e(__('Device')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Message')); ?></th>
                                <th><?php echo e(__('Schedule')); ?></th>
                                <th><?php echo e(__('Summary')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th class="text-center"><?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($campaigns->total() == 0): ?>
                                <?php if (isset($component)) { $__componentOriginalf93c233e0d4ceea9c88c0d88798bcfbc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf93c233e0d4ceea9c88c0d88798bcfbc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'theme::components.no-data','data' => ['colspan' => '7','text' => ''.e(__('No Campaigns added yet')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('no-data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['colspan' => '7','text' => ''.e(__('No Campaigns added yet')).'']); ?>
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

                            <?php $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="fw-semibold text-dark"><?php echo e($campaign->device->body ?? ''); ?></td>
                                    <td><?php echo e($campaign->name); ?></td>
                                    <td>
                                        <a onclick="viewMessage('<?php echo e($campaign->id); ?>')" href="javascript:void(0);" class="text-info d-flex align-items-center gap-1 text-decoration-none" title="<?php echo e(__('View Message')); ?>">
                                            <i class="ti tabler-eye"></i> <?php echo e($campaign->type); ?>

                                        </a>
                                    </td>
                                    <td><?php echo e(\App\Traits\ConvertsDates::convertToUserTimezone($campaign->schedule)); ?></td>
                                    <td>
                                        <div class="d-flex flex-column gap-1">
                                            <span class="badge bg-label-primary d-flex justify-content-between">
                                                <span><?php echo e(__('Total')); ?></span><span><?php echo e($campaign->blasts_count); ?></span>
                                            </span>
                                            <span class="badge bg-label-success d-flex justify-content-between">
                                                <span><?php echo e(__('Success')); ?></span><span><?php echo e($campaign->blasts_success); ?></span>
                                            </span>
                                            <span class="badge bg-label-danger d-flex justify-content-between">
                                                <span><?php echo e(__('Failed')); ?></span><span><?php echo e($campaign->blasts_failed); ?></span>
                                            </span>
                                            <span class="badge bg-label-warning text-dark d-flex justify-content-between">
                                                <span><?php echo e(__('Waiting')); ?></span><span><?php echo e($campaign->blasts_pending); ?></span>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                            $statusClass = match($campaign->status) {
                                                'completed' => 'success',
                                                'paused' => 'secondary',
                                                'waiting' => 'warning text-dark',
                                                'processing' => 'info',
                                                default => 'danger'
                                            };
                                        ?>
                                        <span class="badge rounded-pill bg-<?php echo e($statusClass); ?>-subtle text-<?php echo e($statusClass); ?>"><?php echo e(__($campaign->status)); ?></span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="<?php echo e(route('campaign.blasts', $campaign->id)); ?>" class="btn btn-sm btn-outline-primary">
                                                <i class="ti tabler-eye"></i>
                                            </a>
                                            <?php if(in_array($campaign->status, ['processing', 'waiting'])): ?>
                                                <a href="javascript:void(0);" onclick="pauseCampaign('<?php echo e($campaign->id); ?>')" class="btn btn-sm btn-outline-warning">
                                                    <i class="ti tabler-pause"></i>
                                                </a>
                                            <?php endif; ?>
                                            <?php if($campaign->status == 'paused'): ?>
                                                <a href="javascript:void(0);" onclick="resumeCampaign('<?php echo e($campaign->id); ?>')" class="btn btn-sm btn-outline-success">
                                                    <i class="ti tabler-player-play"></i>
                                                </a>
                                            <?php endif; ?>
                                            <a href="javascript:void(0);" onclick="openDeleteModal('<?php echo e($campaign->id); ?>')" class="btn btn-sm btn-outline-danger">
                                                <i class="ti tabler-trash-x"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <div class="row mx-3 justify-content-between">
                    <?php echo e($campaigns->links('pagination::bootstrap-5')); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="previewMessage" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog"><div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><?php echo e(__('Campaign Message Preview')); ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body preview-message-area"></div>
    </div></div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-body text-center py-4">
                <i class="ti tabler-alert-circle text-danger mb-3" style="font-size:48px;"></i>
                <h5 class="mb-2"><?php echo e(__('Confirm Deletion')); ?></h5>
                <p class="text-muted mb-4"><?php echo e(__('Are you sure you want to delete this campaign? This action cannot be undone.')); ?></p>
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                    <button type="button" id="confirmDeleteBtn" class="btn btn-outline-danger btn-sm"><?php echo e(__('Delete')); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteAllModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-body text-center py-4">
                <i class="ti tabler-trash text-danger mb-3" style="font-size:48px;"></i>
                <h5 class="mb-2"><?php echo e(__('Confirm Deletion')); ?></h5>
                <p class="text-muted mb-4"><?php echo e(__('Are you sure you want to clear all campaigns? This cannot be undone.')); ?></p>
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="clearCampaign()"><?php echo e(__('Clear All')); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
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

<script>
let deleteId = null;

function openDeleteModal(id) {
    deleteId = id;
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}

document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
    if (!deleteId) return;
    $.ajax({
        url: "<?php echo e(route('campaign.delete', ['id' => '___ID___'])); ?>".replace('___ID___', deleteId),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'DELETE',
        dataType: 'json',
        success: () => location.reload(),
        error: () => notyf.error('<?php echo e(__("something went wrong when deleting campaign")); ?>')
    });
});

function clearCampaign() {
    $.ajax({
        url: "<?php echo e(route('campaigns.delete.all')); ?>",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'DELETE',
        dataType: 'json',
        success: () => location.reload(),
        error: () => notyf.error('<?php echo e(__("something went wrong when clearing campaign")); ?>')
    });
}
</script>
<?php /**PATH /www/wwwroot/public_html/website/wa.bdi.asia/resources/themes/vuexy/views/pages/campaign/index.blade.php ENDPATH**/ ?>