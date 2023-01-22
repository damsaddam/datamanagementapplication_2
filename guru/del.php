<?php require_once "../_config/config.php"; ?>

<?php
mysqli_query($con, "DELETE FROM tb_guru WHERE id_guru = '$_GET[id]'") or die(mysqli_error($con));
echo "<script>window.location='data.php';</script>";
?>
