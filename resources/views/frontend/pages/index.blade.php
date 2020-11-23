@extends('layouts._layout')

{{--@include('partials.meta_dynamic')--}}
@section('content')
    <section style="background: url(../assets/layouts/_layout/img/hero.jpg); background-size: cover; background-position: center center" class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h1>Bootstrap 4 Blog - A free template by Bootstrap Temple</h1><a href="#" class="hero-link">Discover More</a>
                </div>
            </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
        </div>
    </section>

    <section class="intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="h3">Some great intro here</h2>
                    <p class="text-big">Place a nice <strong>introduction</strong> here <strong>to catch reader's attention</strong>. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderi.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-posts no-padding-top">
        <div class="container">
            <!-- Post-->
{{--            @if($blogs->category)--}}
            @foreach($blogs as $blog)
            <div class="row d-flex align-items-stretch">
                <div class="text col-lg-7">
                    <div class="text-inner d-flex align-items-center">
                        <div class="content">
                            <header class="post-header">
{{--                                @foreach($blog->category as $blog)--}}
                                <div class="category"><a href="#">@foreach($blog->category as $category){{$category->name}}  @endforeach</a></div>
                                <a href="{{route('larablog.show',$blog->slug)}}"><h2 class="h4">{{$blog->title}}</h2></a>
                            </header>
                            <p>{!! $blog->body !!}</p>
                            <footer class="post-footer d-flex align-items-center"><a href="{{route('admin.users.show',$blog->user->name)}}" class="author d-flex align-items-center flex-wrap">
                                    <div class="avatar"><img src="/images/{{$blog->user ? $blog->user->photo->file :'https://placehold.it/400x400'}}" alt="..." class="img-fluid"></div>
                                    <div class="title"><span>{{$blog->user ?$blog->user->name:''}}</span></div></a>
                                <div class="date"><i class="icon-clock"></i> {{$blog->created_at->diffForHumans()}}</div>
                                <div class="comments"><i class="icon-comment"></i>12</div>
                            </footer>

                        </div>
                    </div>
                </div>
                <div class="image col-lg-5"><img src="/images/{{$blog->photo ? $blog->photo->file :'https://placehold.it/400x400'}}" alt="..."></div>
            </div>
            @endforeach
{{--            @endif--}}
            <hr>
            <!-- Post        -->
        </div>
    </section>

    <section style="background: url(../assets/layouts/_layout/img/divider-bg.jpg); background-size: cover; background-position: center bottom" class="divider">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h2><a href="#" class="hero-link">View More</a>
                </div>
            </div>
        </div>
    </section>

    <section class="latest-posts">
        <div class="container">
            <header>
                <h2>Latest from the blog</h2>
                <p class="text-big">Display Latest Blogs.</p>
            </header>
            <div class="row">
                @foreach($blogs as $blog)
                <div class="post col-md-4">
                    <div class="post-thumbnail">
                        <a href="">
                            <img src="/images/{{$blog->photo ? $blog->photo->file :'https://placehold.it/400x400'}}" alt="..." style="width: 50%;height: 50%" class="img-fluid">
                        </a>
                    </div>
                    <div class="post-details">
                        <div class="post-meta d-flex justify-content-between">
                            <div class="date">{{date('d-m-Y', strtotime($blog->created_at))}} |<a href="#"> @foreach($blog->category as $category){{$category->name}}@endforeach</a></div>
                            <div class="category"></div>
                        </div>
                        <a href="post.html"><h3 class="h4">{{$blog->title}}</h3></a>
                        <p class="text-muted">{!! Str::limit($blog->body,120) !!}</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
@stop






