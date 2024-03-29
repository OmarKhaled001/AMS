@extends('layouts.master')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="col-12">
                <h2 class="content-header-title float-start mb-0">{{trans('menu.home')}}</h2>
                </div>
            </div>
            <div class="content-body">
            <h1>Welcome {{Auth::user()->name}}</h1>
            </div>
        </div>
    </div>
</div>
@endsection