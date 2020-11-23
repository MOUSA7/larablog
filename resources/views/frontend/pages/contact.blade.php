@extends('layouts._layout')
@section('content')

    <div class="container">
        <div class="row">
            <!-- Latest Posts -->
            <main class="post blog-post col-lg-8">
                <h2>Contact Page</h2>
                <hr>
                <div class="container">
                    @include('partials.error_message')
                    {!! Form::open(['method'=>'POST','action'=>'ContactController@send']) !!}

                    <div class="form-group">

                    {!! Form::label('name','Name') !!}
                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Subject here']) !!}

                    </div>
                    <div class="form-group">
                    {!! Form::label('email','Email') !!}
                    {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Enter Email here']) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('subject','Subject') !!}
                    {!! Form::text('subject',null,['class'=>'form-control','placeholder'=>'Enter Subject here']) !!}
                    </div>


                </div>
            </main>
            <main class="post blog-post col-lg-4">
                <div class="container">
                    <br>
                    <br>

                <div class="form-group">
                    {!! Form::label('mail_message','Message') !!}
                    {!! Form::textarea('mail_message',null,['class'=>'form-control','placeholder'=>'Your Message here','rows'=>8]) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Send',['class'=>'btn btn-success']) !!}
                </div>

                {!! Form::close() !!}
                </div>
            </main>
        </div>
    </div>


@stop
