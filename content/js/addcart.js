var favorites = JSON.parse(localStorage.getItem('favorites')) || [];

function addCart(item) {
    
    let check =0;
    favorites.forEach(element => {
        if(item['id'] == element['id']){
            element['so_luong']++;
            check = 1;
        }
    });
    if(check == 0) {
        favorites.push(item)
    }
    localStorage.setItem('favorites', JSON.stringify(favorites));
}
function deleteCart(id){
    var arrDelete = favorites.filter(
        (item) => item.id !== id
    );
    localStorage.setItem('favorites', JSON.stringify(arrDelete));
    favorites =arrDelete;
}

function deleteShopCart(){
    window.onbeforeunload = function() {
        localStorage.removeItem('favorites');
        return '';
      };
}

function updateCart(id,type,value=null) {
    if(type == 'up'){
        favorites.forEach(element => {
            if(id == element['id']){
                if(element['so_luong']<6){
                    element['so_luong']++;
                }
            }
        });
        
    }else if(type == 'down'){
        favorites.forEach(element => {
            if(id == element['id']){
                if(element['so_luong']!=1){
                    element['so_luong']--;
                }
            }
        });
    }else{
        favorites.forEach(element => {
            if(id == element['id']){
                element['so_luong'] = value;
            }
        });
    }
    localStorage.setItem('favorites', JSON.stringify(favorites));
}
function renderCart() {
    var template ='';
    var sum = 0;
    if(favorites.length == 0){
        $('.gio-hang-trong').html(`<div>
        <img class=" m-auto" src="https://bizweb.dktcdn.net/100/320/202/themes/714916/assets/empty-cart.png?1650292912948" alt="">
    <div class="text-center pt-10">        <a href="../trang_chinh/index.php" class=" px-4 py-2 rounded bg-blue-500 text-white font-semibold">Trở lại trang chủ</a></div>
      </div>`)
    }else{
        favorites.forEach(element => {
            let tong = element['gia']*element['so_luong']
            sum += tong;
            template += (`<div class="justify-between mb-3 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
            <img src="../../uploaded/product/${element['hinh']}" alt="product-image" class="w-full rounded-lg sm:w-40" />
            <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
              <div class="mt-5 sm:mt-0">
                <h2 class="text-lg font-bold text-gray-900 w-4/5 ">${element['name']}</h2>
                <p class="mt-1 text-lg text-gray-700 py-2 ">${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(element['gia'])}</p>
              </div>
              <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                <div class="flex items-center border-gray-100">
                  <span class="down-cart cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50" data-id="${element['id']}"> - </span>
                  <input class="so_luong h-8 w-8 border bg-white text-center text-xs outline-none" type="number" value="${element['so_luong']}" min="1" data-id="${element['id']}" read/>
                  <span class="up-cart cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50" data-id="${element['id']}"> + </span>
                </div>
                <div class="flex items-center space-x-4">
                  <p class="text-lg">${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(tong)}</p>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" delete-cart h-5 w-5 cursor-pointer duration-150 hover:text-red-500" data-id="${element['id']}">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </div>
              </div>
            </div>
          </div>`)
        });
        $('#show-cart').html(template)
        $('.tong-tien').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(sum))
    }
}


function renderCheckOut() {
    var template ='';
    var sum = 0;
    var so_luong = 0;
    if(favorites.length == 0){
        $('.gio-hang-trong').html(`<div>
        <img class=" m-auto" src="https://bizweb.dktcdn.net/100/320/202/themes/714916/assets/empty-cart.png?1650292912948" alt="">
    <div class="text-center pt-10">        <a href="../trang_chinh/index.php" class=" px-4 py-2 rounded bg-blue-500 text-white font-semibold">Trở lại trang chủ</a></div>
      </div>`)
    }else{
        favorites.forEach(element => {
            let tong = element['gia']*element['so_luong']
            sum += tong;
            so_luong++;
            template += (`<div class="flex items-center gap-2 py-3 border-b-gray-300 pr-4">
                            <div class=" w-1/6">
                                <img src="../../uploaded/product/${element['hinh']}" alt="">
                            </div>
                            <div class="w-3/6 font-semibold text-lg">
                            ${element['name']}
                            </div>
                            <div class=" w-2/6 flex justify-between">
                                <div class=" w-1/4 text-center">
                                x ${element['so_luong']}
                                </div>
                                <div class=" w-2/4  text-center">
                                
                                ${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(element['gia'])}
                                </div>
                            </div>
                        </div>

                        `)
        });
        $('.san-pham').html(template)
        $('.san-pham').append('<input type="hidden" class="tong_tien" name="tong_tien" value="'+sum+'">')
        $(".so-luong").text(so_luong)
        $('.tong-tien').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(sum))
    }
}


function so_luong_sp(){
    var so_luong_sp = 0;
    favorites.forEach(element => {
        so_luong_sp += element['so_luong'];
    });
    $(window).on('load', function() {

        $('.so-san-pham').html(so_luong_sp)
    })
    $('.so-san-pham').html(so_luong_sp)
}

