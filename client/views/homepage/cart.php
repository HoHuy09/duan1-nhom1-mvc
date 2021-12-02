<div class="container" style="text-align: center;">
    <h1 style=" color:red">Trang Giỏ Hàng</h1> <br>
    <table id="cart">
        <thead>
            <tr style="font-size: 16px ; border: 1px solid black;">
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th style="width:22%" class="text-center">Thành tiền</th>
                <th style="width:10%"> chức năng </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($abc as $a) : ?>
                <tr>

                    <td>
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="<?= PUBLIC_PATH . $a['anh_sp'] ?>" alt="Sản phẩm 1" class="img-responsive" width="100">
                    </td>
</div>
<td>
<td>
    <h4 class="nomargin"><?= $a['ten_sp'] ?></h4>
</td>

</div>
</div>
</td>
<td data-th="Price"><?= $a['gia_sp'] . 'đ' ?></td>
<td data-th="Quantity"><input class="form-control text-center" value="1" type="number">
</td>
<td>
    <div>
        <?= $a['gia_sp'] . 'đ' ?>
    </div>
</td>
<td class="actions" data-th="">
    <button style=" background-color: #4CAF50;color: white; padding: 10px 24px;"><i class="fa fa-edit"> Sửa</i>
    </button>
    <button style=" background-color: red;color: white; padding: 10px 24px;"><i class="fa fa-trash-o"> Xóa</i>
    </button>

    </tr>
<?php endforeach; ?>
</tbody>

<tfoot>

    <tr>
        <td><a href="#" style=" background-color: #3300FF;color: white; padding: 10px 24px;"><i class="fa fa-angle-left"></i> Tiếp
                tục mua hàng</a>
        </td>
        <td colspan="2" class="hidden-xs"> </td>
        <td class="hidden-xs text-center"><strong>Tổng tiền 500.000 đ - fix sau</strong>
        </td>
        <td><a href="#" style=" background-color: #FFD700;color: white; padding: 10px 24px;">Thanh toán <i class="fa fa-angle-right"></i></a>
        </td>
    </tr>
</tfoot>

</table>


</div>
</div>