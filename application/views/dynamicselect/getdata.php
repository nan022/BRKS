<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Tambah Data</title>
</head>

<body>
    <div class="container">
        <div class="row mt-2 justify-content-md-center">
            <div class="col-6">

                <div class="card">
                    <div class="card-body">
                        <?= form_open(); ?>
                            <div class="form-group">
                                <label for="reseller">Reseller</label>
                                <select class="form-control" id="reseller" name="reseller" required>
                                    <option value="">--Pilih Reseller--</option>
                                    <?php foreach ($reseller as $res) : ?>
                                        <option value="<?= $res['id']; ?>"><?= $res['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product">Product</label>
                                <select class="form-control" id="product" name="product" required>
                                    <option value="">--Pilih Product--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="version">Version</label>
                                <select class="form-control" id="version" name="version" required>
                                    <option value="">--Pilih Version--</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="order_id" class="form-label">Order ID</label>
                                <input type="text" class="form-control" id="order_id" name="order_id" placeholder="Enter Order ID">
                                <?= form_error('order_id', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity">
                                <?= form_error('quantity', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="detail" class="form-label">Pilih File</label>
                                <input class="form-control" type="file" id="detail">
                            </div>
                            <button type="submit" class="btn btn-primary">SAVE</button>
                            <a href="<?= base_url('Select') ?>" class="btn btn-danger">BACK</a>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#reseller').change(function() {
                var id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('select/getproduct') ?>",
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
                    url: "<?= base_url('select/getversion') ?>",
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
                    url: "<?= base_url('select/getDesa') ?>",
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
    </script>
</body>

</html>