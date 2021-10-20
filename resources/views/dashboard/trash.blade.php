
@extends('dashboard.app')
@section('content')
    <div class="row" style="margin-bottom: 2rem;">
        <div class="col-md-12">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{route('dashboard.main')}}">الرئيسية</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>سلة المحذوفات</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold font-grey-gallery uppercase">سلة المحذوفات</span>
                    </div>
                    <div class="tools">
                        <a href="" class="collapse" data-original-title="" title=""> </a>
                        <a href="" class="reload" data-original-title="" title=""> </a>
                        <a href="" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>

                <div class="portlet-body" style="display: block;">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box blue-dark">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-table"></i>قائمة الطلاب </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        <a href="" class="fullscreen" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
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
                                                <th>العمليات</th>
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
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <a href="{{route('dashboard.restore.user',$user->id)}}" type="button" style="margin: 0.3rem;" class="btn btn-sm green-jungle" data-toggle="modal"> استرجاع <i class="fa fa-undo"></i></a>

                                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUser{{$user->id}}" style="margin: 0.3rem;"> حذف <i class="fa fa-trash"></i></button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteUser{{$user->id}}Label" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteUser{{$user->id}}Label">تأكيد الحذف</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        هل تريد المتابعة في عملية الحذف ؟
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="{{route('dashboard.delete.user',$user->id)}}" method="POST">
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">رجوع</button>
                                                                            <button type="submit" class="btn btn-danger">تأكيف الحذف</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box red-flamingo">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-table"></i>قائمة المشرفين </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        <a href="" class="fullscreen" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>اسم المشرف</th>
                                                <th>البريد الالكتروني</th>
                                                <th>العمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($admins as $key=>$admin)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$admin->name}}</td>
                                                    <td>{{$admin->email}}</td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <a href="{{route('dashboard.restore.admin',$admin->id)}}" type="button" style="margin: 0.3rem;" class="btn btn-sm green-jungle" data-toggle="modal"> استرجاع <i class="fa fa-undo"></i></a>

                                                        @if($admin->id != 1)
                                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteAdmin{{$admin->id}}"> حذف <i class="fa fa-trash"></i></button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteAdmin{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteAdmin{{$admin->id}}Label" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="deleteAdmin{{$admin->id}}Label">تأكيد الحذف</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            هل تريد المتابعة في عملية الحذف ؟
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <form action="{{route('dashboard.delete.admin',$admin->id)}}" method="POST">
                                                                                @method('DELETE')
                                                                                @csrf
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">رجوع</button>
                                                                                <button type="submit" class="btn btn-danger">تأكيف الحذف</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box yellow-soft">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-table"></i>قائمة المواد </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        <a href="" class="fullscreen" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>اسم المادة</th>
                                                <th>وصف المادة</th>
                                                <th>صورة غلاف المادة</th>
                                                <th>العمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($courses as $key=>$course)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$course->name}}</td>
                                                    <td>{{$course->description}}</td>
                                                    <td><img class="img-thumbnail" style="width: 150px;" src="{{asset('storage/course_images/'.$course->image)}}" alt="صورة القسم"></td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <a href="{{route('dashboard.restore.course',$course->id)}}" type="button" style="margin: 0.3rem;" class="btn btn-sm green-jungle" data-toggle="modal"> استرجاع <i class="fa fa-undo"></i></a>
                                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" style="margin: 0.3rem;" data-target="#deleteCourse{{$course->id}}"> حذف <i class="fa fa-trash"></i></button>

                                                        <!--Delete Modal -->
                                                        <div class="modal fade" id="deleteCourse{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteCourse{{$course->id}}Label" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteCourse{{$course->id}}Label">تأكيد الحذف</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        هل تريد المتابعة في عملية الحذف ؟
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="{{route('dashboard.delete.course',$course->id)}}" method="POST">
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">رجوع</button>
                                                                            <button type="submit" class="btn btn-danger">تأكيف الحذف</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green-sharp">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-table"></i>قائمة الدروس </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        <a href="" class="fullscreen" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الدرس</th>
                                                <th>العمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($lessons as $key=>$lesson)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$lesson->name}}</td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <a href="{{route('dashboard.restore.lesson',$lesson->id)}}" type="button" style="margin: 0.3rem;" class="btn btn-sm green-jungle" data-toggle="modal"> استرجاع <i class="fa fa-undo"></i></a>
                                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" style="margin: 0.3rem;" data-target="#deleteLesson{{$lesson->id}}"> حذف <i class="fa fa-trash"></i></button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteLesson{{$lesson->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteLesson{{$lesson->id}}Label" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteLesson{{$lesson->id}}Label">تأكيد الحذف</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        هل تريد المتابعة في عملية الحذف ؟
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="{{route('dashboard.delete.lesson',$lesson->id)}}" method="POST">
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">رجوع</button>
                                                                            <button type="submit" class="btn btn-danger">تأكيف الحذف</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box yellow">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-table"></i>قائمة التخصصات </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        <a href="" class="fullscreen" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>اسم التخصص</th>
                                                <th>وصف التخصص</th>
                                                <th>صورة التخصص</th>
                                                <th>العمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($sections as $key=>$section)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$section->name}}</td>
                                                    <td>{{$section->description}}</td>
                                                    <td><img class="img-thumbnail" style="width: 150px;" src="{{asset('storage/section_images/'.$section->image)}}" alt="صورة القسم"></td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <a href="{{route('dashboard.restore.section',$section->id)}}" type="button" style="margin: 0.3rem;" class="btn btn-sm green-jungle" data-toggle="modal"> استرجاع <i class="fa fa-undo"></i></a>
                                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" style="margin: 0.3rem;" data-target="#deleteSection{{$section->id}}"> حذف <i class="fa fa-trash"></i></button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteSection{{$section->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteSection{{$section->id}}Label" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteSection{{$section->id}}Label">تأكيد الحذف</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        هل تريد المتابعة في عملية الحذف ؟
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="{{route('dashboard.delete.section',$section->id)}}" method="POST">
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">رجوع</button>
                                                                            <button type="submit" class="btn btn-danger">تأكيف الحذف</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box blue-chambray">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-table"></i>قائمة المدرسين </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        <a href="" class="fullscreen" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>اسم المدرس</th>
                                                <th>البريد الالكتروني</th>
                                                <th>نبذة عن الدرس</th>
                                                <th>صورة الدرس</th>
                                                <th>العمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($teachers as $key=>$teacher)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$teacher->name}}</td>
                                                    <td>{{$teacher->email}}</td>
                                                    <td>{{$teacher->bio}}</td>
                                                    <td><img class="img-thumbnail" style="width: 150px;" src="{{asset('storage/teacher_images/'.$teacher->image)}}" alt="صورة المدرس"></td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <a href="{{route('dashboard.restore.teacher',$teacher->id)}}" type="button" style="margin: 0.3rem;" class="btn btn-sm green-jungle" data-toggle="modal"> استرجاع <i class="fa fa-undo"></i></a>
                                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" style="margin: 0.3rem;" data-target="#deleteTeacher{{$teacher->id}}"> حذف <i class="fa fa-trash"></i></button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteTeacher{{$teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteTeacher{{$teacher->id}}Label" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteTeacher{{$teacher->id}}Label">تأكيد الحذف</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        هل تريد المتابعة في عملية الحذف ؟
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="{{route('dashboard.delete.teacher',$teacher->id)}}" method="POST">
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">رجوع</button>
                                                                            <button type="submit" class="btn btn-danger">تأكيف الحذف</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green-sharp">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-table"></i>قائمة الوحدات </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        <a href="" class="fullscreen" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>اسم الوحدة</th>
                                                <th>العمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($topics as $key=>$topic)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$topic->name}}</td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <a href="{{route('dashboard.restore.topic',$topic->id)}}" type="button" style="margin: 0.3rem;" class="btn btn-sm green-jungle" data-toggle="modal"> استرجاع <i class="fa fa-undo"></i></a>
                                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" style="margin: 0.3rem;" data-target="#deleteTopic{{$topic->id}}"> حذف <i class="fa fa-trash"></i></button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteTopic{{$topic->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteTopic{{$topic->id}}Label" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteTopic{{$topic->id}}Label">تأكيد الحذف</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        هل تريد المتابعة في عملية الحذف ؟
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="{{route('dashboard.delete.topic',$topic->id)}}" method="POST">
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">رجوع</button>
                                                                            <button type="submit" class="btn btn-danger">تأكيف الحذف</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
@endsection