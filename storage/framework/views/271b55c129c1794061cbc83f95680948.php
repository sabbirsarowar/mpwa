<?php $__currentLoopData = $phonebooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phonebook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="list-group-item border-1 rounded-3 mb-2 py-2 px-3 d-flex justify-content-between align-items-center hover-lift">
        <a href="javascript:;" 
           onclick="clickPhoneBook(<?php echo e($phonebook->id); ?>, this)"
           data-phonebook-id="<?php echo e($phonebook->id); ?>"
           class="d-flex align-items-center text-decoration-none flex-grow-1 gap-2">
            <div class="avatar flex-shrink-0 bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width:34px;height:34px;">
                <i class="ti tabler-bookmark"></i>
            </div>
            <div class="d-flex flex-column">
                <span class="fw-semibold text-dark text-truncate" style="max-width:150px;"><?php echo e($phonebook->name); ?></span>
            </div>
        </a>
        <div class="d-flex align-items-center gap-1">
            <button type="button" class="btn btn-sm text-muted px-1" 
                    onclick="navigator.clipboard.writeText('<?php echo e($phonebook->name); ?>'); notyf.success('Copied!')" 
                    title="<?php echo e(__('Copy Group Name')); ?>">
                <i class="ti tabler-copy"></i>
            </button>
            <form action="<?php echo e(route('tag.delete')); ?>" method="POST" 
                  onsubmit="return confirm('<?php echo e(__('do you sure want to delete this tag? ( All contacts in this tag also will delete! )')); ?>')" 
                  class="m-0">
                <?php echo csrf_field(); ?>
                <?php echo method_field('delete'); ?>
                <input type="hidden" name="id" value="<?php echo e($phonebook->id); ?>">
                <button type="submit" class="btn btn-sm text-danger px-1" title="<?php echo e(__('Delete')); ?>">
                    <i class="ti tabler-trash"></i>
                </button>
            </form>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /www/wwwroot/public_html/website/wa.bdi.asia/resources/themes/vuexy/views/pages/phonebook/dataphonebook.blade.php ENDPATH**/ ?>