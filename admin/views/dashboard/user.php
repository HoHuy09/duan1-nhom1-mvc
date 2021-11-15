<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User</h3>
            <br>
            <a href="#" class="content__box-add">Thêm User</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">STT</th>
                        <th>Tài Khoản </th>
                        <th>Họ Tên</th>
                        <th>Email</th>
                        <th>Ảnh Đại Diện</th>
                        <th>Phân Quyền</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listUser as $item) : ?>
                        <tr>
                            <td><?= $item['id_user'] ?></td>
                            <td><?= $item['account'] ?></td>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['email'] ?>%</td>
                            <td><img src="<?= PUBLIC_PATH . $item['avatar'] ?>" width="50"></td>
                            <td class="td-name">
                                <?php if ($user['roles'] == 1) {
                                    echo "Admin";
                                } elseif ($user['roles'] == 0) {
                                    echo "Khách hàng";
                                } elseif ($user['roles'] == 2) {
                                    echo "Seller";
                                } ?>
                            </td>

                            <td class="td-function">
                                <a href="#" class="link-function btn-repair">Sửa</a>
                                <a href="#" class="link-function btn-delete" name="btnDelete">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
        </div>
    </div>
</div>