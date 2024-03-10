@extends('layouts.master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset("assets/css/wizard.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("app-assets/vendors/css/forms/select/select2.min.css")}}">
@livewireStyles
@endsection
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="col-12">
                <h2>{{trans('menu.parents')}}</h2>
                </div>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("home")}}">{{trans('menu.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{trans('menu.parents')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('menu.add_parent')}}</li>
                    </ol>
                </div>
                @include('layouts.helper-errors')
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-md-12 mb-30">
                    <div class="card card-statistics">
                        <div class="card-body">
                            @livewire('add-parent')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@livewireScripts
<script src="{{asset("app-assets/vendors/js/forms/select/select2.full.min.js")}}"></script>
<script src="{{asset("app-assets/js/scripts/forms/form-select2.js")}}"></script>
@endsection