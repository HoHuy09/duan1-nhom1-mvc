<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit User</h3>
        </div>
        <!-- /.card-header -->
        <?php
        if (!empty($msg)) {
        ?>
            <p class="msg-err">
                <span class="msg-err-txt"><?php echo implode('', $msg) ?></span>
            </p>
        <?php
        }
        ?>
        <!-- form start -->
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên Đăng Nhập</label>
                    <input type="text" class="form-control" name="acc" placeholder="Enter tên đăng nhập" value="<?php echo $recordUser['account'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="pwd" class="form-control" placeholder="Password" value="<?php echo $recordUser['passwd'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ Tên</label>
                    <input type="email" name="name" class="form-control" placeholder="Enter email" value="<?php echo $recordUser['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" value="<?php echo $recordUser['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh Đại Diện</label>
                    <input type="file" class="form-control" placeholder="Enter ảnh đại diện">
                    <img src="../../img/<?php echo $recordUser['avatar'] ?>" alt="" width="100px" height="100px" style="margin: 20px 0 0 251px; border: 1px solid #bbb;">
                </div>


                <div class="col-sm-6">
                    <!-- radio -->
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="roles" value="1">
                            <label class="form-check-label">Admin</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="0" name="roles">
                            <label class="form-check-label">Khách Hàng</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="2" name="roles">
                            <label class="form-check-label">Seller</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="3" name="roles">
                            <label class="form-check-label">PostMan</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" name="btnAdd" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->