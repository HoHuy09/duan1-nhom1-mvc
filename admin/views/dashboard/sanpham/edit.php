<?php
if (!empty($msg)) {
?>
    <p class="msg-err">
        <span class="msg-err-txt"><?php echo implode('', $msg) ?></span>
    </p>
<?php
}
?>
<form enctype="multipart/form-data" method="POST">
    <h3>Sửa sản phẩm</h3>
    <div class="mb-3">
        <label class="form-label">Danh mục</label>
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
    <div class="content__box-product-add-field">
        <label for="">Tên sản phẩm :</label>
        <textarea name="name" id="" cols="130" rows="2" class="name-box"><?= $field['ten_sp'] ?></textarea>
    </div>
    <div class="content__box-product-add-field">
        <label for="">Ảnh sản phẩm :</label>
        <input type="file" name="file" placeholder="ảnh sp" class="input-file">
    </div>
    <div class="content__box-product-add-field">
        <label for="">Giá sản phẩm :</label>
        <input type="text" name="price" value="<?= $field['gia_sp'] ?>" placeholder="giá sp" class="input-txt">
    </div>
    <div class="content__box-product-add-field">
        <label for="">Thương hiệu :</label>
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
    <div class="content__box-product-add-field">
        <label for="">Sale :</label>
        <input type="number" name="sale" value="<?= $field['giam_gia'] ?>" placeholder="giảm giá" class="input-txt">
    </div>
    <div class="content__box-product-add-field">
        <label for="">Bảo hành :</label>
        <input type="text" name="date" value="<?= $field['bao_hanh'] ?>" placeholder="bảo hành" class="input-txt">
    </div>
    <div class="content__box-product-add-field">
        <label for="">Trạng thái :</label>
        <input type="number" name="status" value="<?= $field['trang_thai'] ?>" placeholder="trạng thái" class="input-txt">
    </div>
    <div class="content__box-product-add-field editer">
        <label for="" class="label-editer">Mô tả :</label>
        <textarea name="desc" id="" cols="130" rows="2" placeholder="mô tả" class="txt-box"><?= $field['mo_ta'] ?></textarea>
        <script>
            CKEDITOR.replace('desc');
        </script>
    </div>
    <button type="submit" name="btnSend" class="btn btn-primary">Submit</button>
</form>