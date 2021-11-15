<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thương Hiểu</h3>
            <br>
            <a href="#" class="content__box-add">Thêm Thương Hiểu</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">STT</th>
                        <th>Tên Thương Hiểu</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listBrand as $item) : ?>
                        <tr>
                            <td><?= $item['id_th'] ?></td>
                            <td><?= $item['ten_th'] ?></td>

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