<?php
$checked = $_POST['checked'];
if (!isset($checked)) {
    echo "<script>alert('Tidak ada data ruangan / kelas yang dipilih. Silahkan coba lagi'); window.location='data.php';</script>";
} else {
    include_once('../_header.php'); ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito Sans', sans-serif;
            }

            .brand {
                font-family: 'Montserrat', sans-serif;
                font-weight: bolder;
                letter-spacing: 1px;
                padding-bottom: 15px;
            }

            .fullscreen {
                width: 25px;
                padding: 0;
                margin: 0;
                transition: transform 0.5s;
            }

            .fullscreen:hover {
                transform: scale(1.3);
                padding: 0;
                margin: 0;
            }

            .fullscreen i {
                font-size: 25px;
                font-weight: bold;
                color: rgb(55, 0, 255);
            }

            .pull-right * {
                font-size: 16px;
                font-weight: bold;
                font-style: normal;
                color: rgb(0, 0, 255);
                margin-bottom: 3px;
            }

            .pull-right .btn {
                background-color: whitesmoke;
            }

            .pull-right .btn:hover {
                background-color: rgb(233, 233, 233);
                color: rgb(0, 0, 255);
            }

            .pull-right .back {
                margin-right: 7px;
            }

            .pull-right i {
                padding-right: 3px;
            }

            .content * {
                font-size: 16px;
            }

            .submit .btn {
                font-size: 16px;
                font-weight: normal;
                color: white;
                background-color: rgb(0, 70, 0);
            }

            .submit .btn:hover {
                color: white;
                background-color: rgb(0, 109, 0);
            }
        </style>

    </head>

    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="header row">
                    <div class="col-lg-12">
                        <div class="fullscreen">
                            <a href="#menu-toggle" id="menu-toggle"><i class="bi bi-fullscreen"></i></a>
                        </div>
                        <h2 class="brand">EDIT DATA RUANGAN / KELAS</h2>
                        <div class="pull-right">
                            <a href="data.php" class="btn refresh"><i class="bi bi-arrow-return-left"></i>Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="content row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <form action="proses.php" method="post">
                            <input type="hidden" name="total" value="<?= @$_POST['count_add'] ?>">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Ruangan / Kelas</th>
                                            <th>Lantai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($checked as $id) {
                                            $sql_ruangan = mysqli_query($con, "SELECT * FROM tb_ruangan WHERE id_ruangan = '$id'") or die(mysqli_error($con));
                                            while ($data = mysqli_fetch_array($sql_ruangan)) { ?>
                                                <tr>
                                                    <td><?= $no++ ?>.</td>
                                                    <td>
                                                        <input type="hidden" name="id[]" value="<?= $data['id_ruangan'] ?>">
                                                        <input type="text" name="nama[]" value="<?= $data['nama_ruangan'] ?>" class="form-control" required>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="lantai[]" value="<?= $data['lantai'] ?>" class="form-control" required>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="submit pull-right form-group">
                                    <input type="submit" name="edit" value="Simpan" class="btn submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src=" <?= base_url('_assets/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('_assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('_assets/js/bootstrap.min.js') ?>"></script>


    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

    </html>

<?php include_once('../_footer.php');
}
?>