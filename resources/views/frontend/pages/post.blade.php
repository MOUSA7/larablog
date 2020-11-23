@extends('layouts._layout')

@section('content')

    <div class="container" id="app">
        <div class="row">
            <!-- Latest Posts -->
            <main class="post blog-post col-lg-8">
                <div class="container">
                    <div class="post-single">
                        @foreach($blogs as $blog)
                            <div class="post-thumbnail"><img src="/images/{{$blog->photo ? $blog->photo->file :'https://placehold.it/400x400'}}" alt="..." class="img-fluid"></div>
                            <div class="post-details">
                                <div class="post-meta d-flex justify-content-between">
                                    <div class="category"><a href="#">Business</a><a href="#">@foreach($blog->category as $category){{$category->name}} @endforeach</a></div>
                                </div>
                                <a href="{{route('larablog.show',$blog->slug)}}"><h1 class="h4">{{$blog->title}}</h1></a>
                                <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                                        <div class="avatar"><img src="/images/{{$blog->user->photo->file}}" alt="..." class="img-fluid"></div>
                                        <div class="title"><span>{{$blog->user->name}}</span></div></a>
                                    <div class="d-flex align-items-center flex-wrap">
                                        <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                                        <div class="views"><i class="icon-eye"></i> 500</div>
                                        <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                                    </div>
                                </div>
                                <div class="post-body">
                                    <p class="lead">{!! $blog->body !!}</p>
                                    <blockquote class="blockquote">
                                        <p>{{$blog->meta_desc}}.</p>
                                        <footer class="blockquote-footer">Someone famous in
                                            <cite title="Source Title">Source Title</cite>
                                        </footer>
                                    </blockquote>
                                </div>
                                @endforeach
                                <div class="post-tags"><a href="#" class="tag">#Business</a><a href="#" class="tag">#Tricks</a><a href="#" class="tag">#Financial</a><a href="#" class="tag">#Economy</a></div>
                                <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row"><a href="#" class="prev-post text-left d-flex align-items-center">
                                        <div class="icon prev"><i class="fa fa-angle-left"></i></div>
                                        <div class="text"><strong class="text-primary">Previous Post </strong>
                                            <h6>I Bought a Wedding Dress.</h6>
                                        </div></a><a href="#" class="next-post text-right d-flex align-items-center justify-content-end">
                                        <div class="text"><strong class="text-primary">Next Post </strong>
                                            <h6>I Bought a Wedding Dress.</h6>
                                        </div>
                                        <div class="icon next"><i class="fa fa-angle-right">   </i></div></a></div>

                                <div class="post-comments">
                                    <header>
                                        <h3 class="h6">Post Comments<span class="no-of-comments">(3)</span></h3>
                                    </header>
                                    <div class="comment">
                                        <div class="comment-header d-flex justify-content-between">
                                            <div class="user d-flex align-items-center">
                                                <div class="image"><img src="{{asset('../assets/layouts/_layout/img/user.svg')}}" alt="..." class="img-fluid rounded-circle"></div>
                                                <div class="title"><strong>Jabi Hernandiz</strong><span class="date">May 2016</span></div>
                                            </div>
                                        </div>
                                        <div class="comment-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="add-comment">
                                    <header>
                                        <h3 class="h6">Leave a reply</h3>
                                    </header>
                                    <form action="#" class="commenting-form">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <input type="text" name="username" id="username" placeholder="Name" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="email" name="username" id="useremail" placeholder="Email Address (will not be published)" class="form-control">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <textarea name="usercomment" id="usercomment" placeholder="Type your comment" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-secondary">Submit Comment</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                    </div>
                </div>
            </main>
            <aside class="col-lg-4">

                <!-- Widget [Search Bar Widget]-->
                <div class="widget search">
                    <header>
                        <h3 class="h6">Search the blog</h3>
                    </header>

                            <Search-Component></Search-Component>
                            <button type="submit" class="submit"><i class="icon-search"></i></button>


                </div>
                <!-- Widget [Latest Posts Widget]        -->
                <div class="widget latest-posts">
                    <header>
                        <h3 class="h6">Latest Posts</h3>
                    </header>
                    <div class="blog-posts"><a href="#">
                            <div class="item d-flex align-items-center">

                                <div class="image"><img src="/images/{{$blog->photo ? $blog->photo->file :'https://placehold.it/400x400'}}" alt="..." class="img-fluid"></div>
                                <div class="title"><strong>{{$blog->title}}</strong>
                                    <div class="d-flex align-items-center">
                                        <div class="views"><i class="icon-eye"></i> 500</div>
                                        <div class="comments"><i class="icon-comment"></i>12</div>
                                    </div>
                                </div>

                            </div>
                        </a><a href="#">
                        </a></div>
                </div>
                <!-- Widget [Categories Widget]-->
                <div class="widget categories">
                        <header>
                            <h3 class="h6">Categories</h3>
                        </header>
                    @foreach($blogs as $blog)
                        <div class="item d-flex justify-content-between"><a href="#">@foreach($blog->category as $category){{$category->name}} @endforeach</a><span>{{$blog->category->count()}}</span></div>
                    @endforeach
                </div>
                <!-- Widget [Tags Cloud Widget]-->
                <div class="widget tags">
                    <header>
                        <h3 class="h6">Tags</h3>
                    </header>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#" class="tag">#Business</a></li>
                        <li class="list-inline-item"><a href="#" class="tag">#Technology</a></li>
                        <li class="list-inline-item"><a href="#" class="tag">#Fashion</a></li>
                        <li class="list-inline-item"><a href="#" class="tag">#Sports</a></li>
                        <li class="list-inline-item"><a href="#" class="tag">#Economy</a></li>
                    </ul>
                </div>

            </aside>

        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
@stop
