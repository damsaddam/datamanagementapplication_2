<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

// Uuid Composer
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Uuid\Exception\UnsatisfiedDependencyException;
?>



<?php
if (isset($_POST['add'])) {
    $total = $_POST['total'];
    for ($i = 1; $i <= $total; $i++) {
        $uuid = Uuid::uuid4()->toString();
        $nama = trim(mysqli_real_escape_string($con, $_POST['nama-' . $i]));
        $lantai = trim(mysqli_real_escape_string($con, $_POST['lantai-' . $i]));
        $cekruangan = mysqli_query($con, "SELECT * FROM tb_ruangan WHERE nama_ruangan = '$nama'") or die(mysqli_error($con));
        if (mysqli_num_rows($cekruangan) > 0) {
            echo "<script>alert('Ruangan / kelas sudah pernah diinput. Silahkan coba lagi'); window.location = 'generate.php';</script>";
        } else {
            $sql = mysqli_query($con, "INSERT INTO tb_ruangan(id_ruangan, nama_ruangan, lantai) VALUES ('$uuid', '$nama', '$lantai')") or die(mysqli_error($con));
        }
    }
    if ($sql) {
        echo "<script>alert('" . $total . " Data ruangan berhasil ditambahkan'); window.location = 'data.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data. Silahkan coba lagi'); window.location = 'generate.php';</script>";
    }
} else if (isset($_POST['edit'])) {
    for ($i = 0; $i < count($_POST['id']); $i++) {
        $id = $_POST['id'][$i];
        $nama = $_POST['nama'][$i];
        $lantai = $_POST['lantai'][$i];
        $sql = mysqli_query($con, "UPDATE tb_ruangan SET nama_ruangan = '$nama', lantai = '$lantai' WHERE id_ruangan = '$id'") or die(mysqli_error($con));
    }
    echo "<script>alert('Data berhasil diperbarui'); window.location = 'data.php';</script>";
}
?>