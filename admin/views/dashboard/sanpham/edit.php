<?php
if (!empty($msg)) {
?>
    <p class="msg-err">
        <span class="msg-err-txt"><?php echo implode('', $msg) ?></span>
    </p>
<?php
}
?>

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Thêm Sản Phẩm</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Danh Mục</label>
                    <select name="danh_muc" id="" class="select-value">
                        <?php
                        foreach ($listCate as $value) {
                        ?>
                            <?php
                            if ($value['id_dm'] == $field['id_dm']) {
                                $selected = "selected";
                            } else {
                                $selected = '';
                            }
                            ?>
                            <option value="<?php echo $value['id_dm'] ?>" <?= $selected ?>><?php echo $value['ten_dm'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tên Sản Phẩm</label>
                    <input type="text" name="name" class="form-control" value="<?= $field['ten_sp'] ?>" placeholder="nhập tên sản phẩm">
                </div>
                <div class="form-group">
                    <label for="">Ảnh sản phẩm :</label>
                    <input type="file" name="file" placeholder="ảnh sản phẩm" class="form-control">
                    <img src="<?= PUBLIC_PATH . $field['anh_sp'] ?>" width="100">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Giá Sản Phẩm</label>
                    <input type="text" name="price" class="form-control" value="<?= $field['gia_sp'] ?>" placeholder="nhập giá sản phẩm">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Thương Hiệu</label>
                    <select name="brand" id="" class="select-value">
                        <?php
                        foreach ($listBrand as $value) {
                        ?>
                            <?php
                            if ($value['id_th'] == $field['id_th']) {
                                $selected = "selected";
                            } else {
                                $selected = '';
                            }
                            ?>
                            <option value="<?php echo $value['id_th'] ?>" <?= $selected ?>><?php echo $value['ten_th'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Giảm Giá</label>
                    <input type="number" name="sale" class="form-control" value="<?= $field['giam_gia'] ?>" placeholder="nhập giảm giá ">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Bảo Hành</label>
                    <input type="text" name="date" class="form-control" value="<?= $field['bao_hanh'] ?>" placeholder="nhập bảo hành">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Trạng Thái</label>
                    <input type="number" name="status" class="form-control" value="<?= $field['trang_thai'] ?>" placeholder="nhập trạng thái">
                </div>
                <div class="form-group">
                    <label>Mô Tả</label>
                    <textarea class="form-control" name="desc" rows="3" placeholder="Mô tả sản phẩm"> <?= $field['mo_ta'] ?></textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" name="btnSend" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->