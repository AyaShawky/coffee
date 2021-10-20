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
                        <span>ادارة المواد</span>
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
                        <span class="caption-subject bold font-grey-gallery uppercase">ادارة المواد</span>
                    </div>
                    <div class="tools">
                        <a href="" class="collapse" data-original-title="" title=""> </a>
                        <a href="" class="reload" data-original-title="" title=""> </a>
                        <a href="" class="fullscreen" data-original-title="" title=""> </a>
                        <a href="" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>

                <div class="portlet-body" style="display: block;">

                    <div class="row" style="margin-bottom: 1.5rem;">
                        <div class="col-md-6">
                            <form action="{{route('dashboard.courses.index')}}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" value="{{request()->search}}" class="form-control" placeholder="بحث ...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit"> بحث <i class="fa fa-search"></i></button>
                                </span>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-6">
                            <a href="{{route('dashboard.courses.create')}}" class="btn green-jungle" type="button"> اضافة عنصر <i class="fa fa-plus"></i></a>
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
                                                <th>التخصص</th>
                                                <th>مدرس المادة</th>
                                                <th>السعر</th>
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
                                                    <td>{{$course->section->name}}</td>
                                                    <td>{{$course->teacher->name}}</td>
                                                    <td>{{$course->price}}</td>
                                                    <td>{{$course->description}}</td>
                                                    <td><img class="img-thumbnail" style="width: 150px;" src="{{asset('storage/course_images/'.$course->image)}}" alt="صورة القسم"></td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <a href="{{route('dashboard.courses.edit',$course->id)}}" type="button" style="margin: 0.3rem;" class="btn btn-sm btn-warning" data-toggle="modal"> تعديل <i class="fa fa-pencil"></i></a>
                                                        @if($course->topics->count() >0)
                                                            <button type="button" class="btn btn-sm btn-danger disabled" style="margin: 0.3rem;"> حذف <i class="fa fa-trash"></i></button>
                                                        @else
                                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" style="margin: 0.3rem;" data-target="#delete{{$course->id}}"> حذف <i class="fa fa-trash"></i></button>
                                                        @endif

                                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" style="margin: 0.3rem;" data-target="#users{{$course->id}}"> عرض طلاب المادة <i class="fa fa-graduation-cap"></i></button>

                                                        <!--Users Modal -->
                                                        <div class="modal fade" id="users{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="users{{$course->id}}Label" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="users{{$course->id}}Label"> طلاب مادة <strong>{{$course->name}}</strong> </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

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
                                                                                                @foreach($course->users as $key=>$user)
                                                                                                    @if($user->pivot->active ==1)
                                                                                                    <tr>
                                                                                                        <td>{{$key+1}}</td>
                                                                                                        <td>{{$user->name}}</td>
                                                                                                        <td>{{$user->email}}</td>
                                                                                                        <td>{{$user->mobile_number}}</td>
                                                                                                        <td>{{$user->gpa}}</td>
                                                                                                        <td>{{$user->school}}</td>
                                                                                                        <td>{{$user->address}}</td>
                                                                                                        <td>
                                                                                                            <form action="{{route('dashboard.expel')}}" method="POST">
                                                                                                                @csrf
                                                                                                                <input hidden name="user_id" value="{{$user->id}}">
                                                                                                                <input hidden name="course_id" value="{{$course->id}}">
                                                                                                                <button type="submit" class="btn btn-sm btn-danger" style="margin: 0.3rem;"> فصل من المساق <i class="icon icon-user-unfollow"></i></button>
                                                                                                            </form>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    @endif
                                                                                                @endforeach
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
{{--                                                                    <div class="modal-footer">--}}
{{--                                                                        <form action="{{route('dashboard.courses.destroy',$course->id)}}" method="POST">--}}
{{--                                                                            @method('DELETE')--}}
{{--                                                                            @csrf--}}
{{--                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">رجوع</button>--}}
{{--                                                                            <button type="submit" class="btn btn-danger">تأكيف الحذف</button>--}}
{{--                                                                        </form>--}}
{{--                                                                    </div>--}}
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Delete Modal -->
                                                        <div class="modal fade" id="delete{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$course->id}}Label" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="delete{{$course->id}}Label">تأكيد الحذف</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        هل تريد المتابعة في عملية الحذف ؟
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="{{route('dashboard.courses.destroy',$course->id)}}" method="POST">
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
                                        {{$courses->appends(request()->query())->links()}}
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