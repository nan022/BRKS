<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title"><b>Update Data Product Version</b></div>
								</div>
								<div class="card-body">
									<?= form_open(); ?>
									<form enctype="multipart/form-data" method="POST">
										<div class="row">
											<div class="col-md-6 col-lg-7">
                                                                        <input type="hidden" name="id" value="<?= $version['id']; ?>">    
												<div class="form-group">
													<label for="version_name" class="form-label">Version Name</label>
													<input type="text" class="form-control" value="<?= $version['version_name'] ?>" id="version_name" name="version_name" placeholder="Enter product Name">
													<?= form_error('version_name', '<small class="text-danger p1-3">', '</small>'); ?>
												</div>
												<div class="form-group">
													<label for="product" class="form-label">Product Name</label>
													<select class="form-control" id="product"
														name="product" disabled="true">
														<option value="<?= $product['id_pro'] ?>">--Select Product--</option>
															<?php foreach ($product as $pro) { ?>
															<?php if($pro['id'] == $version['id_pro']){ ?>
																<option value="<?= $pro['id']; ?>" selected> <?=  $pro['product_desc']; ?>
															<?php }else{ ?>
																<option value="<?= $pro['id']; ?>"> <?=  $pro['product_desc']; ?>
															<?php } ?>
														<?php } ?>
													</select>
													<?= form_error('product', '<small class="text-danger p1-3">', '</small>'); ?>
												</div>
											</div>
										</div>
										<div class="card-action">
											<button type="submit" class="btn btn-success" id="btn_save">Save</button>
											<a href="<?= base_url('Version') ?>" class="btn btn-danger">Cancel</a>
										</div>
									</form>
									<?= form_close(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>