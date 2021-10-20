@extends('front.app')
@section('page-styles')
    @livewireStyles
@endsection
@section('bread-crumb')
    <!-- Top messages Section -->
    <div class="Top-Section-about" style="padding-top: 130px;padding-bottom: 50px;">
        <div class="container-fluid">
            <div class="row">
                <div class="TabPage NotoRegular">
                    <h6>
                        <a class="text-decoration-none text-white" href="{{route('front.index')}}">الصفحة الرئيسية</a>
                        >
                        <span class="TagPage">الرسائل</span>
                    </h6>
                </div>
                <div class="Describe-Page text-center NotoBold">
                    <h2 class="namePage mb-4">
                        الرسائل
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @livewire('student-chat',['teachers'=>$teachers])
@endsection

@section('page-scripts')
    @livewireScripts
@endsection
