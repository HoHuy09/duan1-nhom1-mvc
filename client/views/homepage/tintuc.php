<!-- Create By Joker Banny -->
<div class="min-h-screen  items-center ">
    <div class="container mx-auto p-12 bg-gray-100 rounded-xl">
        <h1 class="text-4xl uppercase font-bold from-current mb-8">Những Tin Tức Đáng Chú Ý</h1>
        <!-- Box-1 -->
        <div class="sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-4 space-y-4 sm:space-y-0 ">
            <?php foreach ($tintuc as $item) : ?>
                <div class="bg-white">
                    <div>
                        <div class="shadow-lg hover:shadow-xl transform transition duration-500 hover:scale-105">
                            <div>
                                <img class="w-full" src="<?= PUBLIC_PATH . 'img/' . $item['anh'] ?>" />
                                <div class="px-4 py-2">
                                    <h1 class="text-2xl font-gray-700 font-bold"><?= $item['tieu_de'] ?></h1>
                                    <div class="flex space-x-2 mt-2">

                                        <h3 class="text-xl text-gray-600 font-semibold mb-2"><?= $item['ngay_dang_tin'] ?></h3>
                                    </div>
                                    <p class="text-xl tracking-normal"><?= $item['nd_ngan'] ?></p>

                                    <button class="mt-12 text-2xl w-full text-center bg-yellow-400 py-2 rounded-lg  "> <a href="<?= BASE_URL . 'chi-tiet-tin-tuc/?id=' . $item['ma_tin_tuc'] ?>">Xem Thêm</a> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>