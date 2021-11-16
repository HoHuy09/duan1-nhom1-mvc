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
    <h3>Thêm Sản phẩm</h3>
    <div class="mb-3">
        <label class="form-label">Danh mục</label>
        <select name="danh_muc" id="" class="select-value">
            <?php
            foreach ($listCate as $value) {
            ?>
                <option value="<?php echo $value['id_dm'] ?>"><?php echo $value['ten_dm'] ?></option>
            <?php
            }
            ?>

        </select>
    </div>
    <div class="content__box-product-add-field">
        <label for="">Tên sản phẩm :</label>
        <textarea name="name" id="" cols="130" rows="2" class="name-box"></textarea>
    </div>
    <div class="content__box-product-add-field">
        <label for="">Ảnh sản phẩm :</label>
        <input type="file" name="file" placeholder="ảnh sp" class="input-file">
    </div>
    <div class="content__box-product-add-field">
        <label for="">Giá sản phẩm :</label>
        <input type="text" name="price" placeholder="giá sp" class="input-txt">
    </div>
    <div class="content__box-product-add-field">
        <label for="">Thương hiệu :</label>
        <select name="brand" id="" class="select-value">
            <?php
            foreach ($listBrand as $value) {
            ?>
                <option value="<?php echo $value['id_th'] ?>"><?php echo $value['ten_th'] ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="content__box-product-add-field">
        <label for="">Sale :</label>
        <input type="number" name="sale" placeholder="giảm giá" class="input-txt">
    </div>
    <div class="content__box-product-add-field">
        <label for="">Bảo hành :</label>
        <input type="text" name="date" placeholder="bảo hành" class="input-txt">
    </div>
    <div class="content__box-product-add-field">
        <label for="">Trạng thái :</label>
        <input type="number" name="status" placeholder="trạng thái" class="input-txt">
    </div>
    <div class="content__box-product-add-field editer">
        <label for="" class="label-editer">Mô tả :</label>
        <textarea name="desc" id="" cols="130" rows="2" placeholder="mô tả" class="txt-box"></textarea>
        <script>
            CKEDITOR.replace('desc');
        </script>
    </div>
    <button type="submit" name="btnSend" class="btn btn-primary">Submit</button>
</form>