<?php
require_once "./permission.php";
require_once "connect.php";
$id_sp = $_GET["id_sp"];
if (isset($id_sp)) {
  $sql = "DELETE FROM sanpham WHERE id_sp = \"$id_sp\"";
  $query = mysqli_query($conn, $sql);
  header("location: quantri.php?page_layout=danhsachsp");
}
?>
