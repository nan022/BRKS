<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
                        <a href="<?= base_url() ?>Version/tambah" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">
								<span>
								<i class="fas fa-plus"></i>&nbsp
								<span><b>Tambah Data</b></span>
							</span>
						</a>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Data Version Product</h4>
								</div>
								<div class="card-body">
							 	<?= $this->session->flashdata('message') ?>
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
                                        <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Product Name</td>
                                            <td>Version</td>
							  <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($version as $vr) : ?>
                                            <tr>
                                                <td><?= $i; ?>.</td>
                                                <td><?= $vr['product_desc']; ?></td>										
                                                <td><?= $vr['version_name']; ?></td>										
												<td>
													<a href="<?= base_url('Version/edit/') . $vr['id']; ?>" class="badge badge-warning">Edit</a>
													<a href="<?= base_url('Version/hapus/') . $vr['id']; ?>" class="badge badge-danger">Hapus</a>
												</td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
								</table>
									</div>
								</div>
							</div>
						</div>