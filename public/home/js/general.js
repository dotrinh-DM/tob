

/**
 * hàm thay đổi background thẻ input cho tất cả thẻ yêu cầu khi bấm submit
 */
function check_text(arr_id_input,id_form,id_img)
{
        var c_arrDist        = arr_id_input.split(','),
            num              = 0;

    //kiểm tra input có giá trị hay chưa
        for(var i = 0; i <= (c_arrDist.length - 1); i++) {
            if(document.getElementById(c_arrDist[i]).value == '') {
                document.getElementById(c_arrDist[i]).style.border = '1px solid tomato';
                num += 1;
            }
        }

    //nếu có id thẻ file thì chạy
    //kiểm tra nếu 1 trong số các id có giá trị thì bỏ border nếu cả 3 id ko có giá trị thì add border
        if(id_img != '' && id_img != null) {
            var c_arrImg         = id_img.split(','),
                num_img          = 0;

            for(var i = 0; i <= (c_arrImg.length - 1); i++) {
                var ip = document.getElementById(c_arrImg[i]).value;
                //nếu 1 trong các thẻ có giá trị thì bỏ border thẻ file đầu tiên và ngắt vòng lặp
                if(ip != null && ip != '') {
                    num_img += 1;
                    document.getElementById(c_arrImg[0]).style.border = '';
                    break;
                }
            }
            if(num_img <= 0) {
                document.getElementById(c_arrImg[0]).style.border = '1px solid tomato';
                num += 1;
            }
        }

        //nếu form điền đủ thông tin thì submit, nếu không false
        if(num > 0) {
            return false;
        } else {
            document.getElementById(id_form).submit();
        }
}

/*
* hàm kiểm tra value input khi nhập ký tự
* */
function checkpress(id_input)
{
    var $input = document.getElementById(id_input);
    if($input.value == '' || $input.value == null) {
        $input.style.border = '1px solid tomato';
    } else {
        $input.style.border = '';
    }
}

/*
* hàm kiểm tra value thẻ file
* nếu 1 trong các thẻ có value thì bỏ border thẻ có border
* */
function check_change_img(id_current,id_input)
{
    var $inputcurrent = document.getElementById(id_current),
        $input = document.getElementById(id_input);
    if($inputcurrent.value == '' || $inputcurrent.value == null) {
        $input.style.border = '1px solid tomato';
    } else {
        $input.style.border = '';
    }
}

/*
* hover then show brand
* */
function show_brand(id)
{
    $("#"+id).show(300);
}

/*
 * hover then hide brand
 * */
function hide_brand(id)
{
    //$("#"+id).hide(500);
}
$(document).ready(function(){
    $(".thongtin-sanpham #pro1").hover(function(){
        $(".thongtin-sanpham #brand1").show(300);
    }, function(){
        $(".thongtin-sanpham #brand1").hide(500);
    });

    $(".thongtin-sanpham #pro2").hover(function(){
        $(".thongtin-sanpham #brand2").show(300);
    }, function(){
        $(".thongtin-sanpham #brand2").hide(500);
    });

    $(".thongtin-sanpham #pro3").hover(function(){
        $(".thongtin-sanpham #brand3").show(300);
    }, function(){
        $(".thongtin-sanpham #brand3").hide(500);
    });

    $(".thongtin-sanpham #pro4").hover(function(){
        $(".thongtin-sanpham #brand4").show(300);
    }, function(){
        $(".thongtin-sanpham #brand4").hide(500);
    });
});