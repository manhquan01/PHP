<?php
require_once "permission.php";
require_once "connect.php";
if (isset($_POST["submit"])) {
  $email = $_POST["email"];

  $option = ["cost" => 12];
  if ($_POST["pass"] === $_POST["re_pass"]) {
    $pass = password_hash($_POST["re_pass"], PASSWORD_BCRYPT, $option);
  }
  $permission = $_POST["permission"];

  if (isset($email) && isset($pass) && isset($permission)) {
    $sql_email = "SELECT email FROM thanhvien WHERE email = \"$email\"";
    $result_email = mysqli_num_rows(mysqli_query($conn, $sql_email));
    if ($result_email > 0) {
      echo "<center class=\"alert alert-danger\"> Email đã tồn tại!</center>";
    }else{
      $sql = "INSERT INTO thanhvien (email, mat_khau, quyen_truy_cap)
      VALUES (\"$email\", \"$pass\", \"$permission\")";
      $query = mysqli_query($conn, $sql);
      header("location: quantri.php?page_layout=danhsachuser");
    }
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
    <h1 class="page-header">Thêm mới thành viên</h1>
  </div>
</div><!--/.row-->


<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Thêm mới thành viên</div>
      <div class="panel-body">
        <div class="col-md-12">
          <form role="form" method="post">

            <div class="form-group">
              <label>Email</label>
              <span class="label label-warning">Account already exists</span>
              <span class="label label-success">success</span>
              <input id="email" class="form-control" type="email" required="" name="email">
            </div>

            <div class="form-group">
              <label>Mật khẩu</label>
              <span class="label label-warning">Enter a password longer than 8 characters</span>
              <span class="label label-success">success</span>
              <input id="pass" class="form-control" type="password" name="pass" required="" value="">
            </div>

            <div class="form-group">
              <label>Nhập lại mật khẩu</label>
              <span class="label label-warning">Please confirm your password</span>
              <span class="label label-success">success</span>
              <input id="confPass" class="form-control" type="password" name="re_pass" required="" value="">
            </div>

            <div class="form-group">
              <label>Chọn quyền thành viên</label>
              <select name="permission" class="form-control">
                <option value="0">Manager</option>
                <option value="1" selected="">Content Creator</option>
                <option value="2">Moderator</option>
                <option value="3">Advertiser</option>
                <option value="4">Insight Analysist</option>
              </select>
            </div>
            <button id="submit" type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
            <button type="reset" class="btn btn-default">Làm mới</button>
          </form>
        </div>

      </div>
    </div>
  </div><!-- /.col-->
</div><!-- /.row -->

<script type="text/javascript" src="js/confirm_password.js"></script>
