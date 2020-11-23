@extends('layouts.master')

@section('subtitle')
    <a href="#">Create Blog </a>
@stop
@include('partials.tinymce')

@section('content')

    <div class="container-fluid">
        <div class="container-fluid">
            @include('partials.error_message')
            {!! Form::open(['method'=>'POST','action'=>'BlogsController@store','files'=>true]) !!}

            <div class="note note-info">

                <div class="form-group">

                    {!! Form::label('title','Title',['class'=>'form-label']) !!}
                    {!! Form::text('title',null,['class'=>'form-control']) !!}

                </div>

                <div class="form-group">

                    {!! Form::label('body','Body',['class'=>'form-label']) !!}
                    {!! Form::textarea('body',null,['class'=>'form-control my-editor']) !!}

                </div>

                <div class="form-group">

                    {!! Form::label('category_id','Category',['class'=>'form-label']) !!}
                    {!! Form::select('category_id[]',$categories,null,['id'=>'category','class'=>'form-control','multiple']) !!}

                </div>

                <div class="form-group">

                    {!! Form::label('photo_id','file',['class'=>'form-label']) !!}
                    {!! Form::file('photo_id',null,['class'=>'form-control']) !!}

                </div>

                <div class="form-group">

                    {!! Form::label('meta_desc','Description',['class'=>'form-label']) !!}
                    {!! Form::text('meta_desc',null,['class'=>'form-control']) !!}

                </div>

            </div>

            {!! Form::submit('Save',['class'=>'btn btn-success']) !!}


            {!! Form::close() !!}
        </div>
    </div>



    @stop


