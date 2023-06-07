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
  })

  $(document).on('click', '.down-cart', function() {
    var id = $(this).attr('data-id');
    updateCart(id, 'down')
    renderCart();
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
  })

  $(document).on('click', '.delete-cart', function() {
    deleteCart($(this).attr('data-id'))
    renderCart();
  })
</script>