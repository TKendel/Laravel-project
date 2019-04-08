<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$settings->name}}</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/frontEnd.css">   
</head>

<body>
    <header>
        <div class="jumbotron">
            <div class="container">
                <h2 class="display-2">{{$settings->name}}</h2>
                <nav>
                    <ul class="nav justify-content-center">
                        @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link active" href="#">{{$category->type}}</a>
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </header>


    <div class="container article-Main">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <article>
                    <div class="thumbnail">
                        <img src="{{ asset($latest_post->thumbnail) }}" width="350" height="250">
                    </div>
                    <div class="Post_Title">
                        <h3>
                            <a href="{{ route('single',['slug'=>$latest_post->slug])}}">{{$latest_post->title}}</a>
                        </h3>
                        <div class="Post_info">
                            <span>
                                <i class="seoicon-clock"></i>

                                <time class="text-sm-left">{{$latest_post->created_at->toFormattedDateString()}} 
                                </time>
                            </span>
                            <a href="">{{$latest_post->Category->type}}</a>
                        </div>
                    </div>
                </article>   
            </div>
            <div class="col-lg-2"></div>      
        </div>
    
        <div class="row">
            <div class="col-lg-6">
                <article>
                    <div class="thumbnail">
                        <img src="{{ asset($second_post->thumbnail) }}" width="350" height="250">
                    </div>
                    <div class="Post_Title">
                        <h3>
                            <a href="{{ route('single',['slug'=>$second_post->slug])}}">{{$second_post->title}}</a>
                        </h3>
                        <div class="Post_info">
                            <span>
                                <i class="seoicon-clock"></i>

                                <time class="text-sm-left">{{$second_post->created_at->toFormattedDateString()}} 
                                </time>
                            </span>
                            <a href="">{{$second_post->Category->type}}</a>
                        </div>
                    </div>
                </article>
            </div>

            <div class="col-lg-6">
                <article>
                    <div class="thumbnail">
                        <img src="{{ asset($third_post->thumbnail) }}" width="350" height="250">
                    </div>
                    <div class="Post_Title">
                        <h3>
                            <a href="{{ route('single',['slug'=>$third_post->slug])}}">{{$third_post->title}}</a>
                        </h3>
                        <div class="Post_info">
                            <span>
                                <i class="seoicon-clock"></i>

                                <time class="text-sm-left">{{$third_post->created_at->toFormattedDateString()}} 
                                </time>
                            </span>
                            <a href="">{{$third_post->Category->type}}</a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <div>
                            <h2 class="display-3">{{$New_category->type}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($New_category->Posts()->orderBy("created_at","desc")->take(3)->get() as $New_post)

                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div>
                                <img src="{{ asset($New_post->thumbnail) }}" height="100" width="150">
                            </div>
                            <div>
                                <h4>{{$New_post->title}}</h4>
                            </div>
                        </div>
                    @endforeach
                </div>                  
            </div>
            <div class="col-lg-12">

                <div class="row">
                    <div class="col-lg-8">
                        <div>
                            <h2 class="display-3">{{$Programing_category->type}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($Programing_category->Posts()->orderBy("created_at","desc")->take(3)->get() as $New_post)

                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div>
                                <img src="{{ asset($New_post->thumbnail) }}" height="100" width="150">
                            </div>
                            <div>
                                <h4>{{$New_post->title}}</h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@include("includes/footer")
<!--scripts-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
