@extends('layouts.app')
@section('content')
<!-- ============================ Page Title Start================================== -->
<div class="page-title" style="background:#000 url({{url('/front_assets/img/page-top-banner.png')}}) no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2 class="ipt-title">News & Events </h2>
                <span class="ipn-subtitle text-white">Stay ahead of the curve with Elite Edge – your go-to source for the latest news, exclusive updates, and industry-leading events!</span>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->
<!-- start hot selling projects -->
<section class="gray-simple">
    <div class="container">
        <div class="row">
            <!--1st News  starts-->
            @foreach ($news as $key)
            <div class="col-md-4">
                <div class="eliteEdge-news-post-content  mb-4">
                    <div class="eliteEdge-news-post-heading">
                        <div class="eliteEdge-news-post-image">
                            <a href="{{$key->description}}" target="_blank"><img src="{{ url('uploads/news_update/'.$key->image) }}" alt="{{$key->title}}" class="img-fluid"> </a>
                        </div>
                    </div>
                    <div class="eliteEdge-news-post-text">
                        <div class="eliteEdge-news-post-text-inner">
                            <div class="eliteEdge-news-post-text-main">
                                <h5 class="entry-title eliteEdge-news-post-title" >
                                    <a href="{{$key->description}}" target="_blank">{{$key->title}}</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                {!! $news->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
    
</section>
<!-- end hot selling projects -->
@endsection