<main class="wrapper__content">
    <div class="grid wide">
        <div class="row col box2">
            <section class="l-3 col">
                <!-- sản phẩm thịnh hành -->
                <ul class="content__sidebar-prod-list">
                    <h2 class="content__sidebar-list-header">Sản phẩm nổi bật</h2>
                    <hr>
                    <?php foreach ($viewss as $prdView) : ?>
                        <li class="content__sidebar-prod-item">
                            <a href="<?= BASE_URL.'chi-tiet/?id='. $prdView['id_sp'] ?>" class="content__sidebar-prod-item-box">
                                <img src="<?=PUBLIC_PATH?><?php echo ltrim($prdView['anh_sp'], ' ') ?>" alt=""
                                     class="content__sidebar-prod-img">
                                <div class="content__sidebar-prod-item-sub">
                                    <h3 class="content__sidebar-prod-name">
                                        <?php echo $prdView['ten_sp'] ?>
                                    </h3>
                                    <span class="content__sidebar-prod-price"><?php echo number_format($prdView['gia_sp']) ?> đ</span>
                                    <span class="content__sidebar-prod-brand">
                                                       Thương hiệu: <?php echo $prdView['ten_th'] ?>
                                                    </span>
                                </div>
                            </a>
                        </li>
                        <br>
                    <?php endforeach; ?>
                </ul>
            </section>

            <section class="l-9 col">
                <!-- nav btn trạng thái -->
                <h1 style="font-size: 30px; padding: 10px; background-color: white;"><?php if (empty($id)) {
                        echo "Tất cả sản phẩm";
                    } else {
                        echo $danhMuc["ten_th"];
                    }
                    ?></h1>
                <div class="trend">
                    <div class="row col content__list-product-group">
                        <?php
                        foreach ($result as $rowPhone) : ?>
                            <div class="l-4 col box-product">
                                <a href="<?= BASE_URL.'chi-tiet/?id='. $rowPhone['id_sp'] ?>" class="content__list-product">
                                    <div class="content__list-product-box">
                                        <img src="<?=PUBLIC_PATH?><?php echo ltrim($rowPhone['anh_sp'], ' ') ?>" alt=""
                                             class="content__list-product-img">
                                    </div>
                                    <div class="content__list-product-info">
                                        <h1 class="content__list-product-name"><?php echo $rowPhone['ten_sp'] ?></h1>
                                        <div class="content__list-product-price">
                                                            <span class="content__list-product-price-old">
                                                                Giá:<span
                                                                        class="content__list-product-price-old-number"></span>
                                                            </span>
                                            <span class="content__list-product-price-new"><?php echo number_format($rowPhone['gia_sp']) ?> đ</span>
                                        </div>
                                        <p class="content__list-product-status">Trạng thái:
                                            <?php
                                            if ($rowPhone['trang_thai'] >= '1') {
                                                echo 'Còn hàng';
                                            } else if ($rowPhone['trang_thai'] <= '0') {
                                                echo 'Hết hàng';
                                            }
                                            ?>
                                        </p>
                                        
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="new">
                </div>
            </section>
        </div>
    </div>
</main>