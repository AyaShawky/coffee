@extends('dashboard.app')
@section('content')
    <br>

    <div class="row">
        <div class="col-md-4">
            <div class="portlet light profile-sidebar-portlet ">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="{{asset('storage/teacher_images/'.auth('teacher')->user()->image)}}" class="img-responsive" alt=""> </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <h2 class="profile-usertitle-name" style="text-align: center;"> {{auth('teacher')->user()->name}} </h2>
                    <h4 class="profile-usertitle-name" style="text-align: center;"> مدرس </h4>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
            </div>
        </div>
        <div class="col-md-8">
            <!-- BEGIN PORTLET -->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">المواد المكلفة</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable table-scrollable-borderless">
                        <table class="table table-hover table-light">
                            <thead>
                            <tr class="uppercase">
                                <th> اسم المادة </th>
                                <th> الفرع </th>
                                <th> عدد الطلاب </th>
                                <th> عدد الدروس </th>
                            </tr>
                            </thead>
                            <tbody>
                               @foreach($courses as $course)
                                   <tr>
{{--                                       <td class="fit">--}}
{{--                                           <img class="user-pic" src="{{asset('storage/course_images/'.$course->image)}}">--}}
{{--                                       </td>--}}
                                       <td>
                                           <a href="javascript:;" class="primary-link">{{$course->name}}</a>
                                       </td>
                                       <td> <span class="bold theme-font">{{$course->section->name}}</span> </td>
                                       <td> <span class="bold theme-font">{{$course->registeredUsers->count()}}</span>
                                       </td>
                                       <td> <span class="bold theme-font">{{$course->lessons->count()}}</span> </td>
                                   </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END PORTLET -->
        </div>
    </div>
@endsection