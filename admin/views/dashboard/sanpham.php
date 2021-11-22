<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sản Phẩm</h3>
            <br>
            <form action="" method="get">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                              <input type="text" name="keyword" value="<?= $keyword ?>" class="form-control" placeholder="Tìm kiếm..." aria-describedby="helpId">
                            </div>
                        </div>
                    </div>
                </form>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">STT</th>
                        <th>Tên Sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Thương hiệu</th>
                        <th>Sale</th>
                        <th>Bảo hành</th>
                        <th>Trạng thái</th>
                        
                        <th><a href="<?= BASE_URL . 'cp-admin/san-pham/add' ?>" class="btn btn-sm btn-success">Thêm sản phẩm</a></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $item) : ?>
                        <tr>
                            <td><?= $item['id_sp'] ?></td>
                            <td><?= $item['ten_sp'] ?></td>
                            <td><img src="<?= PUBLIC_PATH . $item['anh_sp'] ?>" width="50"></td>
                            <td><?= number_format($item['gia_sp']) ?>đ</td>
                            <td><?= $item['ten_th'] ?></td>
                            <td><?= $item['giam_gia'] ?>%</td>
                            <td><?= $item['bao_hanh'] ?></td>
                            <td>
                                <?php
                                if ($item['trang_thai'] >= '1') {
                                    echo 'Còn hàng';
                                } else if ($item['trang_thai'] <= '0') {
                                    echo 'Hết hàng';
                                }
                                ?>
                            </td>
                            <td class="td-function">
                                <a href="<?= BASE_URL . 'cp-admin/san-pham/edit?id='.$item['id_sp'].'&&id_dm='.$item['id_dm'].'&&th='.$item['id_th'] ?>" class="btn btn-sm btn-info">Sửa</a>
                                
                                <a href="<?= BASE_URL . 'cp-admin/san-pham/delete?id='.$item['id_sp']?>"   class="btn btn-sm btn-danger" name="btnDelete">Xóa</a>
                                
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