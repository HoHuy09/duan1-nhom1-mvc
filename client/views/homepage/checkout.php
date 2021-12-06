<div class="bg-gray-900 h-full md:h-screen">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 sm:col-span-12 md:col-span-7 lg:col-span-8 xxl:col-span-8">
            <!-- component -->
            <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
            <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">


            <section class="py-1 bg-blueGray-50">
                <div class="">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
                        <div class="rounded-t mb-0 px-4 py-3 border-0">
                            <div class="flex flex-wrap items-center">
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                    <h3 class="font-semibold text-3xl text-center text-base text-blueGray-900">Danh Sách Sản Phẩm</h3>
                                </div>

                            </div>
                        </div>

                        <div class="block w-full overflow-x-auto">
                            <table class="items-center bg-transparent w-full border-collapse ">
                                <thead>
                                    <tr>
                                        <th class="px-6 bg-blueGray-50 text-xl text-blueGray-900 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            ID
                                        </th>
                                        <th class="px-6 bg-blueGray-50 text-xl text-blueGray-900 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Tên Sản Phẩm
                                        </th>
                                        <th class="px-6 bg-blueGray-50 text-xl text-blueGray-900 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Ảnh Sản Phẩm
                                        </th>
                                        <th class="px-6 bg-blueGray-50 text-xl text-blueGray-900 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Số Lượng
                                        </th>
                                        <th class="px-6 bg-blueGray-50 text-xl text-blueGray-900 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Giá
                                        </th>
                                        <th class="px-6 bg-blueGray-50 text-xl text-blueGray-900 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Thành Tiền
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $totalPrice = 0;
                                    ?>
                                    <?php foreach ($cart as $item) : ?>
                                        <tr>
                                            <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xl whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                                <?= $item['id_sp'] ?>
                                            </th>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xl whitespace-nowrap p-4 ">
                                                <?= $item['ten_sp'] ?>
                                            </td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xl whitespace-nowrap p-4 w-20 h-20 ">
                                                <img src="<?= PUBLIC_PATH . $item['anh_sp'] ?>" alt="">
                                            </td>
                                            <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xl whitespace-nowrap p-4">
                                                <?= $item['quantity'] ?>
                                            </td>
                                            <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xl whitespace-nowrap p-4">
                                                <?= $item['gia_sp'] ?>
                                            </td>
                                            <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xl whitespace-nowrap p-4">
                                                <?= $item['gia_sp'] * $item['quantity'] ?>
                                            </td>
                                            <?php $totalPrice += $item['gia_sp'] * $item['quantity'] ?>
                                        </tr>
                                    <?php endforeach ?>
                                    <tr>
                                        <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-2xl whitespace-nowrap p-4">
                                            Tổng Tiền
                                        </td>
                                        <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-2xl whitespace-nowrap p-4">
                                            <?= $totalPrice ?>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <footer class="relative pt-8 pb-6 mt-16">
                    <div class="container mx-auto px-4">
                        <div class="flex flex-wrap items-center md:justify-between justify-center">
                            <div class="w-full md:w-6/12 px-4 mx-auto text-center">

                            </div>
                        </div>
                    </div>
                </footer>
            </section>
        </div>
        <div class="col-span-12 sm:col-span-12 md:col-span-5 lg:col-span-4 xxl:col-span-4">
            <div class="w-full">
                <div class="bg-gradient-to-b from-White-800 to-blue-600 h-96"></div>
                <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
                    <div class="bg-white w-full shadow rounded p-8 sm:p-12 -mt-72">
                        <p class="text-3xl font-bold leading-7 text-center">Thông Tin Thanh Toán</p>
                        <form action="pay-cart" method="post">
                            <div class="md:flex items-center mt-12">
                                <div class="w-full md:w-1/2 flex flex-col">
                                    <label class="font-semibold text-xl leading-none">Họ Tên</label>
                                    <input type="text" name="name" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200" />
                                </div>
                                <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                                    <label class="font-semibold text-xl leading-none">Phone</label>
                                    <input type="text" name="phone" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200" />
                                </div>

                            </div>
                            <div class="md:flex items-center mt-8">
                                <div class="w-full flex flex-col">
                                    <label class="font-semibold text-xl leading-none">Email</label>
                                    <input type="email" name="email" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200" />
                                </div>
                            </div>
                            <div class="md:flex items-center mt-8">
                                <div class="w-full flex flex-col">
                                    <label class="font-semibold text-xl leading-none">Địa Chỉ Nhận Hàng</label>
                                    <input type="text" name="address" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200" />
                                </div>
                            </div>
                            <div class="md:flex items-center mt-8">
                                <div>
                                    <div class="w-full flex flex-col mt-8">
                                        <label class="font-semibold text-xl leading-none">Ghi Chú</label>
                                        <textarea type="text" name="note" class="h-40 text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"></textarea>
                                    </div>
                                </div>
                                <div class="flex items-center justify-center w-full">
                                    <button type="submit" class="mt-9  font-semibold leading-none text-white py-4 px-10 bg-blue-700 rounded hover:bg-blue-600 focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">
                                        Gửi
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>