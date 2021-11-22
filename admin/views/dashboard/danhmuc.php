<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sản Phẩm</h3>
            <br>
            <a href="#" class="content__box-add">Thêm sản phẩm</a>
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