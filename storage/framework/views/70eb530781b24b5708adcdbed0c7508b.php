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
				<a href="javascript:void(0);"><?php echo e(__('Admin')); ?></a>
				<i class="breadcrumb-icon icon-base ti tabler-chevron-right align-middle icon-xs"></i>
			</li>
			<li class="breadcrumb-item active"><?php echo e(__('Manage Plans')); ?></li>
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
	
	<div class="card shadow-sm border-0">
		<div class="card-header d-flex justify-content-between align-items-center">
			<h5 class="card-title mb-0">
				<?php echo e(__('Manage Plans')); ?>

			</h5>
			<div>
				<button class="btn btn-sm btn-outline-primary px-4" data-bs-toggle="modal" data-bs-target="#addPlanModal" onclick="resetModal()">
					<i class="ti tabler-plus me-1"></i> <?php echo e(__('Add New Plan')); ?>

				</button>
			</div>
		</div>
	</div>
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
							<i class="ti tabler-clock-hour-4 me-1"></i>
							<?php echo e(__('Trial')); ?>: <?php echo e($plan->trial_days); ?> <?php echo e(__('days')); ?>

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
						<div class="d-flex justify-content-center gap-2 mt-3">
							<button class="btn btn-outline-warning btn-sm" onclick="editPlan(<?php echo e(json_encode($plan)); ?>)">
								<i class="ti tabler-pencil"></i> <?php echo e(__('Edit')); ?>

							</button>
							<button class="btn btn-outline-danger btn-sm" data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>" data-bs-target="#deletePlanModal" onclick="confirmDelete(<?php echo e($plan->id); ?>)">
								<i class="ti tabler-trash"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>

    <!-- Add/Edit Plan Modal -->
    <div class="modal fade" id="addPlanModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="addPlanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <form id="planForm" action="<?php echo e(route('admin.plans.store')); ?>" method="POST" class="modal-content shadow-sm border-0">
            <?php echo csrf_field(); ?>

            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('Manage Plan')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" id="planId" name="id">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="title" class="form-label"><?php echo e(__('Title')); ?></label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="col-md-6">
                        <label for="price" class="form-label"><?php echo e(__('Price')); ?></label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>

                    <div class="col-md-6">
                            <label for="symbol" class="form-label"><?php echo e(__('Currency Symbol')); ?></label>
                            <select name="symbol" id="symbol" class="form-select" required>
							<optgroup label="<?php echo e(__('Main')); ?>">
								<option value="USD">$ - Dollar USD</option>
								<option value="EUR">€ - Euro</option>
								<option value="GBP">£ - Pound GBP</option>
								<option value="JPY">¥ - Yen JPY</option>
								<option value="INR">₹ - Rupee INR</option>
								<option value="RUB">₽ - Russian Ruble RUB</option>
							</optgroup>
							<optgroup label="<?php echo e(__('Other')); ?>">
								<option value="AED">AED - UAE Dirham</option>
								<option value="AFN">AFN - Afghan Afghani</option>
								<option value="ALL">ALL - Albanian Lek</option>
								<option value="AMD">AMD - Armenian Dram</option>
								<option value="ANG">ANG - Neth. Antillean Guilder</option>
								<option value="AOA">AOA - Angolan Kwanza</option>
								<option value="ARS">ARS - Argentine Peso</option>
								<option value="AUD">AUD - Australian Dollar</option>
								<option value="AWG">AWG - Aruban Florin</option>
								<option value="AZN">AZN - Azerbaijani Manat</option>
								<option value="BAM">BAM - Bosnia-Herzegovina Mark</option>
								<option value="BBD">BBD - Barbadian Dollar</option>
								<option value="BDT">BDT - Bangladeshi Taka</option>
								<option value="BGN">BGN - Bulgarian Lev</option>
								<option value="BHD">BHD - Bahraini Dinar</option>
								<option value="BIF">BIF - Burundian Franc</option>
								<option value="BMD">BMD - Bermudan Dollar</option>
								<option value="BND">BND - Brunei Dollar</option>
								<option value="BOB">BOB - Bolivian Boliviano</option>
								<option value="BRL">BRL - Brazilian Real</option>
								<option value="BSD">BSD - Bahamian Dollar</option>
								<option value="BTN">BTN - Bhutanese Ngultrum</option>
								<option value="BWP">BWP - Botswanan Pula</option>
								<option value="BYN">BYN - Belarusian Ruble</option>
								<option value="BZD">BZD - Belize Dollar</option>
								<option value="CAD">CAD - Canadian Dollar</option>
								<option value="CDF">CDF - Congolese Franc</option>
								<option value="CHF">CHF - Swiss Franc</option>
								<option value="CLP">CLP - Chilean Peso</option>
								<option value="CNY">CNY - Chinese Yuan</option>
								<option value="COP">COP - Colombian Peso</option>
								<option value="CRC">CRC - Costa Rican Colón</option>
								<option value="CUP">CUP - Cuban Peso</option>
								<option value="CVE">CVE - Cape Verdean Escudo</option>
								<option value="CZK">CZK - Czech Koruna</option>
								<option value="DJF">DJF - Djiboutian Franc</option>
								<option value="DKK">DKK - Danish Krone</option>
								<option value="DOP">DOP - Dominican Peso</option>
								<option value="DZD">DZD - Algerian Dinar</option>
								<option value="EGP">EGP - Egyptian Pound</option>
								<option value="ERN">ERN - Eritrean Nakfa</option>
								<option value="ETB">ETB - Ethiopian Birr</option>
								<option value="FJD">FJD - Fijian Dollar</option>
								<option value="FKP">FKP - Falkland Islands Pound</option>
								<option value="GEL">GEL - Georgian Lari</option>
								<option value="GHS">GHS - Ghanaian Cedi</option>
								<option value="GIP">GIP - Gibraltar Pound</option>
								<option value="GMD">GMD - Gambian Dalasi</option>
								<option value="GNF">GNF - Guinean Franc</option>
								<option value="GTQ">GTQ - Guatemalan Quetzal</option>
								<option value="GYD">GYD - Guyanaese Dollar</option>
								<option value="HKD">HKD - Hong Kong Dollar</option>
								<option value="HNL">HNL - Honduran Lempira</option>
								<option value="HTG">HTG - Haitian Gourde</option>
								<option value="HUF">HUF - Hungarian Forint</option>
								<option value="IDR">IDR - Indonesian Rupiah</option>
								<option value="ILS">ILS - Israeli Shekel</option>
								<option value="IQD">IQD - Iraqi Dinar</option>
								<option value="IRR">IRR - Iranian Rial</option>
								<option value="ISK">ISK - Icelandic Krona</option>
								<option value="JMD">JMD - Jamaican Dollar</option>
								<option value="JOD">JOD - Jordanian Dinar</option>
								<option value="KES">KES - Kenyan Shilling</option>
								<option value="KGS">KGS - Kyrgystani Som</option>
								<option value="KHR">KHR - Cambodian Riel</option>
								<option value="KMF">KMF - Comorian Franc</option>
								<option value="KPW">KPW - North Korean Won</option>
								<option value="KRW">KRW - South Korean Won</option>
								<option value="KWD">KWD - Kuwaiti Dinar</option>
								<option value="KYD">KYD - Cayman Islands Dollar</option>
								<option value="KZT">KZT - Kazakhstani Tenge</option>
								<option value="LAK">LAK - Laotian Kip</option>
								<option value="LBP">LBP - Lebanese Pound</option>
								<option value="LKR">LKR - Sri Lankan Rupee</option>
								<option value="LRD">LRD - Liberian Dollar</option>
								<option value="LSL">LSL - Lesotho Loti</option>
								<option value="LYD">LYD - Libyan Dinar</option>
								<option value="MAD">MAD - Moroccan Dirham</option>
								<option value="MDL">MDL - Moldovan Leu</option>
								<option value="MGA">MGA - Malagasy Ariary</option>
								<option value="MKD">MKD - Macedonian Denar</option>
								<option value="MMK">MMK - Myanma Kyat</option>
								<option value="MNT">MNT - Mongolian Tugrik</option>
								<option value="MOP">MOP - Macanese Pataca</option>
								<option value="MRU">MRU - Mauritanian Ouguiya</option>
								<option value="MUR">MUR - Mauritian Rupee</option>
								<option value="MVR">MVR - Maldivian Rufiyaa</option>
								<option value="MWK">MWK - Malawian Kwacha</option>
								<option value="MXN">MXN - Mexican Peso</option>
								<option value="MYR">MYR - Malaysian Ringgit</option>
								<option value="MZN">MZN - Mozambican Metical</option>
								<option value="NAD">NAD - Namibian Dollar</option>
								<option value="NGN">NGN - Nigerian Naira</option>
								<option value="NIO">NIO - Nicaraguan Córdoba</option>
								<option value="NOK">NOK - Norwegian Krone</option>
								<option value="NPR">NPR - Nepalese Rupee</option>
								<option value="NZD">NZD - New Zealand Dollar</option>
								<option value="OMR">OMR - Omani Rial</option>
								<option value="PAB">PAB - Panamanian Balboa</option>
								<option value="PEN">PEN - Peruvian Sol</option>
								<option value="PGK">PGK - Papua New Guinean Kina</option>
								<option value="PHP">PHP - Philippine Peso</option>
								<option value="PKR">PKR - Pakistani Rupee</option>
								<option value="PLN">PLN - Polish Zloty</option>
								<option value="PYG">PYG - Paraguayan Guarani</option>
								<option value="QAR">QAR - Qatari Riyal</option>
								<option value="RON">RON - Romanian Leu</option>
								<option value="RSD">RSD - Serbian Dinar</option>
								<option value="RWF">RWF - Rwandan Franc</option>
								<option value="SAR">SAR - Saudi Riyal</option>
								<option value="SBD">SBD - Solomon Islands Dollar</option>
								<option value="SCR">SCR - Seychellois Rupee</option>
								<option value="SDG">SDG - Sudanese Pound</option>
								<option value="SEK">SEK - Swedish Krona</option>
								<option value="SGD">SGD - Singapore Dollar</option>
								<option value="SHP">SHP - Saint Helena Pound</option>
								<option value="SLE">SLE - Sierra Leonean Leone</option>
								<option value="SOS">SOS - Somali Shilling</option>
								<option value="SRD">SRD - Surinamese Dollar</option>
								<option value="SSP">SSP - South Sudanese Pound</option>
								<option value="STN">STN - São Tomé & Príncipe Dobra</option>
								<option value="SYP">SYP - Syrian Pound</option>
								<option value="SZL">SZL - Swazi Lilangeni</option>
								<option value="THB">THB - Thai Baht</option>
								<option value="TJS">TJS - Tajikistani Somoni</option>
								<option value="TMT">TMT - Turkmenistani Manat</option>
								<option value="TND">TND - Tunisian Dinar</option>
								<option value="TOP">TOP - Tongan Paʻanga</option>
								<option value="TRY">TRY - Turkish Lira</option>
								<option value="TTD">TTD - Trinidad & Tobago Dollar</option>
								<option value="TWD">TWD - New Taiwan Dollar</option>
								<option value="TZS">TZS - Tanzanian Shilling</option>
								<option value="UAH">UAH - Ukrainian Hryvnia</option>
								<option value="UGX">UGX - Ugandan Shilling</option>
								<option value="UYU">UYU - Uruguayan Peso</option>
								<option value="UZS">UZS - Uzbekistan Som</option>
								<option value="VES">VES - Venezuelan Bolívar</option>
								<option value="VND">VND - Vietnamese Dong</option>
								<option value="VUV">VUV - Vanuatu Vatu</option>
								<option value="WST">WST - Samoan Tala</option>
								<option value="XAF">XAF - CFA Franc BEAC</option>
								<option value="XCD">XCD - East Caribbean Dollar</option>
								<option value="XOF">XOF - CFA Franc BCEAO</option>
								<option value="XPF">XPF - CFP Franc</option>
								<option value="YER">YER - Yemeni Riyal</option>
								<option value="ZAR">ZAR - South African Rand</option>
								<option value="ZMW">ZMW - Zambian Kwacha</option>
								<option value="ZWL">ZWL - Zimbabwean Dollar</option>
							</optgroup>
							</select>
                        </div>

                    <div class="col-md-6">
                        <label for="days" class="form-label"><?php echo e(__('Days')); ?></label>
                        <input type="number" class="form-control" id="days" name="days" required>
                    </div>

                    <div class="col-md-6">
                        <label for="trial_days" class="form-label"><?php echo e(__('Trial Days')); ?></label>
                        <input type="number" class="form-control" id="trial_days" name="trial_days" required>
                    </div>

                    <div class="col-md-6">
                        <label for="messages_limit" class="form-label"><?php echo e(__('Messages Limit')); ?></label>
                        <input type="number" class="form-control" id="messages_limit" name="messages_limit" required>
                    </div>

                    <div class="col-md-6">
                        <label for="device_limit" class="form-label"><?php echo e(__('Device Limit')); ?></label>
                        <input type="number" class="form-control" id="device_limit" name="device_limit" required>
                    </div>

                    <div class="col-md-6">
                        <label for="is_recommended" class="form-label"><?php echo e(__('Recommended?')); ?></label>
                        <select name="is_recommended" id="is_recommended" class="form-select">
                            <option value="0"><?php echo e(__('No')); ?></option>
                            <option value="1"><?php echo e(__('Yes')); ?></option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="status" class="form-label"><?php echo e(__('Status')); ?></label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="1"><?php echo e(__('Enable')); ?></option>
                            <option value="0"><?php echo e(__('Disable')); ?></option>
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <h6 class="text-muted"><?php echo e(__('Features')); ?></h6>
                    <div class="row g-2">
                        <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($key == "messages_limit" || $key == "device_limit"): ?>
									
								<?php else: ?>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="checkbox" id="<?php echo e($key); ?>" name="data[<?php echo e($key); ?>]" class="form-check-input">
                                        <label for="<?php echo e($key); ?>" class="form-check-label"><?php echo e($label); ?></label>
                                    </div>
                                </div>
								<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            <div class="modal-footer border-0">
                <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">
                    <i class="ti tabler-x me-1"></i> <?php echo e(__('Close')); ?>

                </button>
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="ti tabler-device-floppy me-1"></i> <?php echo e(__('Save Plan')); ?>

                </button>
            </div>
        </form>
    </div>
