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
                <div class="icon-success text-center mb-5 text-danger">
                    <img src="{{asset('front/img/Public/error.png')}}" style="height: 300px;width: 300px">
                </div>
                <div class="top-header mb-5">
                    <h5 class="NotoBold text-center">لا يوجد رصيد في حسابك لإتمام هذه العملية !</h5>
                </div>
                <div class="Btnredirect text-center">
                    <a href="{{route('front.index')}}" class="btn btn-outline-primary p-3 pe-4 ps-4 NotoBold">عودة للرئيسية</a>
                </div>
            </div>
        </div>
    </div>
@endsection
