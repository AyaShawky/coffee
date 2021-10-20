<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <!-- Meta Files -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="tag" content="">
    <meta name="keywords" content="">

    <!-- Meta Files -->

    <!-- Title Files -->
    <title>A+ Platform</title>
    <link rel="icon" href="{{asset('front/img/LogosSite/LOGO-01.svg')}}">
    <!-- Title Files -->
    <!-- Css Files -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/Font.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/media.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/SettingNavbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/message.css')}}">
    @yield('page-styles')


</head>
<body>

<!-- Go To top when click -->
<!-- Go To top when click -->
<div class="Toped" id="Toped"><i class="fa fa-chevron-up"></i></div>
<!-- Go To top when click -->
<!-- contact Section Home Page | قسم أيقونات التواصل في الصفحة الرئيسية -->
<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            facebook: "108963404815512", // Facebook page ID
            whatsapp: "+970593676865", // WhatsApp number
            call_to_action: "تواصل معنا", // Call to action
            button_color: "#129BF4", // Color of button
            position: "left", // Position may be 'right' or 'left'
            order: "facebook,whatsapp", // Order of buttons
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->
<!-- Go To top when click -->

<!-- Top Section Content In :
        1- Navbar
        2- Index Slider In Home page
        يحتوي القسم العلوي للموقع على قائمة التنقل والسلايدر الرئيسي في الصفحة الرئيسية للموقع
 -->
<div class="Top-Section">
    <!-- Navbar Home Page | قائمة التنقل الخاصة بالصفحة الرئيسية -->
    @if(auth('web')->check())
        <div class="navbar navbar-expand-lg fixed-top Top-Navbar-Account">
            <div class="container-fluid">
                <a class="navbar-brand DeleteEffects" href="{{route('front.index')}}">
                    <img src="{{asset('front/img/LogosSite/LOGO-01.svg')}}">
                </a>
                <button class="navbar-toggler DeleteEffects" type="button" data-bs-toggle="collapse"
                        data-bs-target="#NavElearning" aria-controls="NavElearning">
                    <span class="fa fa-bars text-white"></span>
                </button>
                <div class="collapse navbar-collapse" id="NavElearning">
                    <ul class="navbar-nav nav NotoBold ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('front.index')}}">
                                    <span class="pb-2">
                                        الرئيسية
                                    </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('front.about')}}">
                                <span class="pb-2">من نحن</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('front.courses')}}">
                                    <span class="pb-2">
                                        المواد
                                    </span>
                            </a>
                        </li>
                        <li class="nav-item teacher position-relative">
                            <a class="nav-link" href="{{route('front.teachers')}}">
                                    <span class="pb-2">
                                        المدرسين
                                    </span>
                            </a>
                        </li>

                    </ul>
                    <ul class="navbar-nav nav NotoBold ms-auto top-navigate">
                        <li class="nav-item">
                            <div class="dropdown">
                                <a
                                        class="dropdown-toggle NotoRegular text-decoration-none text-white
                                     d-flex flex-row align-items-center justify-content-center" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="img-user">
                                        <img src="{{ auth()->user()->image != null ? asset('storage/student_images/'.auth('web')->user()->image):asset('front/img/Student/noimage.png')}}" style="width: 3.5rem;border-radius: 50%;">
                                    </div>
                                    <span class="ps-3">{{auth('web')->user()->name}}</span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item NotoRegular mb-2" href="{{route('front.myCourses')}}">
                                            <i class="far fa-user-circle"></i><span class="ps-2">حسابي</span></a>
                                    </li>
{{--                                    <li><a class="dropdown-item NotoRegular mb-2" href="{{route('front.chat')}}">--}}
{{--                                            <i class="fa fa-sliders-h"></i><span class="ps-2">مركز التواصل</span></a>--}}
{{--                                    </li>--}}
                                    <li><a class="dropdown-item NotoRegular text-danger mb-2" href="{{route('auth.student_logout')}}">
                                            <i class="fas fa-sign-out-alt"></i><span class="ps-2">تسجيل الخروج</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <a href="{{route('front.chat')}}" class="btn btn-primary" style="border-radius: 50%;margin: 15px;"><i class="fa fa-paper-plane"></i></a>

                </div>
            </div>
        </div>
    @else
        <div class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand DeleteEffects" href="{{route('front.index')}}">
                    <img src="{{asset('front/img/LogosSite/LOGO-01.svg')}}">
                </a>
                <button class="navbar-toggler DeleteEffects" type="button" data-bs-toggle="collapse"
                        data-bs-target="#NavElearning" aria-controls="NavElearning">
                    <span class="fa fa-bars text-white"></span>
                </button>
                <div class="collapse navbar-collapse" id="NavElearning">
                    <ul class="navbar-nav nav NotoBold ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('front.index')}}">
                                    <span class="pb-2">
                                        الرئيسية
                                    </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('front.about')}}">
                                <span class="pb-2">من نحن</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('front.courses')}}">
                                    <span class="pb-2">
                                        المواد
                                    </span>
                            </a>
                        </li>
                        <li class="nav-item me-3 teacher position-relative">
                            <a class="nav-link" href="{{route('front.teachers')}}">
                                    <span class="pb-2">
                                        المدرسين
                                    </span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('auth.student_login')}}">
                                <span class="pb-2">تسجيل الدخول</span>
                            </a>
                        </li>
                        <li class="nav-item ms-4">
                            <a class="nav-link btn registerBtn" href="{{route('auth.student_register')}}">التسجيل</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    @endif

    @yield('bread-crumb')
