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
    <link href="<?= base_url('_assets/libs/DataTables/datatables.min.css'); ?>" rel="stylesheet">
</head>

<style>
    body {
        font-family: 'Nunito Sans', sans-serif;
    }

    .brand {
        font-family: 'Montserrat', sans-serif;
        font-weight: bolder;
        letter-spacing: 1px;
        margin: 0;
        padding: 0;
    }

    .fullscreen {
        width: 25px;
        padding: 0;
        margin: 0 0 8px 0;
        transition: transform 0.5s;
    }

    .fullscreen:hover {
        transform: scale(1.3);
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
    }

    .pull-right .btn {
        background-color: whitesmoke;
    }

    .pull-right .btn:hover {
        background-color: rgb(233, 233, 233);
        color: rgb(0, 0, 255);
    }


    .pull-right i {
        padding-right: 3px;
    }

    .table * {
        text-align: start;
        font-size: 16px;
    }

    .table .config {
        text-align: center;
    }

    .table .config a {
        text-decoration: none;
        text-align: center;
    }

    .table .config a .edit {
        color: rgb(150, 150, 0);
    }

    .table .config a .edit:hover {
        color: rgb(85, 85, 0);
    }

    .table .config a .del {
        color: rgb(214, 0, 0);
    }

    .table .config a .del:hover {
        color: rgb(167, 0, 0);
    }

    .dataTables_filter,
    .dt-buttons {
        display: flex;
        flex-wrap: wrap;
        margin: 0;
    }

    .dataTables_filter {
        flex: 50%;
    }

    .dataTables_filter label {
        font-size: 15px;
    }

    .dt-buttons {
        margin: 0 0 10px 0;
        flex: 50%;
    }

    .dt-buttons span {
        font-weight: bold;
        font-size: 16px;
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
                    <h2 class="brand">DATA SISWA</h2>
                    <div class="pull-right">
                        <a href="add.php" class="btn add"><i class="bi bi-person-fill-add"></i>Tambah Siswa</a>
                        <a href="import.php" class="btn add"><i class="bi bi-database-add"></i>Import Siswa</a>
                    </div>
                </div>
            </div>
            <div class="content row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="siswa">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nomor Induk</th>
                                    <th>Nama Siswa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Ruangan / Kelas</th>
                                    <th>Alamat</th>
                                    <th>Nomor Telepon</th>
                                    <th class="config"><i class="bi bi-gear-wide-connected"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $batas = 10;
                                $hal = @$_GET['hal'];
                                if (empty($hal)) {
                                    $posisi = 0;
                                    $hal = 1;
                                } else {
                                    $posisi = ($hal - 1) * $batas;
                                }
                                $no = 1;
                                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                    $pencarian = trim(mysqli_real_escape_string($con, $_POST['pencarian']));
                                    if ($pencarian != '') {
                                        $sql = "SELECT * FROM tb_siswa WHERE nama_siswa LIKE '%$pencarian%' ORDER BY nama_siswa, ruangan ASC";
                                        $query = $sql;
                                        $queryJml = $sql;
                                    } else {
                                        $query = "SELECT * FROM tb_siswa ORDER BY nama_siswa, ruangan ASC LIMIT $posisi, $batas";
                                        $queryJml = "SELECT * FROM tb_siswa ORDER BY nama_siswa, ruangan ASC";
                                        $no = $posisi + 1;
                                    }
                                } else {
                                    $query = "SELECT * FROM tb_siswa ORDER BY nama_siswa, ruangan ASC LIMIT $posisi, $batas";
                                    $queryJml = "SELECT * FROM tb_siswa ORDER BY nama_siswa, ruangan ASC";
                                    $no = $posisi + 1;
                                }

                                $sql_siswa = mysqli_query($con, $query) or die(mysqli_error($con));
                                if (mysqli_num_rows($sql_siswa) > 0) {
                                    while ($data = mysqli_fetch_array($sql_siswa)) { ?>
                                        <tr>
                                            <td><?= $no++ ?>.</td>
                                            <td><?= $data['nomor_induk'] ?></td>
                                            <td><?= $data['nama_siswa'] ?></td>
                                            <td><?= $data['jenis_kelamin'] ?></td>
                                            <td><?= $data['ruangan'] ?></td>
                                            <td><?= $data['alamat'] ?></td>
                                            <td><?= $data['no_telp'] ?></td>
                                            <td class="config">
                                                <a href="edit.php?id=<?= $data['id_siswa'] ?>" onclick="return confirm('Anda yakin ingin mengedit data ini?')"><i class="edit bi bi-pencil-square"></i></a>
                                                <a href="del.php?id=<?= $data['id_siswa'] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="del bi bi-trash-fill"></i></a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan=\"7\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data tidak ada</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    if (@$_POST['pencarian'] == '') { ?>
                        <div style="float:left;">
                            <?php
                            $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
                            echo "<b>Jumlah Data: $jml</b>";
                            ?>
                        </div>
                        <div style="float:right">
                            <ul class="pagination pagination-sm" style="margin:0">
                                <?php
                                $jml_hal = ceil($jml / $batas);
                                for ($i = 1; $i <= $jml_hal; $i++) {
                                    if ($i != $hal) {
                                        echo "<li><a href=\"?hal=$i\">$i</a></li>";
                                    } else {
                                        echo "<li class=\"active\"><a>$i</a></li>";
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    <?php
                    } else {
                        echo "<div style=\"float:left;\">";
                        $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
                        echo "<b>Data Hasil Pencarian: $jml</b>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

<script src=" <?= base_url('_assets/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('_assets/js/jquery.js') ?>"></script>
<script src="<?= base_url('_assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('_assets/libs/DataTables/datatables.min.js') ?>"></script>

<!-- Data Tables -->
<script>
    $(document).ready(function() {
        $('#siswa').DataTable({
            "paginate": false,
            "info": true,
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'pdf',
                    title: 'DATA SISWA SDN KALIBARU 09',
                    download: 'open',
                    orientation: 'portrait'
                },
                {
                    extend: 'excel',
                    title: 'DATA SISWA SDN KALIBARU 09'
                },
                {
                    extend: 'print',
                    title: 'DATA SISWA SDN KALIBARU 09'
                },
                'copy'
            ]
        });
    });
</script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</html>
<?php include_once('../_footer.php'); ?>