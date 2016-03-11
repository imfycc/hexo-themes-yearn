/*左侧边栏的sns伪类效果*/
$(function(){
    $('.sns img').hover(function(){
        var title = $(this).attr('data-tooltip');
        $('.tip p').text(title);
        var dis = $(this).position().left;
        var l = ($('.tip').outerWidth()-$(this).outerWidth())/2;
        $('.tip').css({'left':dis - l +'px','opacity':1});

    },function(){
        $('.tip').css('opacity',0);
    });
});

/*搜索框 聚焦伸长效果*/

$(document).ready(function(){
    $('.input-search').focus(function(){
        $(this).animate({width:'200px'});
    }).blur(function(){
        $(this).animate({width:'120px'});
    });
});

/*侧面板*/
$(document).ready(function(){
    $('.leftAside').hover(function(){
        $('.leftAside .icon-reorder').hide();
        $(this).animate({width:'300px'});
        $('.hoverShow').css('display','block');
    },function(){
        $(this).animate({width:'60px'});
        $('.leftAside .icon-reorder').show();
        $('.hoverShow').css('display','none');
    });
});

/*目录折叠效果*/
$(document).ready(function(){
    $('.jqTitle').hover(function(){
        $('.archive').show();
        $('.jqTitle i:nth-child(2)').removeClass('icon-caret-right').addClass('icon-caret-down');
    },function(){
        $('.archive').css('display','none');
        $('.jqTitle i:nth-child(2)').removeClass('icon-caret-down').addClass('icon-caret-right');
    });
});