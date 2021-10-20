@extends('front.app')
@section('content')
    <div class="SettingSection">
        <div class="container-fluid">
            <div class="BoxSetting">
                <div class="top-header mb-4">
                    <h5 class="NotoBold">تعديل البيانات</h5>
                </div>
                <div class="Section-Data">
                    <form action="{{route('front.student_profile_update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" hidden name="user_id" value="{{auth('web')->user()->id}}">
                    <div class="row">
                        <div class="col-md-3 col-12 SideSection border-end">
                            <div id="imgdisplay" class="img-stduent mx-auto position-relative"
                                 style="background-image: url('{{ auth()->user()->image != null ? asset('storage/student_images/'.auth('web')->user()->image):asset('front/img/Student/noimage.png')}}');">
                                <div class="image-upload d-flex align-items-center">
                                    <label for="file-input">
                                        <i class="fa fa-pen" style="cursor: pointer;"></i>
                                    </label>
                                    <input name="image" id="file-input" type="file" style="visibility:hidden;"/>
                                </div>
                            </div>


                            <div class="name-stduent NotoBold text-center mt-4 mb-4">
                                <h5>{{auth('web')->user()->name}}</h5>
                            </div>
                            <div class="SideNavbar">
                                <a href="{{route('front.myCourses')}}"
                                   class="nav-link notactive w-100 text-decoration-none pt-3 pb-3 border-bottom
                                  NotoRegular text-center">موادي</a>
                                <a href="{{route('front.student_profile')}}"
                                   class="nav-link active w-100 text-decoration-none pt-3 pb-3 border-bottom
                                  NotoRegular text-center">الحساب</a>
                                <a href="{{route('front.student_password_update')}}"
                                   class="nav-link notactive w-100 text-decoration-none pt-3 pb-3 border-bottom
                                   NotoRegular text-center">كلمة المرور</a>
                            </div>
                        </div>
                        <div class="col-md-9 col-12 SideData pb-4">
                            <div class="FormData">
                                <div class="title-form mb-4">
                                    <h6 class="NotoBold">بيانات الطالب</h6>
                                </div>
                                <div class="form">
                                        <div class="row mb-4">
                                            <div class="col-md-6 col-12 input mb-4">
                                                <div class="box w-75 me-auto">
                                                    <label class="NotoRegular mb-3">الإسم الأول</label>
                                                    <input type="text" class="NotoRegular form-control DeleteEffects pt-2 pb-2 me-auto"
                                                           placeholder="الإسم" value="{{auth('web')->user()->name}}"  name="name">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 input mb-4">
                                                <div class="box w-75 ms-auto">
                                                    <label class="NotoRegular mb-3">المدرسة</label>
                                                    <input type="text" class="NotoRegular form-control DeleteEffects pt-2 pb-2 me-auto"
                                                           placeholder="المدرسة" value="{{auth('web')->user()->school}}" name="school">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 input mb-4">
                                                <div class="box w-75 me-auto">
                                                    <label class="NotoRegular mb-3">العنوان</label>
                                                    <input type="text" class="NotoRegular form-control DeleteEffects pt-2 pb-2 me-auto"
                                                           placeholder="العنوان" value="{{auth('web')->user()->address}}"  name="address">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 input mb-4">
                                                <div class="box w-75 ms-auto">
                                                    <label class="NotoRegular mb-3">المعدل</label>
                                                    <input type="text" class="NotoRegular form-control DeleteEffects pt-2 pb-2 me-auto"
                                                           placeholder="المعدل" value="{{auth('web')->user()->gpa}}" name="gpa">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 input mb-4">
                                                <div class="box w-75 me-auto">
                                                    <label class="NotoRegular mb-3">رقم الجوال</label>
                                                    <input type="tel" class="text-start form-control DeleteEffects pt-2 pb-2 me-auto"
                                                           placeholder="رقم الجوال" value="{{auth('web')->user()->mobile_number}}" name="mobile_number">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 input mb-5">
                                                <div class="box w-75 ms-auto">
                                                    <label class="NotoRegular mb-3">البريد الإلكتروني</label>
                                                    <input type="email" class="text-start form-control DeleteEffects pt-2 pb-2 me-auto"
                                                           placeholder="البريد الإلكتروني" value="{{auth('web')->user()->email}}" name="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="link-Edit DeleteEffects text-end mb-2 d-flex flex-row justify-content-end">
                                            <a href="{{route('front.index')}}" style="width: 90px;border-radius: 3px;"
                                               class="nav-link cancel text-decoration-none pt-2 pb-2 ps-4 pe-4 text-white
                                                 NotoRegular text-center">الغاء</a>
                                            <button type="submit" style="width: 90px;border-radius: 3px;"
                                               class="nav-link text-decoration-none border-0 pt-2 pb-2 ps-4 pe-4 text-white
                                                  bg-primary NotoRegular text-center ms-3">حفظ</button>
                                            <!-- This is Used when Contact with Back End -->
                                            <!--<input type="submit" style="width: 90px;border-radius: 3px;"
                                          class="nav-link text-decoration-none border-0 pt-2 pb-2 ps-4 pe-4 text-white
                                           bg-primary NotoRegular text-center ms-3" value="حفظ" name="editbtn">-->
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
