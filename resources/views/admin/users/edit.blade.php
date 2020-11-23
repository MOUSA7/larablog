@extends('layouts.master')

@section('subtitle')
    <a href="#">Create User </a>
@stop
@section('content')

            @include('partials.error_message')
            {!! Form::model($user,['method'=>'PATCH','action'=>['UsersController@update',$user->id],'files'=>true]) !!}
            <div class="row">
                <div class="col-sm-8">
            <div class="note note-info">

                <div class="form-group">

                    {!! Form::label('name','Name',['class'=>'form-label']) !!}
                    {!! Form::text('name',$user->name,['class'=>'form-control']) !!}

                </div>

                <div class="form-group">

                    {!! Form::label('email','Email',['class'=>'form-label']) !!}
                    {!! Form::email('email',$user->email,['class'=>'form-control']) !!}

                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password:') !!}
                    {!! Form::password('password', ['class'=>'form-control'])!!}
                </div>


                <div class="form-group">

                    {!! Form::label('role_id','Role',['class'=>'form-label']) !!}
                    {!! Form::select('role_id',$roles,null,['class'=>'form-control']) !!}

                </div>

                <div class="form-group">

                    {!! Form::label('resume','Resume :') !!}
                    {!! Form::file('resume',null,['class'=>'form-control']) !!}

                </div>

            </div>
                    <div >
                        {!! Form::submit('Save',['class'=>'btn btn-success']) !!}
                    </div>
                </div>

        <div class="col-sm-4">
            @if($user->photo_id == '400x400.png')

                <img src="{{asset('/assets/pages/img/avatars/dsa.jpg')}}" width="100%" style="width: 100%"; >
            @else
                <img src="/images/{{$user->photo ? $user->photo->file:''}}" width="100%" style="width: 100%"; >
            @endif
                <hr>
                <input type="hidden" name="is_update" value="1">

            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}

             <h2 class="fa fa-credit-card">&nbsp<a href="{{Storage::url('uploads/'.$user->resume)}}">{{$user->resume}}</a></h2>

           {!! Form::close() !!}

                @if(empty($user->resume))
                    <p style="color:red">Please Upload Resume</p>
                @endif

        </div>

    </div>

@stop
