jQuery.noConflict();

/**
 * hàm thay đổi background thẻ input
 */
function check_text(arr_id_input, id_form)
{
    var c_arrDist        = arr_id_input.split(','),
        num              = 0,
        input            = 'input_';

    for(var i = 0; i <= c_arrDist.length; i++) {
        if(document.getElementById(c_arrDist[i]).value == '') {
            document.getElementById(c_arrDist[i]).style.backgroundColor = 'tomato';
            num += 1;
        }
    }

    if(num <= 0) {
        document.getElementById(id_form).submit();
    }
}

/*
*  hàm ẩn hiện nút delete all
* */
function onchecked(is_btncheckall){
    (function($){
        var count = 0;
        $('input[class="checks"]').each(function() {
            if(this.checked == true) {
                count++;
            }
        });

        if(is_btncheckall == 0) {
            if(count > 0) {
                $('.btndelall').css('display','block');
            } else {
                $('.btndelall').css('display','none');
            }
        } else {
            if(count <= 0) {
                $('.btndelall').css('display','block');
            } else {
                $('.btndelall').css('display','none');
            }
        }

    })(jQuery);
}