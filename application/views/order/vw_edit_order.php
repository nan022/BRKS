<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="card-title"><b>Edit Record Order</b></div>
						</div>
						<div class="card-body">
							<!-- <?= form_open(); ?> -->
							<form enctype="multipart/form-data" method="POST">
								<input type="hidden" name="id_ord" id="id_ord"
									value="<?= $byId['id_ord']; ?>">
								<div class="row">
									<div class="col-md-6 col-lg-7">
										<div class="form-group form-floating-label">
											<label for="reseller">Reseller</label>
											<select class="form-control" id="reseller"
												name="reseller" required>
												<option value="">--Select Reseller--</option>
													<?php foreach ($reseller as $res) { ?>
													<?php if($res['id'] == $byId['id_res']){ ?>
														<option value="<?= $res['id']; ?>" selected> <?=  $res['nama']; ?>
													<?php }else{ ?>
														<option value="<?= $res['id']; ?>"> <?=  $res['nama']; ?>
													<?php } ?>
												<?php } ?>
											</select>
										</div>
										<div class="form-group form-floating-label">
											<label for="product">Product</label>
											<select class="form-control" id="product"
												name="product" required>
												<option value="">--Select Product--</option>
												<label for="selectFloatingLabel"
													class="placeholder">Product</label>
											</select>
										</div>
										<div class="form-group form-floating-label">
											<label for="version">Version</label>
											<select class="form-control" id="version"
												name="version" required>
												<option value="">--Select Version--</option>
												<label for="selectFloatingLabel"
													class="placeholder">Version</label>
											</select>
										</div>
										<div class="form-group">
											<label for="order_id" class="form-label">Order
												ID</label>
											<input type="text" class="form-control" id="order_id"
												name="order_id" placeholder="Enter Order ID">
											<?= form_error('order_id', '<small class="text-danger p1-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<label for="quantity"
												class="form-label">Quantity</label>
											<input type="number" class="form-control"
												id="quantity" name="quantity"
												placeholder="Enter Quantity">
											<?= form_error('quantity', '<small class="text-danger p1-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<label for="detail">Detail</label>
											<input name="detail" type="file"
												class="form-control-file" id="detail" required>
											<?= form_error('detail', '<small class="text-danger p1-3">', '</small>'); ?>
										</div>
									</div>
								</div>
								<div class="card-action">
									<button type="submit" class="btn btn-success"
										id="btn_save">Save</button>
									<a href="<?= base_url('OrderRecord') ?>"
										class="btn btn-danger">Cancel</a>
								</div>
								<!-- <?= form_close(); ?> -->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js"
		integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
	<script src="https://code.jQuery.com/jQuery-1.10.2.js"> </script>
	<script>
		$(document).ready(function () {

			var e = document.getElementById("reseller");
			var id = e.options[e.selectedIndex].value;
			
			var oke = document.getElementById("product");
			var id_pro = oke.options[oke.selectedIndex].value;

			// var f = document.getElementById("product");
			// var value = f.value;
			// var text = f.options[f.selectedIndex].text;
			// alert(text);

			$('#reseller').change(function () {
			$.ajax({
				type: "POST",
				url: "<?= base_url('OrderRecord/getProductAdd') ?>",
				data: {
					id: id,
				},
				dataType: "JSON",
				success: function (response) {
					$('#product').html(response);
				}
			});
			});

			$('#product').change(function () {
				var id = $(this).val();
				$.ajax({
					type: "POST",
					url: "<?= base_url('orderrecord/getversion') ?>",
					data: {
						id: id
					},
					dataType: "JSON",
					success: function (response) {
						$('#version').html(response);
					}
				});
			});

			// $('#reseller').change(function () {
			// 	var id = $(this).val();
			// 	$.ajax({
			// 		type: "POST",
			// 		url: "<?= base_url('OrderRecord/getProduct') ?>",
			// 		data: {
			// 			id: id
			// 		},
			// 		dataType: "JSON",
			// 		success: function (response) {
			// 			$('#product').html(response);
			// 		}
			// 	});
			// });

			var id_ord = "<?= $byId['id_ord'] ?>"
			$.ajax({
				type: "GET",
				url: "<?= base_url('OrderRecord/editData/') ?>" + id_ord + "/json",
				data: {
					id_ord: id_ord
				},
				dataType: "JSON",
				success: function (data) {
					$('[name="order_id"]').val(data.order_id);
					$('[name="quantity"]').val(data.quantity);
					$('[name="detail"]').val(data.detail);
					$('[name="reseller"]').val(data.id_res).trigger('change');
					$('[name="product"]').val(data.id_pro).trigger('change');
					$('[name="version"]').val(data.id_ver).trigger('change');
					console.log(data)
				}
			});

		});

	</script>
