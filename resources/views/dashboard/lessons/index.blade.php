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
                        <span>ادارة الدروس</span>
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
                        <span class="caption-subject bold font-grey-gallery uppercase">ادارة الدروس</span>
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
                            <form action="{{route('dashboard.lessons.index')}}" method="GET">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" name="search" value="{{request()->search}}" class="form-control" placeholder="اسم الدرس">
                                        <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"> بحث <i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </form>
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
                                                <th>المادة</th>
                                                <th>الوحدة</th>
                                                <th>العمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($lessons as $key=>$lesson)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td><a href="{{route('dashboard.lessons.show',$lesson->video)}}" target="_blank">{{$lesson->name}}</a></td>
                                                    <td>{{$lesson->topic->course->name}}</td>
                                                    <td>{{$lesson->topic->name}}</td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <a href="{{route('dashboard.lessons.edit',$lesson->id)}}" type="button" style="margin: 0.3rem;" class="btn btn-sm btn-warning" data-toggle="modal"> تعديل <i class="fa fa-pencil"></i></a>
                                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" style="margin: 0.3rem;" data-target="#delete{{$lesson->id}}"> حذف <i class="fa fa-trash"></i></button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="delete{{$lesson->id}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$lesson->id}}Label" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="delete{{$lesson->id}}Label">تأكيد الحذف</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        هل تريد المتابعة في عملية الحذف ؟
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="{{route('dashboard.lessons.destroy',$lesson->id)}}" method="POST">
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
                                        {{$lessons->appends(request()->query())->links()}}
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