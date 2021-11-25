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
                        <th>Ảnh Slide Show</th>
                        <th>Tên Slide Show</th>
                        <th>Đường Link</th>
                        <th><a href="<?= BASE_URL . 'cp-admin/slide-show/add' ?>" class="btn btn-sm btn-success">Thêm slide</a></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listSlide as $item) : ?>
                        <tr>
                        <td><?= $item['id_slide'] ?></td>
                            <td><img src="<?= PUBLIC_PATH . $item['anh_slide'] ?>" width="250"></td>
                            <td><?= $item['ten_slide'] ?></td>
                            <td><?= $item['link_slide'] ?></td>

                            <td class="td-function">
                                <a href="<?= BASE_URL . 'cp-admin/slide-show/edit?id=' . $item['id_slide'] ?>" class="btn btn-sm btn-info">Sửa</a>
                                <a href="<?= BASE_URL . 'cp-admin/slide-show/delete?id=' . $item['id_slide'] ?>" class="btn btn-sm btn-danger" name="btnDelete">Xóa</a>
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

