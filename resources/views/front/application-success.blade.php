@extends('front.app')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="SettingSection forgetSection" >
        <div class="container-fluid">
            <div class="BoxSetting">
                <div class="icon-success text-center mb-5 text-success">
                    <img src="{{asset('front/img/Public/check.svg')}}">
                </div>
                <div class="top-header mb-5">
                    <h5 class="NotoBold text-center">تم تقديم الطلب بنجاح الرجاء الأنتظار حتى يتم الموافقة على الطلب</h5>
                </div>
                <div class="Btnredirect text-center">
                    <a href="{{route('front.index')}}" class="btn btn-outline-primary p-3 pe-4 ps-4 NotoBold">عودة للرئيسية</a>
                </div>
            </div>
        </div>
    </div>
@endsection