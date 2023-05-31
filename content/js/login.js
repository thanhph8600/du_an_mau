$('.dangky').click(function() {

    var regexEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
    var regexName = /^[0-9a-zA-ZàáạãảầấậồốộổỗớờỡởợơẩẫằắặẳẵăêèẹẻẽếềểệễửữừứựơớờợởỡđéâäãåąáấâăčćęèéêëėįỉịíìĩìíîïłńòóôöõøùúûüươứớựųūÿỳýỷỹỵýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{1,30}$/
    var regexPhone = /[0][0-9]{9}/
    var regexPass = /[A-Za-z0-9.!#$%&'*+/=?^_`{|}~-]{6,30}/
    var check = 1

    if ($('.email-re').val() != '') {
        if (!regexEmail.test($('.email-re').val())) {
            $('.email-re').css('border', '1px solid red')
            $('.checkEmail-re').html(' không đúng định dạng')
            check = 0
        } else {
            $('.checkEmail-re').html('')
            $('.email-re').css('border', '1px solid green')
        }
    } else {
        $('.email-re').css('border', '1px solid red')
        check = 0

    }

    if ($('.name-re').val() != '') {
        if (!regexName.test($('.name-re').val())) {
            $('.name-re').css('border', '1px solid red')
            $('.checkName-re').html(' không được có kí tự đặt biệt')
            check = 0
        } else {
            $('.checkName-re').html('')
            $('.name-re').css('border', '1px solid green')
        }
    } else {
        check = 0
        $('.name-re').css('border', '1px solid red')
    }

    if ($('.phone-re').val() != '') {
        if (!regexPhone.test($('.phone-re').val())) {
            $('.phone-re').css('border', '1px solid red')
            $('.checkPhone-re').html(' phải có 10 số')
            check = 0
        } else {
            $('.checkPhone-re').html('')
            $('.phone-re').css('border', '1px solid green')
        }
    } else {
        check = 0
        $('.phone-re').css('border', '1px solid red')
    }

    if ($('.pass-re').val() != '') {
        if (!regexPass.test($('.pass-re').val())) {
            $('.pass-re').css('border', '1px solid red')
            $('.checkPass-re').html(' 6 - 30 kí tự')
            check = 0
        } else {
            $('.checkPass-re').html('')
            $('.pass-re').css('border', '1px solid green')
        }
    } else {
        check = 0
        $('.pass-re').css('border', '1px solid red')
    }

    if ($('.repass-re').val() != '') {
        if ($('.repass-re').val() != $('.pass-re').val()) {
            $('.repass-re').css('border', '1px solid red')
            $('.checkRepass-re').html(' không giống mật khẩu đã nhập')
            check = 0
        } else {
            $('.checkRepass-re').html('')
            $('.repass-re').css('border', '1px solid green')
        }
    } else {
        check = 0
        $('.repass-re').css('border', '1px solid red')
    }

    if (check == 1) {
        $.ajax({
            url: "../../Public/login.php",
            type: "post",
            data: {
                name: 'dangky',
                ten: $('.name-re').val(),
                email: $('.email-re').val(),
                sdt: $('.phone-re').val(),
                pass: $('.pass-re').val(),
            },
            success: function(result) {
                if (result == 'ok') {
                    $('.name-re').val('')
                    $('.email-re').val('')
                    $('.phone-re').val('')
                    $('.pass-re').val('')
                    alert('Đăng kí thành công')
                    setTimeout(() => {
                        // $(location).attr("href", './home.php');
                        // $(location).attr("href", pageURL);
                        window.location.reload(true)


                    }, 0);

                } else {
                    $('.checkEmail-re').html(result)
                }
                // $(location).attr("href", pageURL);

            }
        });
    }
})

$('.dangNhap').click(function() {
    var regexEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
    var check = 1

    if ($('.email').val() != '') {
        if (!regexEmail.test($('.email').val())) {
            $('.email').css('border', '1px solid red')
            $('.checkEmail').html(' không đúng định dạng')
            check = 0
        } else {
            $('.checkEmail').html('')
            $('.email').css('border', '1px solid green')
        }
    } else {
        $('.email').css('border', '1px solid red')
        check = 0

    }

    if (check == 1) {
        $.ajax({
            url: "../../Public/login.php",
            type: "post",
            data: {
                name: 'dangnhap',
                email: $('.email').val(),
                pass: $('.pass').val(),
            },
            success: function(result) {
                if (result == 'ok') {
                    alert('Đăng nhập thành công')
                    setTimeout(() => {
                        window.location.reload(true)
                    }, 0);

                } else {
                    $('.check-login').html(result)

                }

                // $(location).attr("href", pageURL);

            }
        });
    }
})

$('.dangXuat').click(function() {
    $.ajax({
        url: "../../Public/login.php",
        type: "post",
        data: {
            name: 'dangXuat',
        },
        success: function(result) {
            window.location.reload(true)
        }
    });
})