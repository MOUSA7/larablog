@extends('layouts.master')

@section('subtitle')
    <a href="#">Display Blog </a>
    @stop

@section('title')
    <div class="container-fluid">
        <h2>Blogs</h2>
       <a href="{{route('admin.blogs.create')}}" class="btn btn-success pull-right " >create blogs</a>
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
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>{{$blog->title}}</td>
                <td>{!! Str::limit($blog->body,17) !!}</td>
                <td>{{$blog->created_at->diffForHumans()}}</td>
           <td>
                    <a href="{{route('admin.blogs.edit',$blog->id)}}" class="btn btn-primary btn-xs fa fa-edit"></a>
                    <a href="{{route('admin.blogs.show',$blog->slug)}}" class="btn btn-info btn-xs fa fa-eye"></a>
                    <a href="/admin/blogs/{{$blog->id}}/delete" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>


                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @stop
<script>
    $(function(){
        //$("#Confirm").modal("show");
        $(document).on("click",".Confirm",function(){
            $("#Confirm").modal("show");
            $("#Confirm .btn-danger").attr("href",$(this).attr("href"));
            return false;
        });
    });
</script>
