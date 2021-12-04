<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh Mục</h3>
            <br>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th style="width: 10px">STT</th>
                        <th>Tiêu đề</th>
                        <th>Tác giả</th>
                        <th>Ảnh</th>
                        <th>Ngày đăng tin</th>
                        <th>ND ngắn</th>
                        <th>ND dài</th>
                        <th><a href="<?= BASE_URL . 'cp-admin/blog/add' ?>" class="btn btn-sm btn-success">Thêm Tin</a></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listSlide as $item) : ?>
                        <tr>
                        <td><?= $item['ma_tin_tuc'] ?></td>
                        <td><?= $item['tieu_de'] ?></td>
                        <td><?= $item['id_user'] ?></td>
                            <td><img src="<?= PUBLIC_PATH .'img/'. $item['anh'] ?>" width="250"></td>
                            <td><?= $item['ngay_dang_tin'] ?></td>
                            <td><?= $item['nd_ngan'] ?></td>
                            <td><?= $item['nd_dai'] ?></td>

                            <td class="td-function">
                                <a href="<?= BASE_URL . 'cp-admin/blog/edit?id=' . $item['ma_tin_tuc'] ?>" class="btn btn-sm btn-info">Sửa</a>
                                <a href="<?= BASE_URL . 'cp-admin/blog/delete?id=' . $item['ma_tin_tuc'] ?>" class="btn btn-sm btn-danger" name="btnDelete">Xóa</a>
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

