@extends('layouts.master')

@section('subtitle')
    <a  href="#">Edit Blog </a>
    <a href="{{ URL::previous() }}" class="btn btn-default" style="position: absolute;right: 10px;top: 5px;"> <i class="fa fa-arrow-left"></i> Go Back</a>

@stop

@include('partials.tinymce')

@section('content')

    <div class="container-fluid">
        <div class="container-fluid">
            @include('partials.error_message')
    {!! Form::model($blog,['method'=>'PATCH','action'=>['BlogsController@update',$blog->id],'files'=>true]) !!}

    <div class="note note-info">
        <div class="form-group">

            {!! Form::label('title','Title',['class'=>'form-label']) !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}

        </div>

        <div class="form-group">
            <input type="hidden" name="is_edit" value="1">
            {!! Form::label('body','Body',['class'=>'form-label']) !!}
            {!! Form::textarea('body',null,['class'=>'form-control my-editor']) !!}

        </div>

        <div class="form-group">

            {!! Form::label('category_id','Category',['class'=>'form-label']) !!}
            {!! Form::select('category_id[]',$categories,$blog->category->pluck('id')->toArray() ,['id'=>'category','class'=>'form-control','multiple']) !!}

        </div>

        <div class="form-group">

            {!! Form::label('photo_id','file',['class'=>'form-label']) !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}

        </div>

        <div class="form-group">

            {!! Form::label('meta_desc','Description',['class'=>'form-label']) !!}
            {!! Form::text('meta_desc',$blog->meta_desc,['class'=>'form-control']) !!}

        </div>

    </div>
    {!! Form::submit('Save',['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
        </div>
    </div>


@stop
