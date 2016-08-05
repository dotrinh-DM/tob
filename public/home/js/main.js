

$(window).scroll( function (){
    var wrapper = $('.wrapper');
    if ( $(window).scrollTop() > 55 ){
        if ( !wrapper.hasClass('myaffix') ){
            var padTop = document.getElementsByTagName('header')[0].offsetHeight;
            $('.site-main').css('padding-top', padTop + 'px');
            $('header').css('width', $('.wrapper').width()+'px' );
            wrapper.addClass('myaffix');
        }
    }
    else{
        if( $(window).scrollTop() == 0 ){
            if ( wrapper.hasClass('myaffix') ){
                wrapper.removeClass('myaffix');
                $('header').css('width','' );
                $('.site-main').css('padding-top', '');
            }
        }
    }
});

$(window).load( function(){
    var greyHeight = $('.home-index .item.video').height();
    $('.home-index .item.text').css('height', greyHeight + 'px');
})