<?php
require_once "./permission.php";
require_once "./connect.php";
$sql = "SELECT id_thanhvien, email, quyen_truy_cap FROM thanhvien";
$query = mysqli_query($conn, $sql);
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active"></li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý danh mục</h1>
    </div>
</div><!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">

            <div class="panel-body" style="position: relative;">
                <a href="#" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;">Thêm danh mục mới</a>
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Tên user</th>
                            <th data-sortable="true">Quyền</th>
                            <th data-sortable="true">Sửa</th>
                            <th data-sortable="true">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        while ($rows = mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                            <td data-checkbox="true"><?php echo $rows["id_thanhvien"]; ?></td>
                            <td data-checkbox="true"><a href="#"><?php echo $rows["email"]; ?></a></td>
                            <td data-checkbox="true"><?php if ($rows["quyen_truy_cap"] == 0) {
                              echo "Manager";
                            }
                            elseif ($rows["quyen_truy_cap"] == 1) {
                              echo "Content Creator";
                            }
                            elseif ($rows["quyen_truy_cap"] == 2) {
                              echo "Moderator";
                            }
                            elseif ($rows["quyen_truy_cap"] == 3) {
                              echo "Advertiser";
                            }
                            elseif ($rows["quyen_truy_cap"] == 4) {
                              echo "Insight Analysist";
                             } ?></td>
                            <td>
                                <a href="#"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></a>
                            </td>

                            <td>
                                <a href="#"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                            </td>
                        </tr>
                      <?php } ?>

                    </tbody>
                </table>
                <ul class="pagination" style="float: right;">
                    <li><a href="#"><<</a></li>
                    <li><a href="#"><</a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">></a></li>
                    <li><a href="#">>></a></li>
                </ul>
            </div>
        </div>
    </div>
</div><!--/.row-->
