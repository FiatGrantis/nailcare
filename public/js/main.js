$(document).ready(function(){

    $('.item_image').hover(function(){
        $(this).stop().animate({opacity: "0.8"}, 200);
    }, function(){
        $(this).stop().animate({opacity: "1"}, 200);
    });

    $('.nav_item').hover(function(){
        $(this).stop().animate({backgroundColor: "rgba(165, 165, 165, 0.5)"}, 100)
    }, function(){
        $(this).stop().animate({backgroundColor: "rgba(244, 242, 247, 1)"}, 100)
    });

    $('.image_preview').click(function(){
       var fullUrl = $(this).data('full');
        $('#modal_image_body').html('<img src="'+fullUrl+'" class="modal_popup">');
        $('#modal_image').modal('show');
    });
});

$('.img_about').magnificPopup({
    items: {
        src: 'uploads/images/photo.jpg'
    },
    type: 'image' // this is default type
});
$('.about_image1').magnificPopup({
    items: {
        src: 'uploads/about/1.jpg'
    },
    type: 'image' // this is default type
});
$('.about_image2').magnificPopup({
    items: {
        src: 'uploads/about/2.jpg'
    },
    type: 'image' // this is default type
});
$('.about_image3').magnificPopup({
    items: {
        src: 'uploads/about/3.jpg'
    },
    type: 'image' // this is default type
});
$('.about_image4').magnificPopup({
    items: {
        src: 'uploads/about/4.jpg'
    },
    type: 'image' // this is default type
});

