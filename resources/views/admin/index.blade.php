@extends('layouts.master')

@section('subtitle')
    <a href="#">Dashboard Page</a>
    <i class="fa fa-circle"></i>
    @stop
@section('title')
    Dashboard System
    @stop

@section('content')


            <h1 class="text-center" style="font-weight: bold; font-style: italic ">Control Panel</h1>

            <br>
            <br>
            <hr>
            <div class="row" >
                <div style="padding-left:100px;margin-left:100px; ">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" >{{$blogs->count()}}</span>
                            </div>
                            <div class="desc"> New Blogs </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" >{{$category->count()}}</span> </div>
                            <div class="desc"> Total Categories </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                        <div class="visual">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" >{{$user->count()}}</span>
                            </div>
                            <div class="desc"> New Users </div>
                        </div>
                    </a>
                </div>
                </div>
            </div>


@endsection
