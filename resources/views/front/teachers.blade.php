 @extends('front.app')
@section('bread-crumb')
    <!-- Top Slider Teachers Page | السلايد الذي يكون في الصفحة أسفل الناف بار -->
    <div class="TopSectionTeacher">
        <div class="container-fluid">
            <div class="row">
                <div class="TabPage NotoRegular">

                </div>
                <div class="Describe-Page text-center NotoBold">
                    <h2 class="namePage mb-4">
                        المدرسين
                    </h2>
                    <p class="mx-auto mb-0 NotoRegular">
                        " تمتلك منصتنا طاقم أكاديمي تدريسي متميز يمتلك
                        خبرة عشرات السنين تفوق على أيديهم العديد من المتفوقين "
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Teachers Section Home Page | قسم المعلمين في صفحة المدرسين -->
    <div class="TeachersSection">
        <div class="container-fluid">
            <div class="top-section">
                <h3 class="TitleSection NotoBold text-center d-flex flex-row align-items-center justify-content-center">
                    <img src="{{asset('front/img/Public/pointTitleRight.svg')}}">
                    <span class="ms-3 me-3">المدرسين</span>
                    <img src="{{asset('front/img/Public/pointTitleLeft.svg')}}">
                </h3>
            </div>

            <div class="BoxTeacher">
                <div class="row">
                    @foreach($teachers as $teacher)
                        <div class="col-lg-4 col-md-6 col-12 box wow fadeInRight">
                            <div class="card border-0">
                                <div class="card-img mx-auto">
                                    <img src="{{asset('storage/teacher_images/'.$teacher->image)}}" class="w-100">
                                </div>
                                <div class="card-body p-0" style="height: 271px;">
                                    <div class="card-title NotoBold m-0 border-bottom">
                                        <ul>
                                            <li>
                                                <span>
                                                    الأستاذ / <span class="name-teacher">{{$teacher->name}}</span>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-text NotoRegular pt-3">
                                        <ul>
                                            <li>
                                                <p style="width: 95%;">
                                                    {{$teacher->bio}}
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="BtnMore NotoBold text-center mt-4 mb-4 DeleteEffects" id="BtnMoreSection">
            <button class="btn btn-outline-primary text-primary" id="BtnMore">
                <h5 class="m-0">عرض المزيد</h5>
            </button>
        </div>
    </div>
@endsection 


