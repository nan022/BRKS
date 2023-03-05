<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title"><b>Update Data Reseller</b></div>
								</div>
								<div class="card-body">
									<!-- <?= form_open(); ?> -->
									<form enctype="multipart/form-data" method="POST">
										<div class="row">
											<div class="col-md-6 col-lg-7">
                                                                        <input type="hidden" name="id" value="<?= $reseller['id']; ?>">    
												<div class="form-group">
													<label for="nama" class="form-label">Nama</label>
													<input type="text" class="form-control" value="<?= $reseller['nama'] ?>" id="nama" name="nama" placeholder="Enter Reseller Name">
													<?= form_error('nama', '<small class="text-danger p1-3">', '</small>'); ?>
												</div>
												<div class="form-group">
													<label for="alamat" class="form-label">Alamat</label>
													<input type="text" class="form-control" value="<?= $reseller['alamat'] ?>" id="alamat" name="alamat" placeholder="Enter Address">
													<?= form_error('alamat', '<small class="text-danger p1-3">', '</small>'); ?>
												</div>
												<div class="form-group">
													<label for="company" class="form-label">Company</label>
													<input type="text" class="form-control" value="<?= $reseller['company'] ?>" id="company" name="company" placeholder="Enter Company">
													<?= form_error('company', '<small class="text-danger p1-3">', '</small>'); ?>
												</div>
												<div class="form-group">
													<label for="tenant_id" class="form-label">Tenant ID</label>
													<input type="text" class="form-control" value="<?= $reseller['tenant_id'] ?>" id="tenant_id" name="tenant_id" placeholder="Enter Tenant ID">
													<?= form_error('tenant_id', '<small class="text-danger p1-3">', '</small>'); ?>
												</div>
												<div class="form-group">
													<label for="host_name" class="form-label">Host Name</label>
													<input type="text" class="form-control" value="<?= $reseller['host_name'] ?>" id="host_name" name="host_name" placeholder="Enter Order ID">
													<?= form_error('host_name', '<small class="text-danger p1-3">', '</small>'); ?>
												</div>
												<div class="form-group">
													<label for="serial_number" class="form-label">Serial Number</label>
													<input type="text" class="form-control" value="<?= $reseller['serial_number'] ?>" id="serial_number" name="serial_number" placeholder="Enter serial_number">
													<?= form_error('serial_number', '<small class="text-danger p1-3">', '</small>'); ?>
												</div>
											</div>
										</div>
										<div class="card-action">
											<button type="submit" class="btn btn-success" id="btn_save">Save</button>
											<a href="<?= base_url('Reseller') ?>" class="btn btn-danger">Cancel</a>
										</div>
										<!-- <?= form_close(); ?> -->
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>