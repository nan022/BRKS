<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title"><b>Update Data Product</b></div>
								</div>
								<div class="card-body">
									<?= form_open(); ?>
									<form enctype="multipart/form-data" method="POST">
										<div class="row">
											<div class="col-md-6 col-lg-7">
                                                                        <input type="hidden" name="id" value="<?= $product['id']; ?>">    
												<div class="form-group">
													<label for="product_desc" class="form-label">Product Name</label>
													<input type="text" class="form-control" value="<?= $product['product_desc'] ?>" id="product_desc" name="product_desc" placeholder="Enter Reseller Name">
													<?= form_error('product_desc', '<small class="text-danger p1-3">', '</small>'); ?>
												</div>
												<div class="form-group">
													<label for="reseller" class="form-label">Reseller Name</label>
													<select class="form-control" id="reseller"
														name="reseller" disabled="true">
														<option value="<?= $product['id_res'] ?>">--Select Reseller--</option>
															<?php foreach ($reseller as $res) { ?>
															<?php if($res['id'] == $product['id_res']){ ?>
																<option value="<?= $res['id']; ?>" selected> <?=  $res['nama']; ?>
															<?php }else{ ?>
																<option value="<?= $res['id']; ?>"> <?=  $res['nama']; ?>
															<?php } ?>
														<?php } ?>
													</select>
                                                                              <!-- <input type="text" class="form-control" value="<?= $reseller['nama'] ?>" id="nama" name="nama" readonly> -->
													<?= form_error('reseller', '<small class="text-danger p1-3">', '</small>'); ?>
												</div>
											</div>
										</div>
										<div class="card-action">
											<button type="submit" class="btn btn-success" id="btn_save">Save</button>
											<a href="<?= base_url('Product') ?>" class="btn btn-danger">Cancel</a>
										</div>
									</form>
									<?= form_close(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>