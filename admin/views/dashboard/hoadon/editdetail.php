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
            <h3 class="card-title">Sửa Số lượng Sản Phẩm</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" enctype="multipart/form-data" >
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Số lượng</label>
                    <input type="number" name="quantity" value="<?=$list['quantity']?>" class="form-control" placeholder="nhập tên khách hàng">
                </div>
                <div class="card-footer">
                    <button type="submit" name="addCategory" class="btn btn-primary">Submit</button>
                </div>

            </div>
            <!-- /.card-body -->


        </form>
    </div>
    <!-- /.card -->