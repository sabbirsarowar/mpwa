<div class="tab-pane fade show" id="vcardmessage" role="tabpanel">
<label for="name" class="form-label"><?php echo e(__('Name')); ?></label>
<input type="text" name="name" class="form-control" placeholder="john wick" id="name" required />
<label for="phone" class="form-label"><?php echo e(__('Number')); ?></label>
<input type="tel" name="phone" class="form-control" placeholder="6281xxxxxxx" id="phone" inputmode="numeric" pattern="[0-9]*" required />
						<input type="hidden" name="type" value="vcard" />
                </div>
<script>
    const numberInput = document.getElementById('phone');
    numberInput.addEventListener('input', function(e) {
        let inputValue = this.value.replace(/[^0-9]/g, '');
        this.value = inputValue;
    }, { passive: true });
</script><?php /**PATH /www/wwwroot/public_html/website/wa.bdi.asia/resources/themes/vuexy/views/ajax/blast/formvcard.blade.php ENDPATH**/ ?>