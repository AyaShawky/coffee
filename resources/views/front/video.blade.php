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
                        سلسلة حلقات مشروع رؤانا للإبداع التربوي
                    </h2>
                    <p class="mx-auto mb-0 NotoRegular" style="    width: 71%;font-size: 12pt
                    ">
                        " سلسلة حلقات مشروع رؤانا هو مبادرة من الدكتور وليد الاغا وهو عبارة عن محتوى علمي للطلاب يعمل على حل مشاكل الطلبة في الجانب الإداري عبر تنظيم الوقت وادرة المهام والعديد من النقاط الأخرى لمساعدة الطالب للوصول الى التفوق والامتياز , وللعام السادس يطبق هذا المشروع ويصل الى العديد من الطلاب لمساعدتهم على تحقيق طموحهم والنجاح بأعلى الدرجات . "
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
                        <span class="ms-3 me-3">المحتوى العلمي</span>
                        <img src="{{asset('front/img/Public/pointTitleLeft.svg')}}">
                    </h3>
                </div>


              <div class="WelcomeSection pt-5">
             <div class="row">
             <div class="col-lg-6 col-md-12 col-12 videoStaff "  >
              <div class="box position-relative h-100">
               <div style="padding:56.25% 0 0 0;position:relative;">

                <iframe src="https://player.vimeo.com/video/634847446"
                width="640" height="564" frameborder="0" allow="autoplay;
                 fullscreen" allowfullscreen
                 style="position:absolute;top:0;left: 88px;width: 561px;height: 308px;"></iframe>

                    </div>

                </div>
                <p style="
                font-size: 22px;
                padding: 10px 0px  7px  0;
                font-weight: 600;
            ">مقدمة  </p>
              </div>

                <div class="col-lg-6 col-md-12 col-12 videoStaff "  >
                    <div class="box position-relative h-100">
                     <div style="padding:56.25% 0 0 0;position:relative;">
                        <iframe src="https://player.vimeo.com/video/632407839"
                         width="640" height="564" frameborder="0" allow="autoplay;
                         fullscreen" allowfullscreen
                         style="position:absolute;top:0;left: -18px;width: 561px;height: 308px;"></iframe>
                     </div>
                      </div>
                      <p style="
                font-size: 22px;
                padding: 10px 0px  7px  0;
                font-weight: 600;
            ">المحاضرة الاولى </p>
                      </div>

                </div>
                </div>




        </div>
        </div>
    </div>


@endsection
