@extends('layouts.master')

@section('subtitle')
    <a href="#">Display Category </a>
@stop

@section('title')
    <div class="container-fluid">
        <h2>Categories</h2>
        <a class="btn green btn-outline sbold pull-right" data-toggle="modal" data-target="#create" >Create Category</a>
    </div>
@stop


@section('content')

    <div class="note note-info">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#id</th>
                <th>Name</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="categories">
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->created_at->diffForHumans()}}</td>
                    <td>
                        <a class="btn btn-primary btn-xs fa fa-edit edit" data-id="{{$category->id}}"  ></a>
                        @if($category->blog->count() >= 0)
                        <a href="{{route('admin.categories.show',$category->slug)}}" class="btn btn-info btn-xs fa fa-eye"></a>
                        @endif
                        <a  class="confirm btn btn-danger btn-xs"  data-id="{{$category->id}}"><i class="glyphicon glyphicon-trash"></i></a>


                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop

@section('modal')

    <!-- /.create-Category -->
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="form">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Create Category</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name"> Name :</label>
                            <input type="text" name="name" class="form-control" placeholder="Category name">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button name="submit" type="button" id="save" class="btn green">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- /.create-Category -->
    <div id="editModal"></div>
    <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
    <input type="hidden"  name="_method" value="@method('DELETE')">

@stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

$(document).ready(function(){
    $("#save").click(function(){
        var data = $("#form").serialize();
        $.post("categories/create",data).done(function (data) {
            $("#create").modal("hide");
            $("#categories").replaceWith(data);

        });
    });
    $(document).on('click','.edit',function () {

        var id = $(this).data("id");
        $.get("categories/"+id+"/edit").done(function (data) {
            $("#editModal").replaceWith(data);
            $("#editModal").modal('show');
        });

    });
    $(document).on('click','.save_edit',function () {
        var data = $("#edit_form").serialize();
        var id = $("#edit_form").data('id');
        $.post("categories/"+id,data).done(function (data) {
            $("#categories").replaceWith(data);
            $("#editModal").modal('hide');
        });
    });

    $(document).on('click','.confirm',function () {

        var id = $(this).data('id');
        var token = $("#token").val();
        var method = $("#method").val();
        $.post("/categories/delete/"+id,{'_method':method,"_token":token}).done(function (data) {
            $('#categories').replaceWith(data);
        })
    });
});

</script>
