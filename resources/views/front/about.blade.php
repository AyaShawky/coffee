@extends('front.app')
@section('bread-crumb')
    <!-- Top About Section | السلايد الذي يكون في الصفحة أسفل الناف بار -->
    <div class="Top-Section-about">
        <div class="container-fluid">
            <div class="row">
                <div class="TabPage NotoRegular">

                </div>
                <div class="Describe-Page text-center NotoBold">
                    <h2 class="namePage mb-4">
                        من نحن
                    </h2>
                    <p class="mx-auto mb-0 NotoRegular">
                        " منصة تعليمية فلسطينية لطلاب الثانوية العامة تهدف
                        للنهضة الرقمية في مجال التعليم عن بعد وإثراء المعلومات الخالصة "
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <!-- About Section About Page | قسم من نحن في صفحة من نحن -->
    <div class="AboutSection mb-3">
        <!-- Founding Staff Section About Page | قسم الكادر التأسيسي في صفحة من نحن -->
        <div class="FoundingStaff">
            <div class="container-fluid">
                <div class="top-section">
                    <h3 class="TitleSection NotoBold text-center d-flex flex-row align-items-center justify-content-center">
                        <img src="{{asset('front/img/Public/pointTitleRight.svg')}}">
                        <span class="ms-3 me-3">لماذا منصة + A</span>
                        <img src="{{asset('front/img/Public/pointTitleLeft.svg')}}">
                    </h3>
                </div>
                <div class="BoxFoundingStaff">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="box">
                                <h5 class="titlesection NotoBold text-start mb-4">
