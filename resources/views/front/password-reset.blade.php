@extends('front.app')
@section('content')
    <div class="SettingSection">
        <div class="container-fluid">
            <div class="BoxSetting">
                <div class="top-header mb-4">
                    <h5 class="NotoBold">إعدادات كلمة المرور</h5>
                </div>
                <div class="Section-Data">
                    <div class="row">
                        <div class="col-md-3 col-12 SideSection border-end">
                            <div class="img-stduent mx-auto" style="background-image: url('{{ auth()->user()->image != null ? asset('storage/student_images/'.auth('web')->user()->image):asset('front/img/Student/noimage.png')}}');">
                            </div>
                            <div class="name-stduent NotoBold text-center mt-4 mb-4">
                                <h5>{{auth('web')->user()->name}}</h5>
                            </div>
                            <div class="SideNavbar">
                                <a href="{{route('front.myCourses')}}"
                                   class="nav-link notactive w-100 text-decoration-none pt-3 pb-3 border-bottom
                                  NotoRegular text-center">موادي</a>
                                <a href="{{route('front.student_profile')}}"
                                   class="nav-link  w-100 text-decoration-none pt-3 pb-3 border-bottom
                                  NotoRegular notactive text-center">الحساب</a>
                                <a href="{{route('front.student_password_update')}}"
                                   class="nav-link active  w-100 text-decoration-none pt-3 pb-3 border-bottom
                                   NotoRegular text-center">كلمة المرور</a>
                            </div>
                        </div>
                        <div class="col-md-9 col-12 SideData pb-4">
                            <div class="FormData">
                                <div class="title-form mb-4">
                                    <h6 class="NotoBold">إعدادات كلمة المرور</h6>
                                </div>
                                <div class="form">
                                    <form action="{{route('front.student_password_update')}}" method="POST">
                                        @csrf
                                        <div class="row mb-4">
                                            <div class="col-md-6 col-12 input mb-4">
                                                <div class="box w-75 me-auto">
                                                    <label class="NotoRegular mb-3"> كلمة المرور القديمة</label>
                                                    <div class="input-group">
                                                        <input type="password" id="oldpass" class="form-control DeleteEffects NotoRegular border-end-2" name="old_password" placeholder="كلمة المرور">
                                                        <button class="btn DeleteEffects ShowPassword border-end border-top border-bottom" type="button" id="ShowOldPassword">
                                                            <span class="fa fa-eye"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 input mb-4">

                                            </div>
                                            <div class="col-md-6 col-12 input mb-4">
                                                <div class="box w-75 me-auto">
                                                    <label class="NotoRegular mb-3"> كلمة المرور الجديدة</label>
                                                    <div class="input-group">
                                                        <input type="password" id="newpass" class="form-control DeleteEffects NotoRegular border-end-2" name="password" placeholder="كلمة المرور الجديدة">
                                                        <button class="btn DeleteEffects ShowPassword border-end border-top border-bottom" type="button" id="ShowNewPassword">
                                                            <span class="fa fa-eye"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 input mb-5">
                                                <div class="box w-75 ms-auto">
                                                    <label class="NotoRegular mb-3">تأكيد كلمة المرور الجديدة</label>
                                                    <input type="password"
                                                           class="NotoRegular text-start form-control DeleteEffects pt-2 pb-2 me-auto"
                                                           placeholder="تأكيد كلمة المرور الجديدة" value="" name="password_confirmation">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="link-Edit DeleteEffects text-end mb-2 d-flex flex-row justify-content-end">
                                            <a href="{{route('front.index')}}" style="width: 90px;border-radius: 3px;"
                                               class="nav-link cancel text-decoration-none pt-2 pb-2 ps-4 pe-4 text-white
                                                 NotoRegular text-center">الغاء</a>
                                            <button type="submit" style="width: 90px;border-radius: 3px;"
                                               class="nav-link text-decoration-none border-0 pt-2 pb-2 ps-4 pe-4 text-white
                                                  bg-primary NotoRegular text-center ms-3">تحديث</button>
                                            <!-- This is Used when Contact with Back End -->
                                            <!--<input type="submit" style="width: 90px;border-radius: 3px;"
                                          class="nav-link text-decoration-none border-0 pt-2 pb-2 ps-4 pe-4 text-white
                                           bg-primary NotoRegular text-center ms-3" value="تحديث" name="editbtn">-->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
