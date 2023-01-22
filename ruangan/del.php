<?php require_once "../_config/config.php"; ?>

<?php
$checked = $_POST['checked'];
if (!isset($checked)) {
    echo "<script>alert('Tidak ada data ruangan / kelas yang dipilih. Silahkan coba lagi'); window.location='data.php';</script>";
} else {
    foreach ($checked as $id) {
        $sql = mysqli_query($con, "DELETE FROM tb_ruangan WHERE id_ruangan = '$id'") or die(mysqli_error($con));
    }
    if ($sql) {
        echo "<script>alert('" . count($checked) . " Data ruangan berhasil dihapus'); window.location = 'data.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data. Silahkan coba lagi');</script>";
    }
}
?>