
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Hóa Đơn</h3>
            <br>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">STT</th>
                        <th>Khách hàng</th>
                        <th>Số phone</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Note</th>
                        <th>Bill</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($oder as $item) : ?>
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['customer_name'] ?></td>
                            <td><?= $item['customer_phone_number'] ?></td>
                            <td><?= $item['customer_address'] ?></td>
                            <td><?= $item['customer_email'] ?></td>
                            <td><?= $item['note'] ?></td>
                            <td><?= $item['total_price'] ?></td>
                            <td>
                                <?php if($item['status']==0){
                                    echo 'Đang xử lý';
                                }else if($item['status']==1){
                                    echo 'Đang Ship';
                                }else{
                                    echo 'Đã thanh toán';
                                }?></td>

                            <td class="td-function">
                                <a href="*" class="btn btn-sm btn-info">Sửa</a>
                               
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
