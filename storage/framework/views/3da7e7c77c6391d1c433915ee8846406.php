<?php if (isset($component)) { $__componentOriginald819fa024fa6d382567c72bcf8897f25 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald819fa024fa6d382567c72bcf8897f25 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'theme::components.layout-dashboard','data' => ['title' => ''.e(__('Troubleshoot')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('Troubleshoot')).'']); ?>
<style>
	.terminal-line.success { color: #00ff7f; }
	.terminal-line.error { color: #ff4d4f; }
	.terminal-line.warning { color: #ffc107; }
	.terminal-line.info { color: #36e4ff; }
	#terminal {
		height: 350px;
		overflow-y: auto;
		font-family: monospace;
		white-space: pre-wrap;
	}
	.quick-actions .quick-box { cursor: pointer; transition: transform .15s ease, box-shadow .15s ease; border: 1px solid var(--bs-border-color); }
	.quick-actions .quick-box:hover { transform: translateY(-2px); box-shadow: 0 .5rem 1rem rgba(0,0,0,.08); }
	.quick-actions .quick-box.loading { opacity: .6; pointer-events: none; }
</style>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0"><?php echo e(__('Maintenance Shortcuts')); ?></h5>
        </div>
        <div class="card-body quick-actions">
            <div class="row g-4">
                <div class="col-12 col-md-4">
                    <div class="card quick-box h-100" data-url="<?php echo e(url('migrate')); ?>" data-name="<?php echo e(__('Migrate')); ?>">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-3">
                                <span class="badge bg-label-primary rounded-2 p-2">
                                    <i class="ti tabler-database-cog icon-28px"></i>
                                </span>
                                <div>
                                    <div class="fw-medium"><?php echo e(__('Migrate')); ?></div>
                                    <small class="text-muted"><?php echo e(__('Run database migrations')); ?></small>
                                </div>
                            </div>
                            <i class="ti tabler-chevron-right text-muted"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card quick-box h-100" data-url="<?php echo e(url('view-clear')); ?>" data-name="<?php echo e(__('View Clear')); ?>">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-3">
                                <span class="badge bg-label-info rounded-2 p-2">
                                    <i class="ti tabler-eye-cancel icon-28px"></i>
                                </span>
                                <div>
                                    <div class="fw-medium"><?php echo e(__('View Clear')); ?></div>
                                    <small class="text-muted"><?php echo e(__('Clear compiled views')); ?></small>
                                </div>
                            </div>
                            <i class="ti tabler-chevron-right text-muted"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card quick-box h-100" data-url="<?php echo e(url('clear-cache')); ?>" data-name="<?php echo e(__('Clear Cache')); ?>">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-3">
                                <span class="badge bg-label-danger rounded-2 p-2">
                                    <i class="ti tabler-refresh icon-28px"></i>
                                </span>
                                <div>
                                    <div class="fw-medium"><?php echo e(__('Clear Cache')); ?></div>
                                    <small class="text-muted"><?php echo e(__('Clear application cache')); ?></small>
                                </div>
                            </div>
                            <i class="ti tabler-chevron-right text-muted"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?php echo e(__('Troubleshoot')); ?></h5>
            <button id="startCheck" class="btn btn-sm btn-outline-primary">
                <i class="ti tabler-play me-1"></i> <?php echo e(__('Start')); ?>

            </button>
        </div>
        <div class="card-body">
			<div id="terminal" class="bg-dark text-white p-3 rounded"></div>

			<button id="copyReportBtn" class="btn btn-sm btn-outline-secondary mt-3 d-none">
				<i class="ti tabler-upload me-1"></i> <?php echo e(__('Copy Report Link')); ?>

			</button>
		</div>
    </div>

    <script>
		const terminal = document.getElementById('terminal');
		const copyBtn = document.getElementById('copyReportBtn');
		const startBtn = document.getElementById('startCheck');
		
		let stopRequested = false;
		let reportText = '';

		const checks = [
			'cron-user-history',
			'cron-blast',
			'cron-schedule',
			'php-version',
			'permissions',
			'storage-link',
			'hosting',
			'extensions',
			'ssl',
			'pem-ssl',
			'server',
			'node',
			'curl-test',
			'.env',
			'database',
			'cron'
		];

		async function runCheck(type) {
			if (stopRequested) return;

			const res = await fetch("<?php echo e(route('admin.troubleshoot.check')); ?>", {
				method: 'POST',
				headers: {
					'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({ type })
			});

			const data = await res.json();

			for (let line of data) {
				if (stopRequested) return;
				const el = document.createElement('div');
				el.className = 'terminal-line ' + line.status;
				el.textContent = line.text;
				terminal.appendChild(el);
				terminal.scrollTop = terminal.scrollHeight;
				reportText += line.text + '\n';
				await new Promise(resolve => setTimeout(resolve, 100));
			}
			reportText += '\n';
			terminal.innerHTML += '\n';
		}

		async function runAllChecks() {
			terminal.innerHTML = '';
			terminal.innerHTML = '<span class="terminal-line info"><?php echo e(__("Initializing system diagnostic...")); ?></span>\n\n';
			reportText = '';
			copyBtn.classList.add('d-none');
			stopRequested = false;
			startBtn.innerHTML = '<i class="ti tabler-square me-1"></i> <?php echo e(__("Stop")); ?>';
			startBtn.dataset.running = "1";

			const startTime = performance.now();

			for (let type of checks) {
				if (stopRequested) break;
				await runCheck(type);
			}

			const endTime = performance.now();
			const seconds = ((endTime - startTime) / 1000).toFixed(2);
			const el = document.createElement('div');
			el.className = 'terminal-line info';
			el.textContent = "<?php echo e(__('Total time: :seconds seconds')); ?>".replace(':seconds', seconds);
			terminal.appendChild(el);
			terminal.scrollTop = terminal.scrollHeight;
			reportText += "<?php echo e(__('Total time: :seconds seconds')); ?>\n".replace(':seconds', seconds);

			if (!stopRequested) {
				copyBtn.classList.remove('d-none');
				copyBtn.dataset.report = reportText;
				startBtn.innerHTML = '<i class="ti tabler-play me-1"></i> <?php echo e(__("Start")); ?>';
				startBtn.dataset.running = "0";
			}
		}

		startBtn.addEventListener('click', function () {
			if (startBtn.dataset.running === "1") {
				stopRequested = true;
				startBtn.innerHTML = '<i class="ti tabler-play me-1"></i> <?php echo e(__("Start")); ?>';
				startBtn.dataset.running = "0";
			} else {
				runAllChecks();
			}
		});

		copyBtn.addEventListener('click', async function () {
			const originalText = copyBtn.innerHTML;
			copyBtn.disabled = true;
			copyBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> <?php echo e(__("Uploading...")); ?>';

			try {
				const res = await fetch("<?php echo e(route('admin.troubleshoot.upload')); ?>", {
					method: 'POST',
					headers: {
						'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
						'Content-Type': 'application/json'
					},
					body: JSON.stringify({ report: copyBtn.dataset.report })
				});

				const result = await res.json();

				if (res.ok && result.link) {
					await navigator.clipboard.writeText(result.link);
					copyBtn.innerHTML = '<?php echo e(__("Link copied to clipboard!")); ?>';
					notyf.success('<?php echo e(__("Link copied successfully!")); ?>');
				} else {
					copyBtn.innerHTML = '<?php echo e(__("Upload failed!")); ?>';
					notyf.error('<?php echo e(__("Pastebin upload failed.")); ?>');
				}
			} catch (e) {
				copyBtn.innerHTML = '<?php echo e(__("Failed to upload!")); ?>';
				notyf.error('<?php echo e(__("Unexpected error during upload.")); ?>');
			}

			setTimeout(() => {
				copyBtn.innerHTML = originalText;
				copyBtn.disabled = false;
			}, 3000);
		});

		document.querySelectorAll('.quick-box').forEach(box => {
			box.addEventListener('click', async () => {
				if (box.classList.contains('loading')) return;
				box.classList.add('loading');
				const url = box.dataset.url;
				const name = box.dataset.name || url;
				try {
					const res = await fetch(url, { method: 'GET', headers: { 'X-Requested-With': 'XMLHttpRequest' } });
					if (res.ok) {
						notyf.success(name + ' <?php echo e(__("executed successfully")); ?>');
					} else {
						notyf.error(name + ' <?php echo e(__("failed to execute")); ?>');
					}
				} catch (e) {
					notyf.error('<?php echo e(__("Network error")); ?>');
				} finally {
					box.classList.remove('loading');
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
<?php endif; ?>
<?php /**PATH /www/wwwroot/public_html/website/wa.bdi.asia/resources/themes/vuexy/views/pages/admin/troubleshoot.blade.php ENDPATH**/ ?>