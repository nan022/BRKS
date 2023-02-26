<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title"><b>Tambah Data Version Product</b></div>
								</div>
								<div class="card-body">
									<!-- <?= form_open(); ?> -->
									<form enctype="multipart/form-data" method="POST">
										<div class="row">
											<div class="col-md-6 col-lg-7">
                                                                        <div class="form-group form-floating-label">
                                                                              <label for="id_pro">Product</label>
                                                                                    <select class="form-control" id="id_pro" name="id_pro" required>
                                                                                          <option value="">--Select Product--</option>
                                                                                          <?php foreach ($version as $ver) : ?>
                                                                                                <option value="<?=$ver['id']; ?>"><?=$ver['product_desc'],' - [',$ver['nama'], ']';  ?></option>
                                                                                          <?php endforeach; ?>
                                                                                    </select>
                                                                        </div> 
												<div class="form-group">
													<label for="version_name" class="form-label">Version</label>
													<input type="text" class="form-control" id="version_name" name="version_name" placeholder="Enter Version">
													<?= form_error('version_name', '<small class="text-danger p1-3">', '</small>'); ?>
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