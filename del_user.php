<?php
require_once "./permission.php";
require_once "connect.php";
$id_user = $_GET["id_user"];
if (isset($id_user)) {
  $sql = "DELETE FROM thanhvien WHERE id_thanhvien = \"$id_user\"";
  $query = mysqli_query($conn, $sql);
  header("location: quantri.php?page_layout=danhsachuser");
}
?>
