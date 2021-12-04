<div class="col-md-11">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Thêm User</h3>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tài khoản</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Tài khoản">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ tên</label>
                    <input type="text" name="hoten" class="form-control" placeholder="Enter Họ Tên">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Quyền</label>
                    <select name="role" id="">
                        <option value="1">Admin</option>
                        <option value="2">Seller</option>
                        <option value="0">Khách hàng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Avatar</label>
                    <input type="file" name="file">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="addCategory">Submit</button>
            </div>
        </form>
    </div>
</div>