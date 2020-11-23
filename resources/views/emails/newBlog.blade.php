<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Blog Posted</title>
</head>
<body style="padding: 0 10%">

<h1 style="text-align: center; background-color: #eee;color: #737373;padding: 10px">This is Blog Success Posted</h1>
<blockquote>
    @if($user->name)
        <h2> Hi <a href="{{route('admin.users.show',$user->name)}}"></a>{{$user->name}}</h2>
    @endif
    <h3>New It WebSite With Blog {{$blog->title}} has been posted blog in LaraBlog</h3>
        <h4>Category : @foreach($blog->category as $c)
                <span><a href="{{route('admin.categories.show',$c->slug)}}">{{$c->name}}</a></span>
            @endforeach</h4>
</blockquote>
<h2 style="text-align: center;background-color: #1d643b;color: white ">Best wishes</h2>


</body>
</html>
