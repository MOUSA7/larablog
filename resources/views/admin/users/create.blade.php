@extends('layouts.master')

@section('subtitle')
    <a href="#">Create User </a>
@stop
@section('content')

    <div class="container-fluid">

        {!! Form::open(['method'=>'POST','action'=>'UsersController@store','files'=>true]) !!}

        <div class="note note-info">
            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">

                        {!! Form::label('name','Name',['class'=>'form-label']) !!}
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                        @if($errors->has('name'))
                            <div class="error" style="color: red">
                                {{$errors->first('name')}}
                            </div>
                        @endif
                    </div>


                    <div class="form-group">

                        {!! Form::label('password','Password',['class'=>'form-label']) !!}
                        {!! Form::password('password',['class'=>'form-control']) !!}
                        @if($errors->has('password'))
                            <div class="error" style="color: red">
                                {{$errors->first('password')}}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">

                        {!! Form::label('role_id','Role',['class'=>'form-label']) !!}
                        {!! Form::select('role_id',[''=>'choose option']+$roles,null,['id'=>'category','class'=>'form-control']) !!}
                        @if($errors->has('role_id'))
                            <div class="error" style="color: red">
                                {{$errors->first('role_id')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">

                        {!! Form::label('photo_id','file',['class'=>'form-label']) !!}
                        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
                        @if($errors->has('photo_id'))
                            <div class="error" style="color: red">
                                {{$errors->first('photo_id')}}
                            </div>
                        @endif
                    </div>
                </div>


                <div class="col-sm-6">

                    <div class="form-group">

                        {!! Form::label('email','Email',['class'=>'form-label']) !!}
                        {!! Form::email('email',null,['class'=>'form-control my-editor']) !!}
                        @if($errors->has('email'))
                            <div class="error" style="color: red">
                                {{$errors->first('email')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">

                        {!! Form::label('dob','Birth') !!}
                        {!! Form::text('dob',null,['class'=>'form-control','id'=>'datepicker']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('resume','Resume') !!}
                        {!! Form::file('resume',null,['class'=>'form-control']) !!}
                        @if($errors->has('resume'))
                            <div class="error" style="color: red">
                                {{$errors->first('resume')}}
                            </div>
                        @endif

                    </div>

                </div>
            </div>


        </div>
        {!! Form::submit('Save',['class'=>'btn btn-success']) !!}


        {!! Form::close() !!}
    </div>



@stop
