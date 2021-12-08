

<div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th style="width: 10px">STT</th>
                        <th>Tên SP</th>
                        <th>Ảnh</th>
                        <th>Giá tiền</th>
                        <th>SL</th>

                        <th>Status</th>
                        <th>Action</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($oder as $item) : ?>
                        <tr>
                            <td><?= $item['id_sp'] ?></td>
                            <td><?= $item['ten_sp'] ?></td>
                            <td><img src="<?= PUBLIC_PATH . $item['anh_sp'] ?>" width="100"></td>
                            <td><?= number_format($item['gia_sp']) ?>đ</td>
                            <td><?= $item['quantity'] ?></td>
                            
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
                                <a href="<?= BASE_URL . 'cp-admin/hoadon/detail/edit?id='.$item['id'].'&&id_oder='.$id ?>" class="btn btn-sm btn-info">Sửa</a>
                                
                                <a href="<?= BASE_URL . 'cp-admin/hoadon/detail/delete?id='.$item['id'].'&&id_oder='.$id?>"   class="btn btn-sm btn-danger" name="btnDelete">Xóa</a>
                                
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>