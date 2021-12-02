
<main class="wrapper__content content__detail">
    <div class="grid wide">
        <div class="row col content__detail-product">
            <section class="l-5 col">
                <div class="content__product-img-group">
                    <div class="l-12 col content__product-img-main-box">
                        <img src="<?= PUBLIC_PATH?><?php echo ltrim($product['anh_sp'], ' ') ?>" alt=""
                             class="content__product-img-main">
                    </div>
                </div>
            </section>
            <section class="l-7 col">
                <div class="content__product-title-group">
                    <h1 class="content__product-title-name"><?php echo $product['ten_sp'] ?></h1>
                    <p class="content__product-title-brand">Thương hiệu:
                        <?php echo $product['ten_th'] ?>
                    </p>
                    <p class="content__product-title-price">Giá:
                        <span class="price-note"><?php echo number_format($product['gia_sp']) ?> đ</span>
                    </p>
                    <div class="content__product-title-quantity-box">
                        <span class="content__product-title-quantity-title">Số lượng :</span>
                        <input type="number" class="content__product-title-quantity-input" value="1">
                    </div>
                    <br><br><br><br> 
                   
                    <?php if(isset($_SESSION['user']) && $_SESSION['user'] != null):?>
                        <a href="<?= BASE_URL . 'yeu-thich?id=' . $product['id_sp']?>" class="content__product-title-btn">
                        <i class="fas fa-heart"></i>
                        <span class="content__product-title-btn-txt">Yêu thích</span>
                    <?php endif ?>
                    
                    <br><br>             
                    <a style="margin-left: 50px;"  href="<?= BASE_URL . 'add-to-cart?id=' . $product['id_sp']?>" class="content__product-title-btn">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="content__product-title-btn-txt">Chọn mua</span>
                    </a>
                    
                </div>
            </section>
        </div>

        <!-- chi tiết sản phẩm -->
        <div class="row col row-detail-title">
            <section class="l-9 col">
                <div class="content__detail-group">
                    <div class="content__detail-group-box">
                        <h1 class="content__detail-header">CHI TIẾT SẢN PHẨM</h1>
                        <p class="content__detail-brand">
                            <span class="content__detail-title-name">Thương hiệu: </span>
                            <span class="content__detail-main">
                                        <?php echo $product['ten_th'] ?>
                                    </span>
                        </p>
                        <p class="content__detail-date">
                            <span class="content__detail-title-name">Bảo hành: </span>
                            <span class="content__detail-main"><?php echo $product['bao_hanh'] ?></span>
                        </p>
                    </div>
                    <div class="content__detail-group-box2">
                        <h1 class="content__detail-header">MÔ TẢ SẢN PHẨM</h1>
                        <div class="content__detail-name">
                                <span class="content__detail-main-box">
                                    <span class="content__detail-title-name fix-name">Tên sản phẩm:</span>
                                    <?php echo $product['ten_sp'] ?>
                                </span>
                        </div>
                        <div class="content__detail-description">
                            <span class="content__detail-title-des">Mô tả: </span>
                            <p class="content__detail-main"><?php echo $product['mo_ta'] ?></p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="l-3 col">
                <div class="content__sidebar-prod">
                    <ul class="content__sidebar-prod-list">
                        <div class="content__sidebar-prod-list-box">
                            <img src="<?= PUBLIC_PATH?>img/sale.jpg" alt="" width="80px" height="60px">
                            <h2 class="content__sidebar-prod-list-header">Sản phẩm giảm giá</h2>
                        </div>
                        <?php
                        foreach ($salesPrdt as $sale) : ?>
                            <li class="content__sidebar-prod-item">
                                <a href="<?= BASE_URL.'chi-tiet/?id='.$sale['id_sp']?>" class="content__sidebar-prod-item-box">
                                    <img src="<?= PUBLIC_PATH?><?php echo ltrim($sale['anh_sp'], ' ') ?>" alt=""
                                         class="content__sidebar-prod-img">
                                    <div class="content__sidebar-prod-item-sub">
                                        <h3 class="content__sidebar-prod-name">
                                            <?php echo $sale['ten_sp'] ?>
                                        </h3>
                                        <span class="content__sidebar-prod-price"> <?php echo number_format($sale['gia_sp']) ?> đ</span>
                                        <span class="content__sidebar-prod-brand">Giảm giá:  <?php echo $sale['giam_gia'] ?>%</span>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </section>
        </div>


        <!-- danh sách đã comment -->
        <h1 class="content__cmt-header fix">Bình luận sản phẩm</h1>
        <!-- comment -->
        <div class="row col">
            <section class="l-9 col" >
                <div class="content__cmt-box-write">
                    <form action="" class="content__cmt-form" method="POST" id="comment">
                        <div class="content__cmt-form-box">
                            <div class="content__cmt-form-avatar">
                                <img src="<?= PUBLIC_PATH?>img/<?php
                                if (empty($_SESSION['user'])) {
                                    echo "avatar.jpg";
                                } else {
                                    echo $_SESSION['user']['avatar'];
                                } ?>" alt="" class="content__cmt-form-img">
                            </div>
                            <div class="content__cmt-form-func">
                                
                            <?php
                                if (empty($_SESSION['user'])) {
                                    
                                } else {
                                    echo '<textarea name="content" id="" cols="30" rows="10" class="content__cmt-form-txt"
                                    placeholder="viết bình luận"></textarea>
                                <div class="content__cmt-form-group">
                                <button class="content__cmt-form-btn" name="btnComment">Bình luận</button>
                                </div>';
                                } ?>
                                    
                                
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <!-- -->
        <?php foreach ($binhLuan as $comment) : ?>
            <div class="row col box-print-comment" >
                <section class="l-9 col">
                    <div class="content__cmt-box-print">
                        <div class="content__cmt-form-avatar">
                            <img src="<?= PUBLIC_PATH?>img/<?php echo $comment['avatar'] ?>" alt="" class="content__cmt-form-img">
                        </div>
                        <div class="content__cmt-form-info">
                            <a href="" class="content__cmt-form-info-name">
                                <?php echo $comment['name'] ?>
                            </a>
                            <p class="content__cmt-form-info-param">
                                <?php echo $comment['noi_dung'] ?>
                            </p>
                            <div class="content__cmt-form-info-box">
                                                <span class="content__cmt-form-info-date">
                                                    <?php echo $comment['thoi_gian'] ?>
                                                </span>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <?php endforeach; ?>
        <!-- sản phẩm liên quan -->
        <h1 class="content__product-name-event fix">Các sản phẩm liển quan</h1>
        <div class="row col" style="margin-top: 20px">
            <?php
            foreach ($products as $row) : ?>
                <section class="l-2 col">
                    <div class="content__product-sale">
                        <a href="<?= BASE_URL.'chi-tiet/?id='.$row['id_sp']?> "
                           class="content__product-sale-link row__general-product">
                            <div class="content__product-sale-box">
                                <img src="<?= PUBLIC_PATH?><?php echo ltrim($row['anh_sp'], ' ') ?>" alt=""
                                     class="content__product-sale-img">
                            </div>
                            <p class="content__product-sale-name"><?php echo $row['ten_sp'] ?></p>
                            <p class="content__product-general-price">Giá: <span class="price_color">
                                                <?php echo number_format($row['gia_sp']) ?>đ
                                            </span></p>
                            <span class="content__product-general-status">Trạng thái:
                                                <?php
                                                if ($row['trang_thai'] >= '1') {
                                                    echo 'Còn hàng';
                                                } else if ($row['trang_thai'] = '0') {
                                                    echo 'Hết hàng';
                                                }
                                                ?>
                                            </span>
                        </a>
                    </div>
                </section>
            <?php endforeach; ?>

        </div>
    </div>
</main>