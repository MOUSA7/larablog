@extends('layouts.master')

@section('subtitle')
    <a href="#">Trashed Blog </a>
@stop

@section('title')
    <small><h2>Blogs</h2></small>
@stop


@section('content')

    <div class="note note-info">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Title</th>
                <th>Body</th>
            </tr>
            </thead>
            <tbody>
            @foreach($blog_trash as $blog)
                <tr>
                    <td>{{$blog->title}}</td>
                    <td>{{Str::limit($blog->body,15)}}</td>
                    <td>
                        {!! Form::open(['method'=>'GET','action'=>['BlogsController@restore',$blog->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Restore',['class'=>'btn btn-primary']) !!}
                        </div>

                        {!! Form::close()!!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop
