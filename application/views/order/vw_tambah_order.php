<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title"><b>Tambah Record Order</b></div>
								</div>
								<div class="card-body">
									<!-- <?= form_open(); ?> -->
									<form enctype="multipart/form-data" method="POST">
										<div class="row">
											<div class="col-md-6 col-lg-7">
												<div class="form-group form-floating-label">
												<label for="id_res">Reseller</label>
													<select class="form-control" id="id_res" name="id_res" required>
														<option value="">--Select Reseller--</option>
														<?php foreach ($reseller as $res) : ?>
															<option value="<?= $res['id']; ?>"><?= $res['nama']; ?></option>
														<?php endforeach; ?>
													</select>
												</div> 
												<div class="form-group form-floating-label">
													<label for="product">Product</label>
													<select class="form-control" id="product" name="product" required>
														<option value="">--Select Product--</option>
														<label for="selectFloatingLabel" class="placeholder">Product</label>
													</select>
												</div>
												<div class="form-group form-floating-label">
													<label for="version">Version</label>
													<select class="form-control" id="version" name="version" required>
														<option value="">--Select Version--</option>
														<label for="selectFloatingLabel" class="placeholder">Version</label>
													</select>
												</div>
												<div class="form-group">
													<label for="order_id" class="form-label">Order ID</label>
													<input type="text" class="form-control" id="order_id" name="order_id" placeholder="Enter Order ID">
													<?= form_error('order_id', '<small class="text-danger p1-3">', '</small>'); ?>
												</div>
												<div class="form-group">
													<label for="quantity" class="form-label">Quantity</label>
													<input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity">
													<?= form_error('quantity', '<small class="text-danger p1-3">', '</small>'); ?>
												</div>
												<div class="form-group">
													<label for="detail">Detail</label>
													<input name="detail" type="file" class="form-control-file" id="detail" onchange="return fileValidation()">
													<?= form_error('detail', '<small class="text-danger p1-3">', '</small>'); ?>
												</div>
											</div>
										</div>
										<div class="card-action">
											<button type="submit" class="btn btn-success" id="btn_save">Save</button>
											<a href="<?= base_url('OrderRecord') ?>" class="btn btn-danger">Cancel</a>
										</div>
										<!-- <?= form_close(); ?> -->
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
			<script type="text/javascript">
				$(document).ready(function() {
					$('#id_res').change(function() {
					var id = $(this).val();
					$.ajax({
						type: "POST",
						url: "<?= base_url('orderrecord/getproduct') ?>",
						data: {
							id: id
						},
						dataType: "JSON",
						success: function(response) {
							$('#product').html(response);
						}
					});
					});

					$('#product').change(function() {
					var id = $(this).val();
					$.ajax({
						type: "POST",
						url: "<?= base_url('orderrecord/getversion') ?>",
						data: {
							id: id
						},
						dataType: "JSON",
						success: function(response) {
							$('#version').html(response);
						}
					});
					});

					$('#version').change(function() {
					var id = $(this).val();
					$.ajax({
						type: "POST",
						url: "<?= base_url('orderrecord/getDesa') ?>",
						data: {
							id: id
						},
						dataType: "JSON",
						success: function(response) {
							$('#desa').html(response);
						}
					});
					});
				});

					// var uploadField = document.getElementById('detail');
					// uploadField.onchange = function(){
					// 	if(this.files[0].size > 800000){
					// 	swal("Oops!", "Maksimal 800 kb!", {
					// 	icon : "error",
					// 	});
					// 		this.value = "";
					// 	};
					// };

					// Funtion type file
					function fileValidation(){
						var fileInput = document.getElementById('detail');
						var filePath = fileInput.value;
						var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
						var size = parseFloat(fileInput.files[0].size / (800000)).toFixed(2);
						if(size > 2 || !allowedExtensions.exec(filePath)){
							swal("Oops!", "Upload file having extensions .jpeg/.jpg/.png and max. 800kb !", {
							icon : "error",
							});
							fileInput.value = '';
							return false;
						}
					}
    			</script>