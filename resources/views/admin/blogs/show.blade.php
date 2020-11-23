@extends('layouts.master')

@section('subtitle')
    <a href="#">Show Blog </a>
@stop

@section('title')
    <small><h2>Blogs</h2></small>
@stop


@section('content')

    <div class="container-fluid">
        <div class="col-sm-8">
    <div class="portlet light portlet-fit full-height-content full-height-content-scrollable bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class=" icon-layers font-green"></i>
                <span class="caption-subject font-green bold uppercase">{{$blog->title}}</span>
            </div>
            <div class="actions">

                <a class="btn btn-circle btn-icon-only btn-default"
                   href="{{route('admin.blogs.edit',$blog->id)}}">
                    <i class="icon-wrench"></i>
                </a>
                <a class="btn btn-circle btn-icon-only btn-default"
                   href="/admin/blogs/{{$blog->id}}/delete" onclick="return confirm('Are you sure?')">
                    <i class="icon-trash"></i>
                </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="content-body">
                <p>{!! $blog->body !!}</p>
            </div>
        </div>
    </div>
        </div>
        <div class="col-sm-4">
            <div class="portlet-body">
                <div class="mt-element-card mt-element-overlay">
                    <div class="row">
                        <div class="col-lg-8 col-md-5 col-sm-6 col-xs-12">
                            <div class="mt-card-item">
                                <div class="mt-card-avatar mt-overlay-1">
                                    <img src="/images/{{$blog->photo ? $blog->photo->file :'https://placehold.it/400x400'}}"
                                         class="img-responsive img-rounded" />

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
