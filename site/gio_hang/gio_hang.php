<section>
  <!-- component -->
  <!-- Create By Joker Banny -->
  <style>
    @layer utilities {

      input[type="number"]::-webkit-inner-spin-button,
      input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }
    }
  </style>

  <!-- <div style="display:none" class="popup-xoa-sp z-20 flex bg-white p-3 gap-3 rounded-md fixed top-1/5 left-1/2 -translate-y-1/4 -translate-x-1/2">
    <img class=" w-16" src="../../uploaded/product/amazfit-t-rex-ultra-thumb-new-den-600x600.jpg" alt="">
    <div>
      <p class=" w-60">Bạn có muốn xóa sản phẩm ra khỏi giỏ hàng không</p>
      <div class="flex justify-between px-5 pt-2">
        <span class="xac-nha-xoa p-1 bg-green-500 text-white cursor-pointer rounded-md">Xác nhận</span>
        <span  class=" p-1 bg-red-500 text-white cursor-pointer rounded-md">Hủy</span>
      </div>
    </div>
  </div> -->

  <body>
    <div class=" min-h-screen gio-hang-trong bg-gray-100 pt-6">
      <h1 class="mb-10 text-center text-3xl uppercase  font-bold">Giỏ hàng</h1>
      <div class="gio-hang-trong mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
        <div id="show-cart" class=" rounded-lg md:w-2/3">
        </div>
        <!-- Sub total -->
        <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
          <div class="mb-2 flex justify-between">
            <p class="text-gray-700">Tạm tính</p>
            <p class="tong-tien text-gray-700">$129.99</p>
          </div>
          <div class="flex justify-between">
            <p class="text-gray-700">Shipping</p>
            <p class="text-gray-700">0</p>
          </div>
          <hr class="my-4" />
          <div class="flex justify-between">
            <p class="text-lg font-bold">Tổng</p>
            <div class="">
              <p class="tong-tien mb-1 text-lg font-bold">$134.98 USD</p>
              <p class="text-sm text-gray-700">including VAT</p>
            </div>
          </div>
          <div class="w-full">
            <a href="../gio_hang/index.php?thanh_toan" class=" block text-center mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Thanh toán</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</section>
<script>
  renderCart();
  $(document).on('click', '.up-cart', function() {
    var id = $(this).attr('data-id');
    updateCart(id, 'up')
    renderCart();
    let so_luong_sp = 0;
    favorites.forEach(element => {
      so_luong_sp += element['so_luong'];
    });
    $('.so-san-pham').html(so_luong_sp)
  })

  $(document).on('click', '.down-cart', function() {
    var id = $(this).attr('data-id');
    updateCart(id, 'down')
    renderCart();
    let so_luong_sp = 0;
    favorites.forEach(element => {
      so_luong_sp += element['so_luong'];
    });
    $('.so-san-pham').html(so_luong_sp)
  })

  $(document).on('keyup past', '.so_luong', function() {
    var id = $(this).attr('data-id');
    if ($('.so_luong').val() > 0 && $('.so_luong').val() < 6) {
      updateCart(id, 'input', $('.so_luong').val())
      renderCart();
    } else {
      if ($('.so_luong').val() < 1) {
        $('.so_luong').val('1')
      } else {
        $('.so_luong').val('6')

      }
    }
    let so_luong_sp = 0;
    favorites.forEach(element => {
      so_luong_sp += element['so_luong'];
    });
    $('.so-san-pham').html(so_luong_sp)
  })

  $(document).on('click', '.delete-cart', function() {
    deleteCart($(this).attr('data-id'))
    renderCart();
    let so_luong_sp = 0;
    favorites.forEach(element => {
      so_luong_sp += element['so_luong'];
    });
    $('.so-san-pham').html(so_luong_sp)
  })

</script>