<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title><?= $title ?></title>
</head>
<body>
    <div class="container">
        <div class="row mt-12">
            <div class="col-12">
                <div class="card-body">
                    <a href="<?= base_url('Select/add'); ?>" class="btn btn-primary mb-2">Tambah Data</a>
                    <?= $this->session->flashdata('status'); ?>
                    <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Reseller Name</th>
                            <th scope="col">Product Description</th>
                            <th scope="col">Version</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Detail</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>