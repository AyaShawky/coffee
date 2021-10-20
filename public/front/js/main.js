$(document).ready(function () {
    
    $(".SliderHomePage").owlCarousel({
        items:1,
        rtl:true,
        nav:false,
        dots:true,
        autoplay:true,
        slideSpeed: 3000,
        loop:true,
        animateOut: 'slideOutRight',
        animateIn: 'slideInLeft',
        autoplayTimeout:5000
    });

    $(".BoxTeacherSlider").owlCarousel({
        rtl:true,
        nav:true,
        dots:false,
        navText: ["<i class='fa fa-angle-right'><i>","<i class='fa fa-angle-left'><i>"],
        responsive : {
            320 : {
                items : 1,
                stagePadding: 0,
            },
            425 : {
                items : 1,
                stagePadding: 30,
            },
            768 : {
                items : 2,
                stagePadding: 25,
            },
            1200: {
                items:3,
                stagePadding: 70,
            }
        }
    })

    $(".OpinionSlider").owlCarousel({
        rtl:true,
        nav:false,
        dots:false,
        autoplay:true,
        slideSpeed: 3000,
        loop:true,
        responsive : {
            320 : {
                items : 1,
                stagePadding:0,
                margin:10
               
            },
            425 : {
                items : 1,
                stagePadding:0,
                margin:10,
                
            },
            768 : {
                items : 1,
                stagePadding:10,
                margin:40,
            },
            992 : {
                items:2,
                stagePadding: 25,
                margin:40,
            },
            1200: {
                items:2,
                stagePadding: 25,
                margin:60,
                
            }
        }
    })

    $(window).scroll(function(){
        if($(this).scrollTop() > 150) {
            $(".Top-Section .navbar").addClass("changebgnavbar");
            $(".Top-Section .navbar .navbar-brand img").addClass("ChangeSizeImgNav");
        }else if($(this).scrollTop() < 150){
            $(".Top-Section .navbar").removeClass("changebgnavbar");
            $(".Top-Section .navbar .navbar-brand img").removeClass("ChangeSizeImgNav");
        }
    });

    var maxLength = 129;
    var remove = maxLength + 32;
    $(".teachers .BoxTeacherSlider .card .card-text").each(function(){
        var blog = $(this).text();
        // trim() function : Remove whitespace from both sides of a string.
        if($.trim(blog).length > maxLength){
            var newblog = blog.substring(0, remove);
            var removeoldblog = blog.substring(remove, $.trim(blog).length);
            $(this).empty().html(newblog);
            $(this).append("...")
            
        }
    });

    var maxLength = 129;
    var remove = maxLength + 100;
    $(".opnion .OpinionSlider .item .decribe-opinion").each(function(){
        var blog = $(this).text();
        // trim() function : Remove whitespace from both sides of a string.
        if($.trim(blog).length > maxLength){
            var newblog = blog.substring(0, remove);
            var removeoldblog = blog.substring(remove, $.trim(blog).length);
            $(this).empty().html(newblog);
            $(this).append("...")
            
        }
    });

    var wid = $(window);
    var scrolltop = $("#Toped");
    $(wid).scroll(function () {

        if ($(this).scrollTop() > 450) {
            scrolltop.addClass("Toped_show");
        }
        else if ($(this).scrollTop() <= 300){
            scrolltop.removeClass("Toped_show");
        }
    })
    scrolltop.click(function () {
        $("html,body").animate({scrollTop : 0},10);
    });


    // This is Change Active Item in navbar ..
    const currentlocate = location.href; // Return the Current page..
    const menuItem = document.querySelectorAll('.nav a');
    const menulength = menuItem.length;
    for(let i=0;i<menulength;i++){
        if(menuItem[i].href === currentlocate){
            menuItem[i].classList.add("active")
        }
    }


    var maxLength = 428;
    var remove = maxLength + 100;
    $(".TeachersSection .BoxTeacher .card .card-body .card-text p").each(function(){
        var blog = $(this).text();
        // trim() function : Remove whitespace from both sides of a string.
        if($.trim(blog).length > maxLength){
            var newblog = blog.substring(0, remove);
            var removeoldblog = blog.substring(remove, $.trim(blog).length);
            $(this).empty().html(newblog);
            $(this).append("...")
            
        }
    });
    
    
})
