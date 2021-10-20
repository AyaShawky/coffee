@extends('front.app')
@section('bread-crumb')
    <!-- Top About Section | السلايد الذي يكون في الصفحة أسفل الناف بار -->
    <div class="Top-Section-Register">
        <div class="BgDark">
            <div class="container-fluid">
                <div class="title">
                    <div class="row">
                        <div class="Describe-Page text-center NotoBold">
                            <h3 class="namePage mb-5">
                                قم بإنشاء حساب !
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="FormLogin">
                    <form action="{{route('auth.student_register.submit')}}" method="POST" class="mx-auto">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 input mb-4">
                                <input type="text" name="name" required value="{{old('name')}}" class="form-control border-0 DeleteEffects text-start NotoRegular" placeholder="الاسم بالكامل">
                            </div>
                            <div class="col-md-12 input mb-4">
                                <input type="email" name="email" required value="{{old('email')}}" class="form-control border-0 DeleteEffects text-start NotoRegular" placeholder="البريد الإلكتروني">
                            </div>
                            <div class="col-md-6 input mb-4">
                                <input type="text" name="school" required value="{{old('school')}}" class="form-control border-0 DeleteEffects text-start NotoRegular" placeholder="اسم المدرسة">
                            </div>
                            <div class="col-md-6 input mb-4">
                                <input type="text" name="gpa" required value="{{old('gpa')}}" class="form-control border-0 DeleteEffects text-start NotoRegular" placeholder="المعدل الصف الحادي عشر">
                            </div>
                            <div class="col-md-12 input mb-4">
                                <input type="text" name="address" required value="{{old('address')}}" class="form-control border-0 DeleteEffects text-start NotoRegular" placeholder="عنوان السكن">
                            </div>
                            <div class="col-md-12 input mb-4">
                                <input type="text" name="mobile_number" required value="{{old('mobile_number')}}" class="form-control border-0 DeleteEffects text-start NotoRegular" placeholder="رقم الجوال">
                            </div>
                            <div class="col-md-12 input mb-4">
                                <input type="password" name="password" required class="form-control border-0 DeleteEffects text-start NotoRegular" placeholder="كلمة المرور">
                            </div>
                            <div class="col-md-12 input mb-4">
                                <input type="password" name="password_confirmation" required class="form-control border-0 DeleteEffects text-start NotoRegular" placeholder="تأكيد كلمة المرور">
                            </div>

                            <div class="col-md-12 input mb-4 text-center">
                                <button type="submit"
                                   class="btn text-center littletimeBtn DeleteEffects w-100 bg-primary NotoRegular text-decoration-none">
                                    إنشاء حساب
                                </button>
                                <!--<input type="submit" class="btn text-center DeleteEffects w-100 bg-primary NotoBold"
                                value="إنشاء حساب">-->
                            </div>
                        </div>
                    </form>
                    <div class="RegisterSection text-center">
                        <small class="NotoBold">
                            هل لديك حساب ؟
                            <a class="text-decoration-none text-white border-bottom text-white" href="{{route('auth.student_login')}}">
                                سجل الدخول
                            </a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




