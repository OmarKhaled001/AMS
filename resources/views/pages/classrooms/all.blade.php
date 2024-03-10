@extends('layouts.master')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="col-12">
                <h1>{{trans('menu.classes')}}</h1>
                </div>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("home")}}">{{trans('menu.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{trans('menu.classes')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('menu.list')}}</li>
                    </ol>
                </div>
                @include('layouts.helper-errors')
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 mb-30">
                        <div class="card card-statistics">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    {{trans('classrooms.add')}}
                                </button>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{trans('classrooms.name')}}</th>
                                        <th>{{trans('grade.name')}}</th>
                                        <th class="text-center">{{trans('public.actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($classrooms)>0)
                                        @foreach ($classrooms as $classroom)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$classroom->name}}</td>
                                                <td>{{$classroom->grade->name}}</td>
                                                <td class="d-flex justify-content-center">
                                                    <div class="px-1"><a href="" data-bs-toggle="modal" data-bs-target="#editModal{{$classroom->id}}"><i class="fa-solid fa-pen-to-square text-success"></i></a></div>
                                                    <div class="px-1"><a href="" data-bs-toggle="modal" data-bs-target="#deleteModal{{$classroom->id}}"><i class="fa-solid fa-trash text-danger"></i></a></div>
                                                </td>
                                            </tr>
                                            @include('pages.classrooms.delete')
                                            @include('pages.classrooms.edit')
                                        @endforeach
                                    @else
                                        <tr>
                                            <th colspan="4" class="text-center text-danger">note found</th>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                                {{$classrooms->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@include('pages.classrooms.add')
@endsection