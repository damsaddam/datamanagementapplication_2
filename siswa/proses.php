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
}
?>