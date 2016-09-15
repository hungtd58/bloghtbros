<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blog</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="https://cdn.rawgit.com/showdownjs/showdown/1.4.2/dist/showdown.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('resources/assets/css/bootstrap-markdown.min.css') }}">
    <script src="{{url('resources/assets/js/markdown.js')}}" ></script>
    <script src="{{url('resources/assets/js/to-markdown.js')}}"></script>
    <script src="{{url('resources/assets/js/bootstrap-markdown.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('resources/assets/bootflat.github.io-master/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{url('resources/assets/css/index.css')}}">
    <script type="text/javascript" src="{{url('resources/assets/js/index1.js')}}"></script>
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>
<body>
    <div class="main">
        @if($status == 1)
            <h3>{{$article->title}}</h3>
            <br>
            <p id="contentMD" hidden="true">{{$article->content}}</p>
            <p align="justify" id="contentHTML"></p>
        @else
            <h6>Không tìm thấy bài đăng</h6>
        @endif
    </div>
</body>
</html>