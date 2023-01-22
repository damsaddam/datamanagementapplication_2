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
    $nomorinduk_guru = trim(mysqli_real_escape_string($con, $_POST['nomorinduk_guru']));
    $nama_guru = trim(mysqli_real_escape_string($con, $_POST['nama_guru']));
    $jenis_kelamin = trim(mysqli_real_escape_string($con, $_POST['jenis_kelamin']));
    $wali_kelas = trim(mysqli_real_escape_string($con, $_POST['wali_kelas']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $no_telp = trim(mysqli_real_escape_string($con, $_POST['no_telp']));
    $ceknomorinduk = mysqli_query($con, "SELECT * FROM tb_guru WHERE nomorinduk_guru = '$nomorinduk_guru'") or die(mysqli_error($con));
    if (mysqli_num_rows($ceknomorinduk) > 0) {
        echo "<script>alert('Nomor induk guru sudah pernah diinput. Silahkan coba lagi'); window.location = 'add.php';</script>";
    } else {
        mysqli_query($con, "INSERT INTO tb_guru(id_guru, nomorinduk_guru, nama_guru, jenis_kelamin, wali_kelas, alamat, no_telp) VALUES ('$uuid', '$nomorinduk_guru', '$nama_guru', '$jenis_kelamin', '$wali_kelas', '$alamat', '$no_telp')") or die(mysqli_error($con));
        echo "<script>window.location = 'data.php';</script>";
    }
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nomorinduk_guru = trim(mysqli_real_escape_string($con, $_POST['nomorinduk_guru']));
    $nama_guru = trim(mysqli_real_escape_string($con, $_POST['nama_guru']));
    $jenis_kelamin = trim(mysqli_real_escape_string($con, $_POST['jenis_kelamin']));
    $wali_kelas = trim(mysqli_real_escape_string($con, $_POST['wali_kelas']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $no_telp = trim(mysqli_real_escape_string($con, $_POST['no_telp']));
    mysqli_query($con, "UPDATE tb_guru SET nomorinduk_guru = '$nomorinduk_guru', nama_guru = '$nama_guru', jenis_kelamin = '$jenis_kelamin', wali_kelas = '$wali_kelas', alamat = '$alamat', no_telp = '$no_telp' WHERE id_guru = '$id'") or die(mysqli_error($con));
    echo "<script>window.location = 'data.php';</script>";
}
?>