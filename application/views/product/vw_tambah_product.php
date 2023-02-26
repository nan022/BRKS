<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title"><b>Tambah Data Product</b></div>
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
                                                                                          <?php foreach ($product as $res) : ?>
                                                                                                <option value="<?= $res['id']; ?>"><?= $res['nama']; ?></option>
                                                                                          <?php endforeach; ?>
                                                                                    </select>
                                                                        </div> 
												<div class="form-group">
													<label for="product_desc" class="form-label">Product Description</label>
													<input type="text" class="form-control" id="product_desc" name="product_desc" placeholder="Enter Product Description">
													<?= form_error('product_desc', '<small class="text-danger p1-3">', '</small>'); ?>
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