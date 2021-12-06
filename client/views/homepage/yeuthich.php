<div>
    <h1 style="font-size: 40px; text-align: center;">Sản phẩm yêu thích</h1>
</div>
<div class="row col row-sale fix">
            <?php foreach ($yeuthich as $rowSale) : ?>
                
                <section class="l-2 col">
                    <div class="content__product-sale">
                        <a href="<?= BASE_URL.'chi-tiet/?id='.$rowSale['id_sp']?>" class="content__product-sale-link" style="margin-top: 25px;">
                            <div class="content__product-sale-box">
                                <img src="<?= PUBLIC_PATH?><?php echo ltrim($rowSale['anh_sp'], ' ') ?>" alt=""
                                     class="content__product-sale-img">
                            </div>
                            <p class="content__product-sale-price">Giá: <?php echo number_format($rowSale['gia_sp']) ?>
                                đ</p>
                            <span class="content__product-sale-status">Trạng thái:
                                            <?php
                                            if ($rowSale['trang_thai'] >= '1') {
                                                echo 'Còn hàng';
                                            } else if ($rowSale['trang_thai'] <= '0') {
                                                echo 'Hết hàng';
                                            }
                                            ?>
                                    </span>
                            </span>
                           <button style="margin-bottom: 102px; margin-top: -40px; border: none;"> <a style="font-size: 18px; margin-left: 90px;" href="<?= BASE_URL.'yeuthich/delete?id='.$rowSale['id']?>">Xóa</a></button>
                            
                        </a>
                    </div>
                </section>
                <?php endforeach; ?>
        </div>