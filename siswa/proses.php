<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

// Uuid Composer
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Uuid\Exception\UnsatisfiedDependencyException;
?>



<?php
if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $nomor_induk = trim(mysqli_real_escape_string($con, $_POST['nomor_induk']));
    $nama_siswa = trim(mysqli_real_escape_string($con, $_POST['nama_siswa']));
    $jenis_kelamin = trim(mysqli_real_escape_string($con, $_POST['jenis_kelamin']));
    $ruangan = trim(mysqli_real_escape_string($con, $_POST['ruangan']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $no_telp = trim(mysqli_real_escape_string($con, $_POST['no_telp']));
    $ceknomorinduk = mysqli_query($con, "SELECT * FROM tb_siswa WHERE nomor_induk = '$nomor_induk'") or die(mysqli_error($con));
    if (mysqli_num_rows($ceknomorinduk) > 0) {
        echo "<script>alert('Nomor induk siswa sudah pernah diinput. Silahkan coba lagi'); window.location = 'add.php';</script>";
    } else {
        mysqli_query($con, "INSERT INTO tb_siswa(id_siswa, nomor_induk, nama_siswa, jenis_kelamin, ruangan, alamat, no_telp) VALUES ('$uuid', '$nomor_induk', '$nama_siswa', '$jenis_kelamin', '$ruangan', '$alamat', '$no_telp')") or die(mysqli_error($con));
        echo "<script>window.location = 'data.php';</script>";
    }
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nomor_induk = trim(mysqli_real_escape_string($con, $_POST['nomor_induk']));
    $nama_siswa = trim(mysqli_real_escape_string($con, $_POST['nama_siswa']));
    $jenis_kelamin = trim(mysqli_real_escape_string($con, $_POST['jenis_kelamin']));
    $ruangan = trim(mysqli_real_escape_string($con, $_POST['ruangan']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $no_telp = trim(mysqli_real_escape_string($con, $_POST['no_telp']));
    mysqli_query($con, "UPDATE tb_siswa SET nomor_induk = '$nomor_induk', nama_siswa = '$nama_siswa', jenis_kelamin = '$jenis_kelamin', ruangan = '$ruangan', alamat = '$alamat', no_telp = '$no_telp' WHERE id_siswa = '$id'") or die(mysqli_error($con));
    echo "<script>window.location = 'data.php';</script>";
} else if (isset($_POST['import'])) {
    // $_FILES[argument 1] adjust to the name of the form file on import.php
    $file = $_FILES['file']['name'];
    $ekstensi = explode(".", $file);
    $file_name = "file-" . round(microtime(true)) . "." . end($ekstensi);
    $sumber = $_FILES['file']['tmp_name'];
    $target_dir = "../_file/";
    $target_file = $target_dir . $file_name;
    move_uploaded_file($sumber, $target_file);

    $obj = PHPExcel_IOFactory::load($target_file);
    $all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

    $sql = "INSERT INTO tb_siswa (id_siswa, nomor_induk, nama_siswa, jenis_kelamin, ruangan, alamat, no_telp) VALUES";
    for ($i = 3; $i <= count($all_data); $i++) {
        $uuid = Uuid::uuid4()->toString();
        $nomor_induk = $all_data[$i]['B'];
        $nama_siswa  = $all_data[$i]['C'];
        $jenis_kelamin = $all_data[$i]['D'];
        $ruangan = $all_data[$i]['E'];
        $alamat = $all_data[$i]['F'];
        $no_telp = $all_data[$i]['G'];
        $sql .= "('$uuid', '$nomor_induk', '$nama_siswa', '$jenis_kelamin', '$ruangan', '$alamat', '$no_telp'),";
    }
    $sql = substr($sql, 0, -1);
    mysqli_query($con, $sql) or die(mysqli_error($con));
    unlink($target_file);
    echo "<script>window.location = 'data.php';</script>";
}
?>