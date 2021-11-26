<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Comment - Detail</h3>
            <br>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">STT</th>
                        <th>Nội Dung</th>
                        <th>Ngày Bình Luận</th>
                        <th>Người Bình Luận</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detailCmt as $cmt) : ?>

                        <tr>
                            <td><?= $cmt['id_bl'] ?></td>
                            <td><?= $cmt['noi_dung'] ?></td>
                            <td><?= $cmt['thoi_gian'] ?></td>
                            <td><?= $cmt['name'] ?></td>
                            <td class="td-function">
                                <a href="#" class="btn btn-sm btn-success">Xóa</a>
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