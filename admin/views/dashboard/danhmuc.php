<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sản Phẩm</h3>
            <br>
            <button type="button" class="btn btn-primary">Thêm Danh Mục</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">STT</th>
                        <th>Tên Danh Mục</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $item) : ?>
                        <tr>
                            <td><?= $item['id_dm'] ?></td>
                            <td><?= $item['ten_dm'] ?></td>

                            <td class="td-function">
                                <button type="button" class="btn btn-warning">Sửa</button>
                                <button type="button" class="btn btn-danger">Xóa</button>
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