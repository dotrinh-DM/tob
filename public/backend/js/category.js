$(document).ready(function ()
{
    $("#cha").click(function (){
       $("select[name='danhmuc']").attr("disabled",true);
    });
    
    $("#goc").live("click",function (){
       $("select[name='danhmuc']").prop("disabled",true);
    });
        
    $("#con").click(function (){
       $("select[name='danhmuc']").attr("disabled",false);
    });
});