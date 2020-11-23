@extends('layouts.master')

@section('subtitle')
    <a href="#">Display Test </a>
@stop


@section('content')

    <h2>Vue JS</h2>

    <Test-Component></Test-Component>

    <script src="{{ mix('js/app.js') }}"></script>
    @endsection
