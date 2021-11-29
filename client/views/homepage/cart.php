


<h2 class="text-center">Trang Giỏ Hàng</h2>
<div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th >Ảnh</th>
                    <th >Tên sản phẩm</th>
                    <th >Giá</th>
                    <th >Số lượng</th>
                    <th style="width:22%" class="text-center">Thành tiền</th>
                    <th style="width:10%"> chức năng </th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($abc as $a) :?>
                <tr>
                    
                    <td><div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="<?= PUBLIC_PATH.$a['anh_sp']?>" alt="Sản phẩm 1" class="img-responsive" width="100"></td>
                            </div>
                            <td><div class="col-sm-10">
                                <h4 class="nomargin"><?=$a['ten_sp']?></h4>
                            </td>
        
                            </div>
                        </div>
                    </td>
                    <td data-th="Price"><?= $a['gia_sp'].'đ'?></td>
                    <td data-th="Quantity"><input class="form-control text-center" value="1" type="number">
                    </td>
                    <td>
                        <div>
                            <?= $a['gia_sp'].'đ'?>
                        </div>
                    </td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>
                        </button>
                    
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
                
                <tr>
                    <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp
                            tục mua hàng</a>
                    </td>
                    <td colspan="2" class="hidden-xs"> </td>
                    <td class="hidden-xs text-center"><strong>Tổng tiền 500.000 đ - fix sau</strong>
                    </td>
                    <td><a href="#" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>