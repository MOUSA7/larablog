@extends('layouts.master')

@section('subtitle')
    <a href="#">Control Blog </a>
@stop

@section('title')
    <div class="container-fluid">
        <h2>Operation</h2>
{{--        <a href="{{route('admin.blogs.create')}}" class="btn btn-success pull-right " >create blogs</a>--}}
    </div>
@stop


@section('content')

    <div class="note note-info">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Title</th>
                <th>Body</th>
                <th>Author</th>
                <th>Role</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td>{{$blog->title}}</td>
                    <td>{!! Str::limit($blog->body,17) !!}</td>
                    <td>{{$blog->user ? $blog->user->name :''}}</td>
                    <td>{{$blog->user ? $blog->user->role->name :''}}</td>
                    <td>{{$blog->created_at->diffForHumans()}}</td>
                    <td>
                        @if($blog->status == 0)
                            {!! Form::model($blog,['method'=>'PATCH','action'=>['BlogsController@update',$blog->id]]) !!}
                            <input type="hidden" name="status" value="1">
                            <input type="hidden" name="is_draft" value="3">
                            <div class="form-group">
                                {!! Form::submit('Draft',['class'=>'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}

                        @else
                            {!! Form::model($blog,['method'=>'PATCH','action'=>['BlogsController@update',$blog->id]]) !!}

                                <input type="hidden" name="status" value="0">
                                <input type="hidden" name="is_draft" value="3">
                                <div class="form-group">
                                    {!! Form::submit('Published',['class'=>'btn btn-info']) !!}
                                </div>
                           {!! Form::close() !!}

                            @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop

