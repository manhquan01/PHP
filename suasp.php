<div class="row">
  <ol class="breadcrumb">
    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
    <li class="active"></li>
  </ol>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Sửa thông tin sản phẩm</h1>
  </div>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Sửa thông tin sản phẩm</div>
      <div class="panel-body">

        <form method="post" enctype="multipart/form-data" role="form">
          <div class="col-md-6">
            <div class="form-group">
              <label>Tên sản phẩm</label>
              <input type="text" class="form-control"  name="ten_sp" value="iPhone 5s Gold Chính hãng" required="">
            </div>
            <div class="form-group">
              <label>Giá sản phẩm</label>
              <input type="text" class="form-control" name="gia_sp" value="15.000.000" required="">
            </div>

            <div class="form-group">
              <label>Bảo hành</label>
              <input type="text" class="form-control" name="bao_hanh" value="12 Tháng" required="">
            </div>

            <div class="form-group">
              <label>Đi kèm</label>
              <input type="text" class="form-control" name="phu_kien" value="Hộp, sách, sạc, cáp, tai nghe" required="">
            </div>
            <div class="form-group">
              <label>Tình trạng</label>
              <input type="text" class="form-control" name="tinh_trang" value="Máy Mới 100%" required="">
            </div>

            <div class="form-group">
              <label>Ảnh mô tả</label>
              <input type="file" name="anh_sp">  
            </div>

          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Khuyến mãi</label>
              <input type="text" class="form-control" name="khuyen_mai" value="Dán Màn hình 3 lớp" required="">
            </div>
            <div class="form-group">
              <label>Còn hàng</label>
              <input type="text" class="form-control" name="trang_thai" value="Còn hàng" required="">
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
                  <input type="radio" name="dac_biet" id="optionsRadios2" value=0>Không
                </label>
              </div>
            </div>

            <div class="form-group">
              <label>Nhà cung cấp</label>
              <select name="id_dm" class="form-control">
                <option value="1">iPhone</option>
              </select>
            </div>

            <div class="form-group">
              <label>Thông tin chi tiết sản phẩm</label>
              <textarea class="form-control" rows="3" name="chi_tiet_sp"></textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Cập nhật</button>
          <button type="reset" class="btn btn-default" name="reset">Làm mới</button>
        </form>
      </div>
    </div>
  </div><!-- /.col-->
</div><!-- /.row -->
