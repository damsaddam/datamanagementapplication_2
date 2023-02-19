<?php include_once('../_header.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

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

    .pull-right i {
        padding-right: 3px;
    }

    .pull-right .btn {
        background-color: whitesmoke;
    }

    .pull-right .btn:hover {
        background-color: rgb(233, 233, 233);
    }

    .pull-right a:hover {
        color: rgb(0, 0, 255);
    }

    .content * {
        font-size: 16px;
    }

    .submit .btn {
        font-size: 16px;
        color: white;
        background-color: rgb(0, 70, 0);
    }

    .submit .btn:hover {
        background-color: rgb(0, 109, 0);
    }
</style>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="header row">
                <div class="col-lg-12">
                    <div class="fullscreen">
                        <a href="#menu-toggle" id="menu-toggle"><i class="bi bi-fullscreen"></i></a>
                    </div>
                    <h2 class="brand">TAMBAH DATA GURU</h2>
                    <div class="pull-right">
                        <a href="data.php" class="btn back"><i class="bi bi-arrow-return-left"></i>Kembali</a>
                    </div>
                </div>
            </div>
            <div class="content row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <label for="nomorinduk_guru">Nomor Induk</label>
                            <input type="number" name="nomorinduk_guru" id="nomorinduk_guru" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="nama_guru">Nama Guru</label>
                            <input type="text" name="nama_guru" id="nama_guru" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Silahkan Pilih Jenis Kelamin: </label><br>
                            <input type="radio" name="jenis_kelamin" id="Laki-Laki" value="Laki-Laki" />
                            <label for="Laki-Laki" style="padding-right: 16px;">Laki-Laki</label>
                            <input type="radio" name="jenis_kelamin" id="Perempuan" value="Perempuan" />
                            <label for="Perempuan">Perempuan</label>
                        </div>
                        <div class="form-group">
                            <label for="wali_kelas">Wali Kelas</label>
                            <input type="text" name="wali_kelas" id="wali_kelas" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">Nomor Telepon</label>
                            <input type="number" name="no_telp" id="no_telp" class="form-control" required>
                        </div>
                        <div class="submit pull-right form-group">
                            <input type="submit" name="add" value="Simpan" class="btn submit">
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
<?php include_once('../_footer.php'); ?>