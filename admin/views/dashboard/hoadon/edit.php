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
            <h3 class="card-title">Sửa Hóa Đơn</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" enctype="multipart/form-data" >
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Khách hàng</label>
                    <input type="text" name="name" value="<?=$list['customer_name']?>" class="form-control" placeholder="nhập tên khách hàng">
                </div>
                <div class="form-group">
                    <label for="">số PHone</label>
                    <input type="text" name="phone" value="<?=$list['customer_phone_number']?>" placeholder="số điện thoại" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Địa chỉ</label>
                    <input type="text" name="address" value="<?=$list['customer_address']?>" class="form-control" placeholder="nhập  Địa chỉ">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="email" value="<?=$list['customer_email']?>" class="form-control" placeholder="nhập Email">
                        
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Note</label>
                    <textarea name="note" id="" cols="100" rows="5"><?=$list['note']?></textarea>
                        
                </div>
               

                <div class="form-group">
                    <label for="exampleInputPassword1">Bill</label>
                    <input type="hidden" value="<?=$list['total_price']?>" name="bill" class="form-control" placeholder="Tổng tiền">
                </div>
                <div class="form-group">
                    <label>Status</label>
                   <select name="status" id="">
                       <option <?php
                            if ($list['status']==1) {
                                $selected = "selected";
                            } else {
                                $selected = '';
                            }
                            ?>}
                            
                           <?= $selected?>  value="1">Đang Ship</option>
                       <option  <?php
                            if ($list['status']==2) {
                                $selected = "selected";
                            } else {
                                $selected = '';
                            }
                            ?>}
                            
                           <?= $selected?> value="2">Đã thanh toán</option>
                       <option <?php
                            if ($list['status']==0) {
                                $selected = "selected";
                            } else {
                                $selected = '';
                            }
                            ?>}
                            
                           <?= $selected?> value="0">Đang xử lý</option>
                   </select>
                </div>
                <div class="card-footer">
                    <button type="submit" name="addCategory" class="btn btn-primary">Submit</button>
                </div>

            </div>
            <!-- /.card-body -->


        </form>
    </div>
    <!-- /.card -->