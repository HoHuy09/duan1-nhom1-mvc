<div class="col-md-11">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Thêm User</h3>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tài khoản</label>
                    <input type="text" name="name" value="<?=$user['account']?>" class="form-control" placeholder="Enter Tài khoản">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ tên</label>
                    <input type="text" name="hoten" value="<?=$user['name']?>" class="form-control" placeholder="Enter Họ Tên">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" value="<?=$user['email']?>" class="form-control" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" value="<?=$user['passwd']?>" class="form-control" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Quyền</label>
                    
                    <select
                     name="role" id="" >
                        <option <?php if ($user['roles']==1) {
                                $selected = "selected";
                            } else {
                                $selected = '';
                            } ?> <?= $selected ?> value="1">Admin</option>
                        <option <?php if ($user['roles']==2) {
                                $selected = "selected";
                            } else {
                                $selected = '';
                            } ?> <?= $selected ?> value="2">Seller</option>
                        <option <?php if ($user['roles']==0) {
                                $selected = "selected";
                            } else {
                                $selected = '';
                            } ?> <?= $selected ?> value="0">Khách hàng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Avatar</label>
                    <input type="file" name="file">
                    <img src="<?= PUBLIC_PATH . $user['avatar'] ?>" width="100">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="addCategory">Submit</button>
            </div>
        </form>
    </div>
</div>