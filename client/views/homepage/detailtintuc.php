<div class="max-w-screen-lg  mx-auto">
    <main class="mt-10">
        <div class="mb-4 md:mb-0 w-full mx-auto relative">
            <div class="px-4 lg:px-0">
                <h2 class="text-5xl font-semibold text-gray-800 leading-tight">
                    <?= $list['tieu_de'] ?>
                </h2>
                <a href="#" class="py-2 text-green-700 text-xl inline-flex items-center justify-center mb-2">
                    <?= $list['ngay_dang_tin'] ?>
                </a>
            </div>
            <img src="<?= PUBLIC_PATH . 'img/' . $list['anh'] ?>" style="height: 300px" width="900px" />
        </div>
        <div class="flex flex-col lg:flex-row lg:space-x-12">

            <div class="px-4 lg:px-0 mt-12 text-gray-700 text-lg leading-relaxed w-full lg:w-3/4">

                <h2 class="text-3xl text-gray-800 font-semibold mb-4 mt-4"><?= $list['nd_ngan'] ?></h2>

                <p class="pb-6 text-2xl"><?= $list['nd_dai'] ?></p>
            </div>
        </div>
    </main>
</div>