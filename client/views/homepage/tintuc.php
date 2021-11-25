<style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
<main class="container">

        <br>

        <?php foreach ($tintuc as $item) : ?>
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0"><?= $item['tieu_de'] ?></h3>
                            <div class="mb-1 text-muted"><?= $item['ngay_dang_tin'] ?></div>
                            <p class="card-text mb-auto"><?= $item['nd_ngan'] ?> </p>
                            <a href="tintuc_detail.php/id=<?= $item['ma_tin_tuc'] ?>" class="stretched-link">Xem chi tiết</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img class="bd-placeholder-img" src="<?= $item['anh'] ?>" width="200" height="250">


                            </img>

                        </div>
                    </div>
                </div>


            </div>
        <?php endforeach; ?>
    </main>