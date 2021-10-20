@extends('front.app')
@section('content')
    <div class="SettingSection">
        <div class="container-fluid">
            <div class="BoxSetting">
                <div class="top-header mb-4">
                    <h5 class="NotoBold">موادي المسجلة</h5>
                </div>
                <div class="Section-Data">
                    <div class="row">
                        <div class="col-md-3 col-12 SideSection border-end">
                            <div class="img-stduent mx-auto" style="background-image: url('{{asset('storage/student_images/'.auth('web')->user()->image)}}');">
                            </div>
                            <div class="name-stduent NotoBold text-center mt-4 mb-4">
                                <h5>{{auth('web')->user()->name}}</h5>
                            </div>
                            <div class="SideNavbar">
                                <a href="{{route('front.myCourses')}}"
                                   class="nav-link active w-100 text-decoration-none pt-3 pb-3 border-bottom
                                  NotoRegular text-center">موادي</a>
                                <a href="{{route('front.student_profile')}}"
                                   class="nav-link notactive w-100 text-decoration-none pt-3 pb-3 border-bottom
                                  NotoRegular text-center">الحساب</a>
                                <a href="{{route('front.student_password_update')}}"
                                   class="nav-link notactive w-100 text-decoration-none pt-3 pb-3 border-bottom
                                   NotoRegular text-center">كلمة المرور</a>
                            </div>
                        </div>
                        <div class="col-md-9 col-12 SideData  p-5">
                            <div class="FormData">
                                <div class="table-course">
                                    <table class="table table-hover table-striped table-responsive text-center">
                                        <tr class="NotoBold text-dark">
                                            <th class="ArialBold">#</th>
                                            <th>المادة</th>
                                            <th>اسم المدرس</th>
                                            <th>عرض المادة</th>
                                        </tr>
                                        @foreach(auth('web')->user()->registeredCourses as $course)
                                        <tr class="NotoRegular text-dark">
                                            <th class="ArialBold">1</th>
                                            <th>{{$course->name}}</th>
                                            <th>{{$course->teacher->name}}</th>
                                            <th>
                                                <a style="width: 20px;height: 20px;border-radius: 10px;"
                                                   href="{{route('front.courseDetail',$course->id)}}" class="text-decoration-none text-white bg-primary pe-3 ps-3">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </th>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection