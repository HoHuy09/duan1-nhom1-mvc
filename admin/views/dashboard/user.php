<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User</h3>
            <br>
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
                        <th><a href="<?= BASE_URL . 'cp-admin/user/add' ?>" class="btn btn-sm btn-success">Thêm User</a></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listUser as $user) : ?>
                        <tr>
                            <td><?= $user['id_user'] ?></td>
                            <td><?= $user['account'] ?></td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><img src="<?= PUBLIC_PATH . 'img/' . $user['avatar'] ?>" width="50"></td>
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
                                <a href="<?= BASE_URL . 'cp-admin/user/edit?id=' . $user['id_user'] ?>" class="btn btn-sm btn-info">Sửa</a>
                                <a onclick="return del('<?php echo $user['account']; ?>')" href="<?php echo $delete ?>" class="btn btn-sm btn-danger" name="btnDelete">Xóa</a>
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