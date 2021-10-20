@extends('front.app')
@section('bread-crumb')
    <!-- Top About Section | السلايد الذي يكون في الصفحة أسفل الناف بار -->
    <div class="Top-Section-login">
        <div class="BgDark">
            <div class="container-fluid">
                <div class="title">
                    <div class="row">
                        <div class="Describe-Page text-center NotoBold">
                            <h3 class="namePage mb-5">
                                قم بتسجيل الدخول !
                            </h3>
                        </div>
                    </div>
                </div>
                @if(\Illuminate\Support\Facades\Session::has('message'))
                    <div class="alert alert-danger" style="text-align: center">
                        <small>{!! \Illuminate\Support\Facades\Session::get('message') !!}</small>
                    </div>
                @endif
                <div class="FormLogin">
                    <form action="{{route('auth.student_login.submit')}}" method="POST" class="mx-auto">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 input mb-4">
                                <input type="email" name="email" required class="form-control border-0 DeleteEffects text-start NotoRegular" placeholder="البريد الإلكتروني">
                            </div>
                            <div class="col-md-12 input mb-4">
                                <div class="input-group">
                                    <input id="passwordinput" name="password" type="password" class="form-control border-0 DeleteEffects NotoRegular" placeholder="كلمة المرور">
                                    <button class="btn DeleteEffects border-0 ShowPassword" type="button" id="ShowPassword">
                                        <span class="fa fa-eye"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-12 input mb-4 text-center">
                                <button type="submit"
                                   class="btn text-center littletimeBtn DeleteEffects w-100 bg-primary NotoRegular text-decoration-none">
                                    تسجيل الدخول
                                </button>
                                <!--<input type="submit" class="btn text-center DeleteEffects w-100 bg-primary NotoBold"
                                value="تسجيل الدخول">-->
                            </div>
                            <div class="col-md-12 input">
                                <div class="NotoBold d-flex flex-row align-items-center justify-content-between">
                                    <div class="remmber">
                                        <label class="d-flex flex-row align-items-center">
                                            <input type="checkbox" name="remember" value="{{ old('remember') ? 'checked' : '' }}" class="border-0 DeleteEffects">
                                            <span class="ms-2">تذكرني</span>
                                        </label>
                                    </div>
{{--                                    <div class="link NotoRegular">--}}
{{--                                        <a class="text-decoration-none text-white" href="forgetPassword.html">--}}
{{--                                            <span>هل نسيت كلمة المرور ؟</span>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="RegisterSection text-center">
                        <small class="NotoBold">
                            لا تمتلك حساب ؟
                            <a class="text-decoration-none text-white border-bottom text-white" href="{{route('auth.student_register')}}">
                                سجل الآن
                            </a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
