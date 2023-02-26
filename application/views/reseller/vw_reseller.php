<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
                        <a href="<?= base_url() ?>Reseller/tambah" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air">
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
									<h4 class="card-title">Data Reseller</h4>
								</div>
								<div class="card-body">
							 	<?= $this->session->flashdata('message') ?>
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
                                        <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Reseller Name</td>
											<td>Address</td>
                                            <td>Company</td>
                                            <td>Tenant ID</td>
                                            <!-- <td>Host ID</td> -->
                                            <td>Serial Number</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($reseller as $rs) : ?>
                                            <tr>
                                                <td><?= $i; ?>.</td>
                                                <td><?= $rs['nama']; ?></td>
												<td><?= $rs['alamat']; ?></td>										
                                                <td><?= $rs['company']; ?></td>										
												<td><?= $rs['tenant_id']; ?></td>
                                                <!-- <td><?= $rs['host_name']; ?></td> -->
                                                <td><?= $rs['serial_number']; ?></td>
                                                <td>
                                                    <a href="<?= base_url('Reseller/edit/') . $rs['id']; ?>" class="badge badge-warning">Edit</a>
                                                    <a href="<?= base_url('Reseller/hapus/') . $rs['id']; ?>" class="badge badge-danger">Hapus</a>
													<!-- <a href="<?= base_url('Reseller/detail/') . $rs['id']; ?>" class="badge badge-primary">Detail</a> -->
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