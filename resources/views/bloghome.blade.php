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
    <script type="text/javascript" src="{{url('resources/assets/js/index.js')}}"></script>
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>
<body>
    <div class="main">
        <form>
            <div id="form_title" class="form-group has-feedback">
                <label id = "labeltitle" class="control-label" style="display: none" for="title">Tiêu đề không được để trống</label>
                <input type="text" class="form-control" id="title" placeholder="Title">
                <span id = "spantitle" class="glyphicon glyphicon-remove form-control-feedback" style="display: none"></span>
            </div>

            <textarea class="form-control inputform" name="brief" id="brief" placeholder="Brief"></textarea> 

            <button type="button" class="btn btn-sm btn-primary btn-block inputimage">Image</button>
            <textarea name="content" data-provide="markdown" id="content" rows="10"></textarea>
            <input type="text" class="form-control inputform" name="keyword" id="keyword" placeholder="Keyword">
            <button type="button" class="btn btn-sm btn-primary btn-block inputimage" onclick="createArticle()">Save</button>
        </form> 
        
        <div class="articles"> 

            <ul class="media-list">
                @foreach($articles as $article)
                    <div class="w3-card-2"">
                        <li class="media">
                            <a class="pull-left" href="{{url("/info")."/".$article->id}}">
                                <img class="media-object img-rounded thumb_img" src="{{url('resources/assets/img/tank.png')}}"> 
                            </a>
                            <div class="media-body">
                                <div class="left-media"  onclick="openArticle({{$article->id}})"> 
                                    <a href="{{url("/info")."/".$article->id}}"><h4 class="media-heading">{{$article->title}}</h4></a>
                                    <p><font size="2">{{$article->created_at}}</font></p>
                                    <p>{{$article->brief}}</p>
                                    <div style="display:block"> 
                                        @if($article->keyword != "")
                                            @foreach((explode(",", $article->keyword)) as $keywordHightlight)
                                                <span class="label label-info">{{$keywordHightlight}}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="right-media"> 
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a href="#" onclick="deleteArticle({{$article->id}})">Xóa</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                @endforeach
            </ul>

        </div>
    </div>
</body>
</html>