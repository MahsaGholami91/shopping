
$(document).ready(function(){

// nice select
$('select').niceSelect();
// end nice select

// //thumbnail pics
$('.pic_style1 .thumb_part .pic').click(function(){
    var $this=$(this);
    $('.pic_style1 .bigpic').animate({opacity:0.6},200,function () {
        $('.pic_style1 .thumb_part .pic').removeClass('active');
        $(this).addClass('active');
        var bigpic = $this.find('img').attr('data-bigpic-url');
        var zoompic = $this.find('img').attr('data-zoompic-url');
        $('.pic_style1 .bigpic').find('img').attr('src',bigpic).attr('data-zoom',zoompic);
        $('.pic_style1 .bigpic').animate({opacity:1});
    });

});// //thumbnail pics


// //detail tabs
$('.product_detail_style1 .title3').click(function(){
    $(this).toggleClass('open');
    $(this).closest('.item1').find('.paragraph1').slideToggle(200);
    $(this).closest('.item1').find('.share_style2').slideToggle(200);
});// //detail tabs

$('.product_detail_style1 .like1 .icon').click(function () {
    $(this).toggleClass('liked');
})

// zoom plugin
new Drift(document.querySelector('.drift-demo-trigger'), {
    paneContainer: document.querySelector('.product_detail_style1'),
    inlinePane: 900,
    containInline: true,
    hoverBoundingBox: true,
    zoomFactor: 3,
    inlineOffsetY: -85,
});


    $('.box_style1 .quick_view .text').click(function(){
        show_modal('.bg15');
        modal_box('#popup_box15',$(this));
    });
    $(document.body).on('click','.modal_style15 .close_icon',function(){
        hide_modal('.bg1');
        $('.modal_style15').fadeOut();
    });
// zoom plugin

});
//end document ready
