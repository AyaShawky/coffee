@extends('front.app')
@section('bread-crumb')
    <!-- Top About Section | السلايد الذي يكون في الصفحة أسفل الناف بار -->
    <div class="Top-Section-course">
        <div class="BgDark">
            <div class="container-fluid">
                <div class="row">
                    <div class="TabPage NotoRegular">

                    </div>
                    <div class="Describe-Page mt-5 text-center NotoBold">
                        <h2 class="namePage mb-4">
                            المواد
                        </h2>
                        <p class="mx-auto mb-0 NotoRegular">
                            " يمكنك الان التنقل بين المواد المقررة لكلا الفرعين بكل سلاسة
                            و الضغط على المادة لرؤية تفاصيل المادة بالكامل "
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Course Section Course Page | قسم المواد في صفحة المواد -->
    <div class="CourseSection">
        <div class="container-fluid">
            <div class="row">
                <!-- Search Section Course Page | قسم البحث في صفحة المواد -->
                <div class="col-12 SearchBox">
                    <div class="box bg-primary mx-auto">
                        <div class="FormSearch">
                            <form class="form" action="{{route('front.courses')}}" method="GET">
                                <div class="input-group NotoRegular">
                                    <input type="text" name="search" value="{{request()->search}}" class="form-control" placeholder=" ابحث في المواد !">
                                    <input type="submit" value="بحث" class="btn ms-2">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="CourseBox">
            <div class="top">
                <div class="container-fluid">
                    <div class="top-section">

                    </div>
                </div>
            </div>

            <div class="Boxs">
                <div class="container-fluid">
                    <div class="row">
                        @foreach($courses as $course)
                            <div class="col-md-6 col-12 box">
                                <div class="card border-0">
                                    <div class="card-img">
                                        <img src="{{asset('storage/course_images/'.$course->image)}}" class="w-100">
                                    </div>
                                    <div class="card-body p-0 pt-4">
                                        <div class="card-padd p-3">
                                            <div class="card-title">
                                                <h6 class="m-0 NotoBold border-bottom pb-3 me-auto" style="width: 90%;">
                                                    {{$course->name}}
                                                </h6>
                                            </div>
                                            <div class="card-text NotoRegular pt-1">
                                                <p class="m-0">
                                                    {{$course->description}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card-btn mt-2">
                                            <a href="{{route('front.courseDetail',$course->id)}}" class="btn w-100 NotoRegular btn-primary">
                                                عرض التفاصيل
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
