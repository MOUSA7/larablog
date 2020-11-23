<tbody id="categories">
@foreach($categories as $category)
    <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td>{{$category->created_at->diffForHumans()}}</td>
        <td>
            <a class="btn btn-primary btn-xs fa fa-edit edit" data-id="{{$category->id}}"  ></a>
            <a href="{{route('admin.categories.show',$category->slug)}}" class="btn btn-info btn-xs fa fa-eye"></a>
            <a class="btn btn-danger btn-xs confirm" data-id="{{$category->id}}" ><i class="glyphicon glyphicon-trash"></i></a>


        </td>
    </tr>
@endforeach
</tbody>
