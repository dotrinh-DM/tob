$(document).ready(function() {
    $("#add-more-img").live('click', function() {
        var a = $('#wrap-img input[type="file"]:last').attr("id");
        a++;
        var strname = 'img' + a;
        $("#wrap-img").append("<input type='file' name=" + strname + " id='" + a + "' size='28' /><br>");
        $("input[name='idlastimg']").attr('value', a);
    });
});
                