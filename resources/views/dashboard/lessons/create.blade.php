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
                        <span>اضافة درس</span>
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
                        <span class="caption-subject bold font-grey-gallery uppercase">معلومات الدرس</span>
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
                            <form action="{{route('dashboard.lessons.store')}}" method="POST" id="form">
                                @csrf
                                <div class="form-body">
                                    <input hidden name="topic_id" value="{{$topic->id}}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">اسم الدرس</label>
                                                <input id="name" name="name" type="text" value="{{old('name')}}" class="form-control input-xlarge">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="video">رقم الفيديو من Vimeo</label>
                                                <input id="video" name="video" type="text" value="{{old('video')}}" class="form-control input-xlarge">
                                            </div>
                                        </div>
                                    </div>


{{--                                    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-12">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="video">فيديو الدرس</label>--}}
{{--                                                <input id="video" name="video" type="file" class="form-control-file">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>

{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="progress">--}}
{{--                                            <div id="progressBar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">--}}
{{--                                                0%--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="form-actions">
                                    <div class="row" style="float: left;">
                                        <div class="col-md-12">
                                            <button type="reset" class="btn default">الغاء</button>
                                            <button id="submit_button" type="submit" class="btn green">اضافة</button>
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

{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>--}}
{{--    <script>--}}
{{--        $(document).ready(function() {--}}

{{--            $('#form').on('submit', function(event) {--}}

{{--                event.preventDefault();--}}
{{--                $('#submit_button').attr('disabled', 'disabled');--}}

{{--                var formData = new FormData($('#form')[0]);--}}

{{--                $.ajax({--}}
{{--                    xhr : function() {--}}
{{--                        var xhr = new window.XMLHttpRequest();--}}

{{--                        xhr.upload.addEventListener('progress', function(e) {--}}

{{--                            if (e.lengthComputable) {--}}

{{--                                console.log('Bytes Loaded: ' + e.loaded);--}}
{{--                                console.log('Total Size: ' + e.total);--}}
{{--                                console.log('Percentage Uploaded: ' + (e.loaded / e.total));--}}

{{--                                var percent = Math.round((e.loaded / e.total) * 100);--}}

{{--                                $('#progressBar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');--}}

{{--                            }--}}

{{--                        });--}}

{{--                        return xhr;--}}
{{--                    },--}}
{{--                    type : 'POST',--}}
{{--                    url : '{{route('dashboard.lessons.store')}}',--}}
{{--                    headers:--}}
{{--                        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },--}}
{{--                    data : formData,--}}
{{--                    processData : false,--}}
{{--                    contentType : false,--}}
{{--                    success : function() {--}}
{{--                        window.location.replace("{{route('dashboard.lessons.index')}}");--}}
{{--                    },--}}
{{--                    error: function (request, status, error) {--}}
{{--                        alert('invalid input');--}}
{{--                        $('#progressBar').attr('aria-valuenow', 0).css('width', 0 + '%').text(0 + '%');--}}
{{--                        $('#submit_button').removeAttr('disabled', 'disabled');--}}
{{--                    }--}}

{{--                });--}}

{{--            });--}}

{{--        });--}}
{{--    </script>--}}
@endsection