</div>


    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deletePlanModal" tabindex="-1" aria-labelledby="deletePlanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="deleteForm" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletePlanModalLabel"><?php echo e(__('Delete Confirmation')); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php echo e(__('Are you sure you want to delete this plan?')); ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                        <button type="submit" class="btn btn-danger"><?php echo e(__('Delete')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function editPlan(plan) {
            const modal = new bootstrap.Modal(document.getElementById('addPlanModal'));
			const dataplan = plan.data;
            document.getElementById('planForm').action = "<?php echo e(route('admin.plans.update', ['plan' => '___ID___'])); ?>".replace('___ID___', plan.id);
            document.getElementById('planForm').method = "POST";
            document.getElementById('planForm').insertAdjacentHTML('beforeend', '<input type="hidden" name="_method" value="PUT">');
            document.getElementById('planId').value = plan.id;
            document.getElementById('title').value = plan.title;
			document.getElementById('is_recommended').value = plan.is_recommended;
			document.getElementById('status').value = plan.status;
            document.getElementById('price').value = plan.price;
			document.getElementById('symbol').value = plan.symbol;
            document.getElementById('days').value = plan.days;
            document.getElementById('trial_days').value = plan.trial_days;
			document.getElementById('messages_limit').value = dataplan.messages_limit;
			document.getElementById('device_limit').value = dataplan.device_limit;

            for (const key in plan.data) {
				if (key !== 'send_template') {
					const checkbox = document.getElementById(key);
					if (checkbox) {
						checkbox.checked = !!plan.data[key];
					}
				}
			}
            modal.show();
        }

        function resetModal() {
            document.getElementById('planForm').reset();
            document.getElementById('planForm').action = "<?php echo e(route('admin.plans.store')); ?>";
            document.querySelector('input[name="_method"]').remove();
        }

        function confirmDelete(id) {
			const modalDelete = new bootstrap.Modal(document.getElementById('deletePlanModal'));
			modalDelete.show();
			document.getElementById('deleteForm').action = "<?php echo e(route('admin.plans.update', ['plan' => '___ID___'])); ?>".replace('___ID___', id);
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
<?php /**PATH /www/wwwroot/public_html/website/wa.bdi.asia/resources/themes/vuexy/views/pages/admin/plans/index.blade.php ENDPATH**/ ?>