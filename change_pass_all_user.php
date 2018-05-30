<?php
require_once "permission.php";
require_once "connect.php";
$id_user = $_GET["id_user"];
if (isset($id_user)) {
  if (isset($_POST["submit"])) {
    // $post_pass = $_POST["old_pass"];
    // $sql = "SELECT mat_khau  FROM thanhvien
    // WHERE id_thanhvien = \"$id_user\"
    // AND mat_khau = \"$post_pass\"";
    // $query = mysqli_query($conn, $sql);
    // $rows = mysqli_num_rows($query);
    // if ($rows > 0) {
      // $row = mysqli_fetch_array($query);
      // $old_pass = $_POST["old_pass"];
      // if (password_verify($old_pass, $row["mat_khau"])) {
        if ($_POST["new_pass"] === $_POST["conf_pass"]
            && $_POST["new_pass"] != "") {
          $option = ["cost" => 12];
          $new_pass = password_hash($_POST["conf_pass"],
            PASSWORD_BCRYPT, $option);
          $sql_update_pass = "UPDATE thanhvien
                              SET mat_khau = \"$new_pass\"
                              WHERE id_thanhvien = \"$id_user\"";
          $query_update_pass = mysqli_query($conn, $sql_update_pass);
          header("location: quantri.php?page_layout=danhsachuser");
        }else{
          echo "<center class=\"alert alert-danger\">Mật khẩu không khớp!</center>";
        }
      // }else{
      //   echo "<center class=\"alert alert-danger\">Sai mật khẩu! </center>";
      // }
    // }else{
    //   echo "<center class=\"alert alert-danger\">Sai mật khẩu..! </center>";
    // }
  }
}
?>
<div class="row">
  <ol class="breadcrumb">
    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
    <li class="active"></li>
  </ol>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Đổi mật khẩu</h1>
  </div>
</div><!--/.row-->


<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Sửa mật khẩu</div>
        <div class="panel-body">
          <div class="col-md-12">
            <form role="form" method="post">
              <div class="form-group">
                <label>Mật khẩu mới</label>
                <span class="label label-warning">Enter a password longer than 8 characters</span>
                <span class="label label-success">success</span>
                <input id="pass" class="form-control" type="password" name="new_pass"
                        value="" required="">
              </div>

              <div class="form-group">
                <label>Nhập lại mật khẩu</label>
                <span class="label label-warning">Please confirm your password</span>
                <span class="label label-success">success</span>
                <input id="confPass" class="form-control" type="password" name="conf_pass"
                        value="" required="">
              </div>

              <button id="submit" type="submit" class="btn btn-primary" name="submit">Sửa</button>
              <button type="reset" class="btn btn-default">Làm mới</button>
            </form>
          </div>
        </div>
    </div>
  </div><!-- /.col-->
</div><!-- /.row -->
<script type="text/javascript" src="js/confirm_password.js"></script>
