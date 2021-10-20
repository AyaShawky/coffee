@extends('dashboard.app')
@section('content')
{{--    <div>--}}
{{--        <video id="video" width="100%" controls controlsList="nodownload" autoplay >--}}
{{--            <!-- MP4 Video for example -->--}}
{{--            <source src="{{route('get_video',$video)}}">--}}
{{--        </video>--}}
{{--    </div>--}}
{{--    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>    <script type="text/javascript">--}}
{{--        $(document).ready(function(){--}}
{{--            $('#video').bind('contextmenu',function() { return false; });--}}
{{--        });--}}
{{--    </script>--}}

<div style="text-align: center;">
    <iframe src="https://player.vimeo.com/video/{{$video}}"
            width="800" height="600"
            frameborder="0" webkitallowfullscreen mozallowfullscreen
            allow="autoplay; fullscreen" allowfullscreen></iframe>
</div>

<script src="https://player.vimeo.com/api/player.js"></script>
@endsection