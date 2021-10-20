@extends('dashboard.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold font-grey-gallery uppercase">{{$course->name}}</span>
                    </div>
                    <div class="tools">
                        <a href="" class="collapse" data-original-title="" title=""> </a>
                        <a href="" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>

                <div class="portlet-body" style="display: block;">

                    <div class="row" style="margin-bottom: 1.5rem;">
                        <div class="col-md-6">
                            <form action="{{route('dashboard.teachers.course',$course->id)}}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" value="{{request()->search}}" class="form-control" placeholder="بحث ...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit"> بحث <i class="fa fa-search"></i></button>
                                </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box blue-dark">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-table"></i>قائمة الطلاب </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        <a href="" class="fullscreen" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>اسم الطالب</th>
                                                <th>البريد الالكتروني</th>
                                                <th>رقم الجوال</th>
                                                <th>المعدل</th>
                                                <th>المدرسة</th>
                                                <th>العنوان</th>
                                                <th>صورة الطالب</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $key=>$user)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->mobile_number}}</td>
                                                    <td>{{$user->gpa}}</td>
                                                    <td>{{$user->school}}</td>
                                                    <td>{{$user->address}}</td>
                                                    <td><img class="img-thumbnail" style="width: 130px;" src="{{ $user->image != null ? asset('storage/student_images/'.$user->image):asset('front/img/Student/noimage.png')}}" alt="صورة الطالب"></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{$users->appends(request()->query())->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END GRID PORTLET-->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold font-grey-gallery uppercase">الاستفسارات</span>
                    </div>
                    <div class="tools">
                        <a href="" class="collapse" data-original-title="" title=""> </a>
                        <a href="" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>

                <div class="portlet-body" style="display: block;">
                    <div class="row">
                        <div class="col-md-12">
                            @livewire('teacher-chat',['course'=>$course,'users'=>$allUsers])
                        </div>
                    </div>
                </div>
            </div>
            <!-- END GRID PORTLET-->
        </div>
    </div>


@endsection
@section('page-style')
    <style type="text/css">
        .chatbox {
            height: 80vh !important;
            overflow-y: scroll;
        }
        .message-box {
            height: 70vh !important;
            overflow-y: scroll;display:flex; flex-direction:column-reverse;
            padding: 1rem;
        }
        .single-message {
            background: #f1f0f0;
            border-radius: 12px;
            padding: 10px;
            margin-bottom: 10px;
            width: fit-content;
        }
        .received {
            margin-right: auto !important;
        }
        .sent {
            margin-left: auto !important;
            background : #3497e6;
            color: white!important;
        }
        .sent small {
            color: white !important;
        }
    </style>

    @livewireStyles
@endsection

@section('page-js')
    @livewireScripts
@endsection
