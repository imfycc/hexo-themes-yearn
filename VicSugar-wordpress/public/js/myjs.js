

/*左侧边栏的sns伪类效果*/
$(function(){
    $('.sns img').hover(function(){
        var title = $(this).attr('data-tooltip');
        $('.tip p').text(title);
        var dis = $(this).position().left;
        var l = ($('.tip').outerWidth()-$(this).outerWidth())/2;
        $(".tip").css({'left':dis - l +'px','opacity':1});

    },function(){
        $(".tip").css('opacity',0);
    });
});