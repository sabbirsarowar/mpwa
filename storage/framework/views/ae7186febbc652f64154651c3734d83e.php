<?php if (isset($component)) { $__componentOriginald819fa024fa6d382567c72bcf8897f25 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald819fa024fa6d382567c72bcf8897f25 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'theme::components.layout-dashboard','data' => ['title' => ''.e(__('Languages')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('Languages')).'']); ?>
    <div class="card shadow-sm border-0">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0"><?php echo e(__('Available Languages')); ?></h5>
            <button type="button"
                class="btn btn-sm btn-outline-primary d-flex align-items-center"
                onclick="openAddLanguage()">
                <i class="ti tabler-language me-1"></i> <?php echo e(__('Add New Language')); ?>

            </button>
        </div>
        <div class="card-body px-4">
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-hover">
                    <thead class="border-top">
                        <tr>
                            <th><?php echo e(__('Language')); ?></th>
                            <th><?php echo e(__('Translated')); ?></th>
                            <th><?php echo e(__('Remaining')); ?></th>
                            <th><?php echo e(__('Progress')); ?></th>
                            <th><?php echo e(__('Actions')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <span class="fw-semibold">[<?php echo e($supportedLocales[$lang]['name'] ?? strtoupper($lang)); ?>]</span>
                                    <span class="text-muted"> - <?php echo e($supportedLocales[$lang]['native'] ?? strtoupper($lang)); ?></span>
                                </td>
                                <td><?php echo e($progressData[$lang]['translated']); ?></td>
                                <td><?php echo e($progressData[$lang]['remaining']); ?></td>
                                <td>
                                    <div class="progress" style="height: 16px;">
                                        <div class="progress-bar <?php if($progressData[$lang]['percentage'] == '100'): ?> bg-success <?php endif; ?>"
                                            role="progressbar"
                                            style="width: <?php echo e($progressData[$lang]['percentage']); ?>%;"
                                            aria-valuenow="<?php echo e($progressData[$lang]['percentage']); ?>" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo e($progressData[$lang]['percentage']); ?>%
                                        </div>
                                    </div>
                                </td>
                                <td class="d-flex gap-2">
                                    <?php if(strtolower($lang) == $baseLang): ?>
                                        <button class="btn btn-sm btn-outline-primary d-flex align-items-center" disabled>
                                            <i class="ti tabler-edit me-1"></i><?php echo e(__('Edit')); ?>

                                        </button>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('languages.edit', $lang)); ?>" class="btn btn-sm btn-outline-primary d-flex align-items-center">
                                            <i class="ti tabler-edit me-1"></i><?php echo e(__('Edit')); ?>

                                        </a>
                                        <button class="btn btn-sm btn-outline-danger d-flex align-items-center justify-content-center px-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal<?php echo e($lang); ?>">
                                            <i class="ti tabler-trash"></i>
                                        </button>
                                    <?php endif; ?>
                                </td>
                            </tr>

                            <?php if(strtolower($lang) != $baseLang): ?>
                                <div class="modal fade" id="deleteModal<?php echo e($lang); ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo e($lang); ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel<?php echo e($lang); ?>">
                                                    <i class="ti tabler-alert-circle me-1 text-danger"></i><?php echo e(__('Confirm Delete')); ?>

                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo e(__('Are you sure you want to delete')); ?> <strong>[<?php echo e(strtoupper($lang)); ?>]</strong> <?php echo e(__('language file?')); ?>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><?php echo e(__('No')); ?></button>
                                                <form action="<?php echo e(route('languages.destroy', $lang)); ?>" method="POST" style="display: inline;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-outline-danger"><?php echo e(__('Yes')); ?></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="addLanguageCanvas" aria-labelledby="addLanguageCanvasLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="addLanguageCanvasLabel"><?php echo e(__('Add New Language')); ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form id="addLanguageForm">
                <div class="form-group mb-3">
                    <label for="languageSelect"><?php echo e(__('Select Language')); ?></label>
                    <select id="languageSelect" name="language" class="form-control">
                        <?php $__currentLoopData = $filteredLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!in_array($code, $existingLanguages)): ?>
                                <option value="<?php echo e($code); ?>"><?php echo e($name); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </form>
        </div>
        <div class="offcanvas-footer border-top p-3 d-flex justify-content-between">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="offcanvas"><?php echo e(__('Cancel')); ?></button>
            <button type="button" class="btn btn-sm btn-outline-primary" onclick="addNewLanguage()"><?php echo e(__('Add')); ?></button>
        </div>
    </div>

    <script>
    function openAddLanguage() {
        const canvas = new bootstrap.Offcanvas(document.getElementById('addLanguageCanvas'));
        canvas.show();
    }

    function addNewLanguage() {
        const language = document.getElementById('languageSelect').value;
        fetch('<?php echo e(route("languages.add")); ?>', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ language }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                toastr.success(data.message);
                location.reload();
            } else {
                toastr.success(data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }
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
<?php /**PATH /www/wwwroot/public_html/website/wa.bdi.asia/resources/themes/vuexy/views/pages/admin/languages/index.blade.php ENDPATH**/ ?>