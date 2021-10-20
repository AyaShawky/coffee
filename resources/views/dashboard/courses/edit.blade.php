@extends('dashboard.app')
@section('content')
    <div class="row" style="margin-bottom: 2rem;">
        <div class="col-md-12">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">الرئيسية</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>تعديل مادة</span>
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
                        <span class="caption-subject bold font-grey-gallery uppercase">معلومات المادة</span>
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
                            <form action="{{route('dashboard.courses.update',$course->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">اسم المادة</label>
                                                <input id="name" name="name" type="text" value="{{$course->name}}" class="form-control input-xlarge">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="section" class="control-label">تخصص المادة</label>
                                                <select id="section" name="section_id" class="form-control select2">
                                                    <option selected disabled>اختيار التخصص</option>
                                                    @foreach($sections as $section)
                                                        <option value="{{$section->id}}" {{$section->id == $course->section->id ? 'selected':''}}>{{$section->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="course" class="control-label">مدرس المادة</label>
                                                <select id="course" name="teacher_id" class="form-control select2">
                                                    <option selected disabled>اختيار المدرس</option>
                                                    @foreach($teachers as $teacher)
                                                        <option value="{{$teacher->id}}" {{$teacher->id == $course->teacher->id ? 'selected':''}}>{{$teacher->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">وصف المادة</label>
                                                <textarea id="description" name="description" class="form-control" rows="3">{{$course->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="preview_video">رقم الفيديو من Vimeo</label>
                                                <input id="preview_video" name="preview_video" type="text" value="{{$course->preview_video}}" class="form-control input-xlarge">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="preview_video">سعر المادة</label>
                                                <input id="preview_video" name="price" type="number" value="{{$course->price}}" class="form-control input-xlarge">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="image">صورة الغلاف</label>
                                                <input id="image" name="image" type="file" class="form-control-file">
                                            </div>
                                        </div>
                                    </div>

{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-12">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="preview_video">الفيديو التعريفي</label>--}}
{{--                                                <input id="preview_video" name="preview_video" type="file" class="form-control-file">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>

                                <div class="form-actions">
                                    <div class="row" style="float: left;">
                                        <div class="col-md-12">
                                            <button type="reset" class="btn default">الغاء</button>
                                            <button type="submit" class="btn green">تعديل</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END GRID PORTLET-->
        </div>
    </div>
@endsection