تعتبر منصتنا قبلة لكل من يبحث عن            
عن التميز و التفوق و تحصيل أفضل الدرجات
                                </h5>
                                <div class="describeSection text-start">
                                    <ul class="NotoRegular">
                                        <li>
                                        <span>شرح المناهج التدريسية وتسجيلها باستخدام الأدوات الحديثة .</span>
                                        </li>
                                        <li>
                                            <span>عقد لقاءات وجاهية للطلبة للرد على الاستفسارات والأسئلة. </span>
                                        </li>
                                        <li>
                                            <span>منح الطلاب بطاقة عضوية يحصل على خصومات من أماكن عدة.</span>
                                        </li>
                                        <li>
                                            <span>يستطيع الطالب مشاهدة الدروس في أي وقت ومن أي مكان.</span>
                                        </li>
                                        <li class="mb-3">
                                            <span>تقديم محتوى علمي من أطباء وخبراء في المجال النفسي والعصبي.</span>
                                        </li>
                                        <li class="mb-3">
                                            <span>عقد لقاءات مراجعة لكل وحدة على البث المباشر. </span>
                                        </li>
                                        <li class="mb-3">
                                            <span>تزويد الطالب باوراق عمل و أسئلة إثرائية. </span>
                                        </li>
                                        <li class="mb-3">
                                            <span>عقد اختبار وجاهي يحاكي الاختبار النهائي.</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12 videoStaff">
                            <div class="box position-relative h-100">
                                <div class="BgImageVideo position-absolute d-flex align-items-center justify-content-center w-100 h-100">
                                    <i data-bs-toggle="modal" data-bs-target="#exampleModal"
                                       class="fas fa-play d-flex align-items-center justify-content-center"></i>
                                    <div class="waves-block position-absolute d-flex  align-items-center justify-content-center">
                                        <div class="waves wave-1"></div>
                                        <div class="waves wave-2"></div>
                                        <div class="waves wave-3"></div>
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="margin-top: 100px;">
                                        <div class="modal-content p-2">
                                            <video class="w-100" controls>
                                                <source src="{{asset('front/Video/Public/Motion.mp4')}}" type="video/mp4">
                                            </video>
                                        </div>
                                    </div>
                                </div>
                                <img src="{{asset('front/img/Public/video.jpg')}}" class="w-100 h-auto" style="height: 372px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Welcome Section About Page | قسم أهلا بكم في أكادميتنا في صفحة من نحن -->
        <div class="WelcomeSection pt-5">
            <div class="container-fluid">
                <div class="top-section">
                    <h3 class="TitleSection NotoBold mb-5 text-center d-flex flex-row align-items-center justify-content-center">
                        <img src="{{asset('front/img/Public/pointTitleRight.svg')}}">
                        <span class="ms-3 me-3">أهلا وسهلا بكم في المنصة</span>
                        <img src="{{asset('front/img/Public/pointTitleLeft.svg')}}">
                    </h3>
                    <div class="describe-top-section text-center">
                        <p class="m-0 NotoBold">طريقك الأمثل نحو التفوق</p>
                    </div>
                </div>
                <div class="BoxWelcome mb-5">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="box">
                                <div class="d-flex flex-row">
                                    <div class="img-section">
                                        <img src="{{asset('front/img/Public/AcadmeicOne.svg')}}">
                                    </div>
                                    <div class="describe-section">
                                        <h5 class="NotoBold mb-4">منصة متصدرة</h5>
                                        <p class="NotoRegular">
                                    تتصدر الواجهة على مستوى القطاع
                                            حيث إنها الفكرة الأولى و المتأصلة في هذا
                                            المجال الرائد و هذا ما يجعلها مميزة و متصدرة
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="box">
                                <div class="d-flex flex-row">
                                    <div class="img-section">
                                        <img src="{{asset('front/img/Public/PerfectTeam.svg')}}">
                                    </div>
                                    <div class="describe-section">
                                        <h5 class="NotoBold mb-4">طاقم مميز</h5>
                                        <p class="NotoRegular">
                                            تمتلك المنصة طاقم  تدريسي مميز ذات
                                            كفاءة عالية أثبت جدارته على مدار السنوات
                                            الماضية في تخريج العديد من الطلاب المميزين
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="box">
                                <div class="d-flex flex-row">
                                    <div class="img-section">
                                        <img src="{{asset('front/img/Public/certifiate.svg')}}">
                                    </div>
                                    <div class="describe-section">
                                        <h5 class="NotoBold mb-4">جوده التعليم</h5>
                                        <p class="NotoRegular">
                                            يتم تقديم فيديوهات تعليمة مفصلة  بجودة عالية واداء متميز من قبل طاقم تدريسي متمكن                                       </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="AcademicNumber text-white">
                    <div class="bgBlued pt-5 pb-4">
                        <div class="top-section-number mb-5">
                            <h3 class="TitleSection mb-4 text-center d-flex flex-row align-items-center justify-content-center">
                                    <span class="BorderBottom">
                                        <b style="font-size: 35px;"> +A </b>
                                        <span class="NotoBold ms-3">منصة متكاملة الأركان
                                        </span>
                                    </span>
                            </h3>
                            <div class="describe-top-section text-center">
                                <p class="mb-0 NotoRegular position-relative">
                                    تمتلك المنصة العديد من وسائل التعلم الحديثة الذي تساعد الطلاب في استخلاص
                                    المعلومة بشكل سهل ومبسط مما يؤهلها لأن تكون متجه لأي طالب متفوق و متميز
                                </p>
                            </div>
                        </div>
                        <div class="BoxNumber">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-12 text-center number-item box mb-3">
                                    <div class="Icon mb-3">
                                        <img src="{{asset('front/img/Public/movieplayer.svg')}}" class="">
                                    </div>
                                    <div class="title mb-2">
                                        <h6 class="NotoBold">فيديو مسجل</h6>
                                    </div>
                                    <div class="Number ArialBold" id="Number">
                                        <!--<h4 class="">-->
                                        <!--        <span class="counter numscroller"-->
                                        <!--              data-min='1' data-max='{{$lessons}}' data-delay="1" data-increment='1'></span>+-->
                                        <!--</h4>-->
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12 text-center number-item box mb-3">
                                    <div class="Icon mb-3">
                                        <img src="{{asset('front/img/Public/graduated.svg')}}" class="">
                                    </div>
                                    <div class="title mb-2">
                                        <h6 class="NotoBold">طالب مسجل</h6>
                                    </div>
                                    <div class="Number ArialBold" id="Number">
                                        <!--<h4 class="">-->
                                        <!--        <span class="counter numscroller"-->
                                        <!--              data-min='1' data-max='{{$users}}' data-delay="1" data-increment='1'></span>+-->
                                        <!--</h4>-->
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12 text-center number-item box mb-3">
                                    <div class="Icon mb-3">
                                        <img src="{{asset('front/img/Public/teacher.svg')}}" class="">
                                    </div>
                                    <div class="title mb-2">
                                        <h6 class="NotoBold">معلم كفاءة</h6>
                                    </div>
                                    <div class="Number ArialBold" id="Number">
                                        <!--<h4 class="">-->
                                        <!--        <span class="counter numscroller"-->
                                        <!--              data-min='1' data-max='{{$teachers}}' data-delay="1" data-increment='1'></span>+-->
                                        <!--</h4>-->
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12 text-center number-item box mb-3">
                                    <div class="Icon mb-3">
                                        <img src="{{asset('front/img/Public/onlinecourse.svg')}}" class="">
                                    </div>
                                    <div class="title mb-2">
                                        <h6 class="NotoBold">مادة أون لاين</h6>
                                    </div>
                                    <div class="Number ArialBold" id="Number">
                                        <!--<h4 class="">-->
                                        <!--        <span class="counter numscroller"-->
                                        <!--              data-min='1' data-max='{{$courses}}' data-delay="1" data-increment='1'></span>+-->
                                        <!--</h4>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