</div>


@yield('content')
@include('sweetalert::alert')



<!-- Footer Section Home Page | قسم تذييل الصفحة - النهاية في الصفحة الرئيسية -->
<div class="footer">
    <div class="container-fluid">
        <div class="topSection mb-4">
            <div class="row">
                <div class="col-lg-4 col-12 col-12 DescribeContact">
                  <img src="https://aplus.ps/front/img/LogosSite/LOGO-01.svg" class="mb-3" style="
    width: inherit;
">
                    <div class="describe NotoRegular">
                        المنصة التعليمية الأولى على مستوى الوطن
                        الخاصة بتقديم دورات لطلاب الثانوية العامة
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 SocialContact d-flex justify-content-center align-items-end">
                    <div class="info">
                        <h6 class="NotoRegular header mb-4">
                            <span class="BorderBottom pb-2">تابعنا عبر منصات التواصل الاجتماعي</span>
                        </h6>
                        <div class="SocialLink d-flex">
                            <a href="
                            https://www.instagram.com/Aplustawjihi" class="text-decoration-none">
                                <i class="fab fa-instagram d-flex align-items-center justify-content-center"></i>
                            </a>
                            <a href="#" class="text-decoration-none">
                                <i class="fa fa-envelope d-flex align-items-center justify-content-center"></i>
                            </a>
                            <a href="https://www.facebook.com/Aplustawjihi" class="text-decoration-none">
                                <i class="fab fa-facebook-f d-flex align-items-center justify-content-center"></i>
                            </a>
                            <a href="https://api.whatsapp.com/send?phone=970593676865" class="text-decoration-none">
                                <i class="fab fa-whatsapp d-flex align-items-center justify-content-center"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 ContactInfo d-flex justify-content-end">
                    <div class="Info">
                        <h6 class="NotoBold header">
                            <span><span class="borderBottom">معلومات ا</span>لإتصال</span>
                        </h6>
                        <div class="ContactLink">
                            <div class="link NotoRegular"><i class="fa fa-map-marker-alt"></i><span>غزة -المجلس التشريعي -عمارة حرارة -الطابق 4</span></div>
                            <div class="link"><i class="fa fa-phone"></i><span>0593676865</span></div>
                            <div class="link mb-0"><i class="fa fa-envelope"></i><span>aplusplatform2021@gmail.com</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="copyright">
            <hr class="m-0">
            <div class="row">
                <div class="col-12 text-center mt-2 mb-2 text">
                    <small>
                        <span class="NotoBold"> جميع الحقوق محفوظة &copy; ايه بلس</span>
                        <span class="date" style="font-weight: bold;">2021</span>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JS Files -->
<script rel="script" type="text/javascript" src="{{asset('front/js/jquery-3.5.1.min.js')}}"></script>
<script rel="script" type="text/javascript" src="{{asset('front/js/wow.min.js')}}"></script>
<script rel="script" type="text/javascript" src="{{asset('front/js/owl.carousel.min.js')}}"></script>
<script rel="script" type="text/javascript" src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script rel="script" type="text/javascript" src="{{asset('front/js/popper.min.js')}}"></script>
<script rel="script" type="text/javascript" src="{{asset('front/js/numscroller-1.0.js')}}"></script>
<script rel="script" type="text/javascript" src="{{asset('front/js/main.js')}}"></script>
<script rel="script" type="text/javascript" src="{{asset('front/js/Load.js')}}"></script>
<script rel="" type="text/javascript">
    animItemSlider = new WOW({
        mobile: true
    })
    animItemSlider.init();
</script>
<script>
    $(".modal ").click(function(){
        $('.modal .modal-content video').trigger('pause');
    })
</script>
<script>
    $("#PlayVideo").click(function(){
        $("#video").trigger('play');
        $("#PlayVideo").addClass("HideSection")
    });
</script>
<script>

    $('#certificate').on('input', function (evt) {
        var valueFile = $('#certificate');
        if (valueFile.length == 0){
            $("#input_validate").text("الرجاء إدراج صورة لشهادة الحادي عشر")
        }else{
            $("#input_validate").text("تم إدراج الصورة")
        }
    });
</script>

<script>
    var showpass = false;
    $('#ShowPassword').on('click', function () {
        if(showpass == false) {
            $("#passwordinput").attr('type', "text");
            showpass = true;
        }else if(showpass == true){
            $("#passwordinput").attr('type', "password");
            showpass = false;
        }
    })
</script>

<script>
    document.getElementById('file-input').addEventListener('change', readURL, true);
    function readURL(){
        var file = document.getElementById("file-input").files[0];
        var reader = new FileReader();
        reader.onloadend = function(){
            document.getElementById('imgdisplay').style.backgroundImage = "url(" + reader.result + ")";
        }
        if(file){
            reader.readAsDataURL(file);
        }else{
        }
    }
</script>

<script>
    var showoldpass = false;
    $('#ShowOldPassword').on('click', function () {
        if(showoldpass == false) {
            $("#oldpass").attr('type', "text");
            showoldpass = true;
        }else if(showoldpass == true){
            $("#oldpass").attr('type', "password");
            showoldpass = false;
        }
    })

    var shownewpass = false;
    $('#ShowNewPassword').on('click', function () {
        if(shownewpass == false) {
            $("#newpass").attr('type', "text");
            shownewpass = true;
        }else if(shownewpass == true){
            $("#newpass").attr('type', "password");
            shownewpass = false;
        }
    })

</script>

@yield('page-scripts')

<!-- JS Files -->

</body>
</html>
