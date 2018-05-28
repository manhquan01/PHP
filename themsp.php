<?php
require_once "./connect.php";
$sql_category = "SELECT id_dm,ten_dm FROM dmsanpham";
$query_category = mysqli_query($conn, $sql_category);
if (isset($_POST["submit"])) {
  $ten_sp = $_POST["ten_sp"];
  $gia_sp = $_POST["gia_sp"];
  $bao_hanh = $_POST["bao_hanh"];
  $phu_kien = $_POST["phu_kien"];
  $tinh_trang = $_POST["tinh_trang"];
  $khuyen_mai = $_POST["khuyen_mai"];
  $trang_thai = $_POST["trang_thai"];
  $chi_tiet_sp = $_POST["chi_tiet_sp"];
  $dac_biet = $_POST["dac_biet"];

  if ($_FILES["anh_sp"]["name"] == "") {
    $error_anh_sp = "<span style=\"color: red;\">(*)Chưa thêm ảnh sản phẩm</span>";
  }
  else{
    $anh_sp = $_FILES["anh_sp"]["name"];
    $tmp_name = $_FILES["anh_sp"]["tmp_name"];
  }

  if ($_POST["id_dm"] == "unselect") {
    $error_id_dm = "<span style=\"color: red;\">(*)Chưa chọn danh mục</span>";
  }
  else{
    $id_dm = $_POST["id_dm"];
  }

  if (!(isset($error_id_dm) || isset($error_anh_sp))) {
    move_uploaded_file($tmp_name, "anh/".$anh_sp);
    $sql = "INSERT INTO sanpham (id_dm, ten_sp, anh_sp, gia_sp, bao_hanh, phu_kien, tinh_trang, khuyen_mai, trang_thai, dac_biet, chi_tiet_sp)
          VALUES (\"$id_dm\", \"$ten_sp\", \"$anh_sp\", \"$gia_sp\", \"$bao_hanh\", \"$phu_kien\", \"$tinh_trang\", \"$khuyen_mai\", \"$trang_thai\", \"$dac_biet\", \"$chi_tiet_sp\")";
    $query = mysqli_query($conn, $sql);

    header("location: quantri.php?page_layout=danhsachsp");
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
    <h1 class="page-header">Thêm sản phẩm mới</h1>
  </div>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Thêm sản phẩm mới</div>
      <div class="panel-body">

        <form method="post" enctype="multipart/form-data" role="form">
          <div class="col-md-6">
            <div class="form-group">
              <label>Tên sản phẩm</label>
              <input type="text" class="form-control"  name="ten_sp" required="" value="<?php if(isset($_POST["ten_sp"])){echo $_POST["ten_sp"];} ?>">
            </div>
            <div class="form-group">
              <label>Giá sản phẩm</label>
              <input type="text" class="form-control" name="gia_sp" required="" value="<?php if(isset($_POST["gia_sp"])){echo $_POST["gia_sp"];} ?>">
            </div>

            <div class="form-group">
              <label>Bảo hành</label>
              <input type="text" class="form-control" name="bao_hanh" value="<?php if(isset($_POST["bao_hanh"])){echo $_POST["bao_hanh"];} ?>" required="">
            </div>

            <div class="form-group">
              <label>Đi kèm</label>
              <input type="text" class="form-control" name="phu_kien" value="<?php if(isset($_POST["phu_kien"])){echo $_POST["phu_kien"];} ?>" required="">
            </div>
            <div class="form-group">
              <label>Tình trạng</label>
              <input type="text" class="form-control" name="tinh_trang" value="<?php if(isset($_POST["tinh_trang"])){echo $_POST["tinh_trang"];} ?>" required="">
            </div>

            <div class="form-group">
              <label>Ảnh mô tả</label>
              <input type="file" name="anh_sp"><?php if(isset($error_anh_sp)){echo $error_anh_sp;} ?>

            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Khuyến mãi</label>
              <input type="text" class="form-control" name="khuyen_mai" value="<?php if(isset($_POST["khuyen_mai"])){echo $_POST["khuyen_mai"];} ?>" required="">
            </div>
            <div class="form-group">
              <label>Còn hàng</label>
              <input type="text" class="form-control" name="trang_thai" value="<?php if(isset($_POST["trang_thai"])){echo $_POST["trang_thai"];} ?>" required="">
            </div>
            <div class="form-group">
              <label>Sản phẩm đặc biệt</label>
              <div class="radio">
                <label>
                  <input type="radio" name="dac_biet" id="optionsRadios1" value=1>Có
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="dac_biet" id="optionsRadios2" value=0 checked>Không
                </label>
              </div>

            </div>

            <div class="form-group">
              <label>Nhà cung cấp</label>
              <select name="id_dm" class="form-control">
                <option value="unselect" selected>Lựa chọn nhà cung cấp</option>
                <?php
                  while ($rows_category = mysqli_fetch_array($query_category)) {
                ?>
                <option value="<?php echo $rows_category["id_dm"]; ?>"><?php echo $rows_category["ten_dm"]; ?></option>
                <?php } ?>
              </select>
              <?php if(isset($error_id_dm)){echo $error_id_dm;} ?>
            </div>
            <div class="form-group">
              <label>Thông tin chi tiết sản phẩm</label>
              <textarea class="form-control" rows="3" name="chi_tiet_sp"><?php if(isset($_POST["chi_tiet_sp"])){echo $_POST["chi_tiet_sp"];} ?></textarea>
            </div>

          </div>

          <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
          <button type="reset" class="btn btn-default" name="reset">Làm mới</button>

        </form>
      </div>
    </div>
  </div><!-- /.col-->
</div><!-- /.row -->
