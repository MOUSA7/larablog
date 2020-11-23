@extends('layouts.master')

@section('subtitle')
    <a href="#">Display Users </a>
@stop

@section('title')
    <div class="container-fluid">
        <h2>Users</h2>
        <a href="{{route('admin.users.create')}}" class="btn btn-success pull-right " >Create User</a>
    </div>
@stop


@section('content')

    <div class="note note-info">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>Email</th>
                <th>Joined</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <h1 class="hidden"> {{$id = 1}}</h1>
            @foreach($users as $user)
                <tr>
                    <td>{{$id++}}</td>
                    <td>{!! $user->name !!}</td>
                    <td>{!! $user->email !!}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>
                    {!! Form::model($user,['method'=>'PATCH','action'=>['UsersController@update',$user->id]]) !!}

                        <input type="hidden" name="is_edit" value="is_edit">

                    {!! Form::select('role_id',[''=>'choose option'] +$roles,null,['class'=>'form-control']) !!}
                    <td>{!! Form::submit('save',['class'=>'btn btn-success']) !!}</td>
                    {!! Form::close() !!}
                    </td>
{{--                    <td>{{Str::upper($user->role->name)}}</td>--}}
                    <td>
                        <a href="{{route('admin.users.edit',$user->name)}}" class="btn btn-primary btn-xs fa fa-edit"></a>
                        <a href="{{route('admin.users.show',$user->name)}}" class="btn btn-info btn-xs fa fa-eye"></a>
                        <a href="users/{{$user->id}}/delete" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>


                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop

