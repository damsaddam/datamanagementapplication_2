<?php include_once('../_header.php') ?>

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

        .content .submit {
            font-size: 16px;
            color: white;
            font-weight: normal;
            background-color: rgb(0, 70, 0);
        }

        .content .submit:hover {
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
                    <h2 class="brand">TAMBAH DATA RUANGAN / KELAS</h2>
                    <div class="pull-right">
                        <a href="data.php" class="btn back"><i class="bi bi-arrow-return-left"></i>Kembali</a>
                    </div>
                </div>
            </div>
            <div class="content row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="add.php" method="post">
                        <div class="form-group">
                            <label for="count_add">Banyak Ruangan / Kelas yang Ditambahkan</label>
                            <input type="number" name="count_add" class="form-control" id="count_add" maxlength="2" required autofocus>
                        </div>
                        <div class="form-group pull-right">
                            <input type="submit" name="generate" value="Generate" class="btn submit">
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

<?php include_once('../_footer.php') ?>