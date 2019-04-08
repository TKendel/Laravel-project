@extends("layouts/frontend")

@section("content")

	<div class="SinglePost_Title">
		<h1>{{$Post->title}}</h1>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-2"></div>
            <div class="col-lg-8">
                <article>
                    <div class="thumbnail">
                        <img src="{{ asset($Post->thumbnail) }}" width="650" height="350">
                    </div>
                    <div class="Post_info">
                    	<div>
                    		admin
                    	</div>
                        <span>
                            <i class="seoicon-clock"></i>

                            <time class="text-sm-left">{{$Post->created_at->toFormattedDateString()}} 
                            </time>
                        </span>
                        <a href="">{{$Post->Category->type}}</a>
                    </div>
                    <div>
                    	<p>{!! $Post->description !!}</p>
                    </div>
                </article>   
            </div>
            <div class="col-lg-2"></div>   
		</div>
	</div>
	<div class="row">
        <div class="container">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <div>
                            <h2 class="display-4">All Blog Tags</h2>
         					@foreach($Post->tags as $tag)
         						<a href="#">{{$tag->tag}}</a>
         					@endforeach
                        </div>
                    </div>
                </div>
           	</div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <article>
                    
                </article>
                <div class="n_p_buttons">
                    @if($next)
                        <div class="Next">
                            <a href="{{ route('single',['slug'=>$next->slug])}}">
                                
                                <div>
                                    <div>Next Post</div>
                                    <p>{{$next->title}}</p>
                                </div>
                            </a>
                        </div>
                    @endif
                    @if($previous)
                        <div class="Previous">
                            <a href="{{ route('single',['slug'=>$previous->slug])}}">
                                
                                <div>
                                    <div>Previous Post</div>
                                    <p>{{$previous->title}}</p>
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@stop