<?php
require_once "./connect.php";
$id_dm = $_GET['id_dm'];
if (isset($id_dm)) {
  $sql = "DELETE FROM dmsanpham WHERE id_dm = \"$id_dm\" ";
  $query = mysqli_query($conn, $sql);
  header("location: quantri.php?page_layout=danhsachdm");
}
?>
