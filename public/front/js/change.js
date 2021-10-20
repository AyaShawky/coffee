$(document).ready(function(){

    $( ".video .video-lecture .accordion-item" ).each(function( index ) {
        if($(this).hasClass("activeitem")){
            $('.activeitem .accordion-header .accordion-button .icon-show').addClass('fa-minus');
            $('.activeitem .accordion-header .accordion-button .icon-show').removeClass('fa-plus');
            $(this).removeClass("remove");
        }
        $(this).click(function(){
            var item = $(this).index();
            $(this).toggleClass("activeitem");
            if($(this).hasClass("activeitem")){
                $('.activeitem .accordion-header .accordion-button .icon-show').addClass('fa-minus');
                $('.activeitem .accordion-header .accordion-button .icon-show').removeClass('fa-plus');
                $(this).removeClass("remove");
            }else{
                $(this).toggleClass("remove");
                $('.remove .accordion-header .accordion-button .icon-show').removeClass('fa-minus');
                $('.remove .accordion-header .accordion-button .icon-show').addClass('fa-plus');
            }
        })
    });

});
