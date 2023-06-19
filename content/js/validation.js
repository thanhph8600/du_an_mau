function removeAscent(str) {
    if (str === null || str === undefined) return str;
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    return str;
  }

  function regex_name(){
    return  /^([a-zA-Z ]){3,20}$/;
  }

  function nhap_lai(){
    $('input').val('')
  }




 $(document).ready(function(){
  $.validator.addMethod('yourRule_ten_kh', function(value, element, param) {
        value = removeAscent(value)
        if ((/^([a-zA-Z ]){3,20}$/).test(value)) {
            return true
        }
        return false;
    }, '<div class="text-red-500">Bạn phải nhập từ 3 đến 20 kí tự, không có kí tự đặt biệt</div> ');
      $("#cap_nhat_tk").validate({
          rules: {
              name: {
                  yourRule_ten_kh: true
              },
              email: {
                  required: true,
                  email: true
              },
              phone: {
                  required: true,
                  digits: true,
                  minlength: 10,
                  maxlength: 10
              },
              upload: {
                  required: false,
                  accept: "jpg,png,gif,jpeg,pjpeg,avif,jfif",
              }
          },
          messages: {

              email: {
                  required: '<div class="text-red-500">Không để trống email</div>',
                  email: '<div class="text-red-500">Phải đúng định dạng email</div>'
              },
              phone: {
                  required: '<div class="text-red-500">Không để trống số điện thoại</div>',
                  digits: '<div class="text-red-500">Phải là số</div>',
                  minlength: '<div class="text-red-500">Phải 10 kí tự</div>',
                  maxlength: '<div class="text-red-500">Phải 10 kí tự</div>',
              },
              upload: {
                  accept: '<div class="text-red-500">Không đúng định dạng file </div>',
              }
          }
      });
 })
