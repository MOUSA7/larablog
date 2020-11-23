@extends('layouts.master')

@section('subtitle')
    <a href="#">Show Blog </a>
@stop

@section('title')
    <small><h2>Profile</h2></small>
@stop


@section('content')

    <div class="container-fluid">
        <div class="col-sm-4">

            {!! Form::model($user,['method'=>'PUT','action'=>['UsersController@show',$user->id]]) !!}

            <div class="form-group">

                {!! Form::label('name','Name') !!}
                {!! Form::text('name',$user->name,['class'=>'form-control ','disabled']) !!}

            </div>

            <div class="form-group">

                {!! Form::label('email','Email') !!}
                {!! Form::text('email',$user->email,['class'=>'form-control ','disabled']) !!}

            </div>

            <div class="form-group">

                {!! Form::label('role_id','Role') !!}
                {!! Form::select('role_id',$roles,null,['class'=>'form-control ','disabled']) !!}

            </div>

            <div class="form-group">

                {!! Form::label('password','Password') !!}
                {!! Form::input('password',$user->password,'password',['class'=>'form-control','disabled']) !!}

            </div>

            {!! Form::close() !!}

            <h3>Latest Blog</h3>
            <hr>
            @if($user->blog)
                <ul>

                    @foreach($user->blog as $blog)


                        <li style="list-style: none">
                            <button class="btn btn-success btn-xs">{{$blog->status == 0 ?'Draft':'Published'}}</button>
                            <a href="{{route('larablog.show',$blog->slug)}}"> {{$blog->title}} </a>
                        </li>

                    @endforeach

                </ul>
            @endif

        </div>

        <div class="col-sm-4">

            {!! Form::model($user,['method'=>'PUT','action'=>['UsersController@show',$user->id]]) !!}

            <div class="form-group">

                {!! Form::label('facebook','facebook') !!}
                {!! Form::text('facebook','facebook',['class'=>'form-control ','disabled']) !!}

            </div>

            <div class="form-group">

                {!! Form::label('about','About') !!}
                {!! Form::text('about','about',['class'=>'form-control ','disabled']) !!}

            </div>

            <div class="form-group">

                {!! Form::label('dob','Birth') !!}
                {!! Form::text('dob','12/4/2012',['class'=>'form-control ','disabled']) !!}

            </div>


            {!! Form::close() !!}


        </div>


        <div class="col-sm-4">
            <h3>&nbsp;&nbsp; Photograph</h3>
            <div class="portlet-body">
                <div class="mt-element-card mt-element-overlay">
                    <div class="row">
                        <div class="col-lg-8 col-md-5 col-sm-6 col-xs-12">
                            <div class="mt-card-item">
                                <div class="mt-card-avatar mt-overlay-1">
                                    <img src="/images/{{$user->photo ? $user->photo->file :'https://placehold.it/400x400'}}"
                                         class="img-responsive img-rounded" />

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div>
                <h2 class="fa fa-credit-card">&nbsp<a href="{{Storage::url('uploads/'.$user->resume)}}">{{$user->resume}}</a></h2>
                <br>
                <hr>
            </div>
            <br>
            <a href="{{route('admin.users.edit',$user->name)}}" class="btn btn-primary">Profile setting </a>

        </div>

    </div>

@stop
