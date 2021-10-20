@extends('front.app')
@section('content')
    <!-- Course Section Course Page | قسم تفاصيل المادة في صفحة المواد -->
    <div class="CourseDetailSection">
        <div class="video-section position-relative" style="z-index: 99999999 !important;">

            <div class="video">

                <iframe src="https://player.vimeo.com/video/"
                        id="video"
                        style="display: block; background: #000; border: none; height: 100vh; width: 100%;"
                        frameborder="0" webkitallowfullscreen mozallowfullscreen
                        allow="autoplay; fullscreen" allowfullscreen></iframe>

                <script src="https://player.vimeo.com/api/player.js"></script>

            </div>
        </div>

        <div class="detial-course mt-5 mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-12 box-lecture">
                        <div class="describe-course d-flex flex-row justify-content-between">
                            <h5 class="NotoBold pb-4 mb-4">
                                <span class="pb-2">محتويات المادة</span>
                            </h5>
                            <div class="data-time-course NotoRegular">
                                <span class="count-video me-3 ms-3"><b class="ArialBold"></b> دروس</span>
                            </div>
                        </div>
                        <div class="video">
                            <div class="video-lecture accordion" id="AccordtionLectures">
                                @foreach($courses as $key=>$topic)

                                <div class="accordion-item @if($key == 0) activeitem @endif">
                                        <h2 class="accordion-header border-bottom NotoBold" id="{{$topic->id}}">
                                            <button class="accordion-button DeleteEffects pt-4 pb-4 btnShow " type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#ID{{$topic->id}}" aria-expanded="@if($key == 0) true @else false @endif" aria-controls="ID{{$topic->id}}">
                                                <i class="icon-show fas fa-plus me-3"></i>
                                                <span>{{$topic->name}}</span>
                                            </button>
                                        </h2>
                                        <div class="accordion-collapse collapse @if($key == 0) show @endif" id="ID{{$topic->id}}">
                                            <div class="accordion-body p-0" style="height: auto;">
                                                @foreach($topic->lessons as $lesson)
                                                    <div class="lecture pt-4 pb-4 pe-4 ps-5 border-bottom">
                                                        <a href="" class="text-decoration-none d-flex flex-row justify-content-between">
                                                            <div class="name-lecture">
                                                                <i class="far fa-play-circle pe-2"></i>
                                                                <span class="NotoRegular">{{$lesson->name}}</span>
                                                            </div>
                                                              <div class="time-lecture">
                                                                  <b class="time ArialBold">40:00</b>
                                                        </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="describe-teacher" style="margin-bottom: 80px;">
            <div class="container-fluid">
                <div class="title-section" style="margin-bottom: 40px;">
                    <h5 class="NotoBold">
                        <span class="pb-2">مدرس المادة</span>
                    </h5>
                </div>
                <div class="data-teacher">
                    <div class="d-flex flex-row align-items-md-center align-items-sm-start">
                        <div class="img-teacher">
                            <img src="{{asset('storage/teacher_images/')}}" style="    width: 230px;
    height: 151px;">
                        </div>
                        <div class="data ms-4">
                            <h6 class="NotoBold mb-3">الأستاذ / محمد الاغا</h6>
                            <p class="NotoRegular">
                                {{-- {{$course->teacher->bio}} --}}
                                يقدم المدرس في هذه المنصة شرح مفصل لكافة الدرورس في المنهاج و مراجعة تأسيسية كاملة لمحتوى الصف العاشر و الحادي عشر , كما أنه تم حل جميع أسئلة الدروس و الوحدات بشكل كامل , كما أن المدرس يعمل على إضافة العديد من  الأسئلة الخارجية من الإختبارت السابقة و المواد الإثرائية الخارجية , بهذا يكون المدرس قد قدم كل ما يلزم الطالب للوصول الى العلامة الكاملة و الإمتياز .
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
