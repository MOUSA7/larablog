@extends('layouts.master')

@section('subtitle')
    <a href="#">Display Category </a>
@stop

@section('title')
    <div class="container-fluid">
        <h2>{{Str::upper($category->name)}} :</h2>
    </div>
@stop

@section('content')

    <div class="note note-info">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Title</th>
                <th>Body</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($category->blog as $blogs)
                <tr>
                    <td><a href="{{route('admin.blogs.show',$blogs->id)}}">{{$blogs->title}}</a></td>
                    <td>{{Str::limit($blogs->body,20)}}</td>
                    <td>{{$blogs->created_at->diffForHumans()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop
