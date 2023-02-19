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

    .pull-right .refresh {
        margin-right: 7px;
    }

    .pull-right i {
        padding-right: 3px;
    }

    .table * {
        text-align: start;
        font-size: 16px;
    }

    .table .cbx {
        text-align: center;
    }

    .content .config {
        text-align: center;
    }

    .content .config a i {
        padding-right: 3px;
    }

    .content .config a {
        text-decoration: none;
        text-align: center;
    }

    .content .config .del {
        color: rgb(214, 0, 0);
    }

    .content .config .edit {
        margin-right: 7px;
        color: rgb(150, 150, 0);
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
                    <h2 class="brand">DATA RUANGAN / KELAS</h2>
                    <div class="pull-right">
                        <a href="generate.php" class="btn add"><i class="bi bi-house-add-fill"></i>Tambah Ruangan</a>
                    </div>
                </div>
            </div>
            <div class="content row">
                <div class="col-lg-12">
                    <form method="post" name="proses">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="ruangan">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Ruangan / Kelas</th>
                                        <th>Lantai</th>
                                        <th class="cbx">
                                            <input type="checkbox" id="select_all" value="">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql_ruangan = mysqli_query($con, "SELECT * FROM tb_ruangan ORDER BY nama_ruangan ASC") or die(mysqli_error($con));
                                    if (mysqli_num_rows($sql_ruangan) > 0) {
                                        while ($data = mysqli_fetch_array($sql_ruangan)) { ?>
                                            <tr>
                                                <td><?= $no++ ?>.</td>
                                                <td><?= $data['nama_ruangan'] ?></td>
                                                <td><?= $data['lantai'] ?></td>
                                                <td class="cbx">
                                                    <input type="checkbox" name="checked[]" class="check" value="<?= $data['id_ruangan'] ?>">
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan=\"3\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data tidak ada</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>

                    <div class="config pull-right">
                        <a class="btn edit" onclick="edit()"><i class="edit bi bi-pencil-square"></i>Edit</a>
                        <a class="btn del" onclick="hapus()"><i class="del bi bi-trash-fill"></i>Hapus</a>
                    </div>
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
        $('#ruangan').DataTable({
            "paginate": false,
            "info": true,
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'pdf',
                    title: 'DATA RUANGAN SDN KALIBARU 09',
                    download: 'open',
                    orientation: 'portrait'
                },
                {
                    extend: 'excel',
                    title: 'DATA RUANGAN SDN KALIBARU 09'
                },
                {
                    extend: 'print',
                    title: 'DATA RUANGAN SDN KALIBARU 09'
                },
                'copy'
            ]
        });
    });
</script>

<!-- Edit & Del Button-->
<script>
    function edit() {
        document.proses.action = 'edit.php';
        document.proses.submit();
    }

    function hapus() {
        let conf = confirm('Anda yakin ingin menghapus data ini?');
        if (conf) {
            document.proses.action = 'del.php';
            document.proses.submit();
        }
    }
</script>


<!-- Checkbox -->
<script>
    $(document).ready(function() {
        $('#select_all').on('click', function() {
            if (this.checked) {
                $('.check').each(function() {
                    this.checked = true;
                })
            } else {
                $('.check').each(function() {
                    this.checked = false;
                })
            }
        });

        $('.check').on('click', function() {
            if ($('.check:checked').length == $('.check').length) {
                $('#select_all').prop('checked', true);
            } else {
                $('#select_all').prop('checked', false);
            }
        });
    });
</script>

<!-- Fullscreen Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</html>
<?php include_once('../_footer.php'); ?>