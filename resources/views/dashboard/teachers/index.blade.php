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
                        <span>المدرسين</span>
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
                        <span class="caption-subject bold font-grey-gallery uppercase">ادارة المدرسين</span>
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
                            <form action="{{route('dashboard.teachers.index')}}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" value="{{request()->search}}" class="form-control" placeholder="بحث ...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit"> بحث <i class="fa fa-search"></i></button>
                                </span>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-6">
                            <a href="{{route('dashboard.teachers.create')}}" class="btn green-jungle" type="button"> اضافة عنصر <i class="fa fa-plus"></i></a>
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
                                                            <a href="{{route('dashboard.teachers.edit',$teacher->id)}}" type="button" style="margin: 0.3rem;" class="btn btn-sm btn-warning" data-toggle="modal"> تعديل <i class="fa fa-pencil"></i></a>
                                                        @if($teacher->courses->count() >0)
                                                            <button type="button" class="btn btn-sm btn-danger disabled" style="margin: 0.3rem;"> حذف <i class="fa fa-trash"></i></button>
                                                        @else
                                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" style="margin: 0.3rem;" data-target="#delete{{$teacher->id}}"> حذف <i class="fa fa-trash"></i></button>
                                                        @endif

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="delete{{$teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$teacher->id}}Label" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="delete{{$teacher->id}}Label">تأكيد الحذف</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        هل تريد المتابعة في عملية الحذف ؟
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="{{route('dashboard.teachers.destroy',$teacher->id)}}" method="POST">
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">رجوع</button>
                                                                            <button type="submit" class="btn btn-danger">تأكيف الحذف</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Button trigger modal -->
                                                        <button style="margin: 0.3rem;" type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#reset{{$teacher->id}}"> تغير كلمة المرور <i class="fa fa-key"></i></button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="reset{{$teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="reset{{$teacher->id}}Title" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">تغير كلمة المرور</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form id="password-reset" action="{{route('dashboard.teachers.password.update',$teacher->id)}}" method="POST">
                                                                            @csrf
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label for="password">كلمة السر الجديدة</label>
                                                                                        <input id="password" name="password" type="password" class="form-control input-xlarge">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label for="password_confirmation">تأكيد كلمة السر</label>
                                                                                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control input-xlarge">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">رجوع</button>
                                                                                <button type="submit" class="btn btn-primary">تغير كلمة المرور</button>
                                                                            </div>
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
                                        {{$teachers->appends(request()->query())->links()}}
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