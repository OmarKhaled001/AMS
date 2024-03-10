@extends('layouts.master')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="col-12">
                <h2 >{{trans('menu.teachers')}}</h2>
                </div>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("home")}}">{{trans('menu.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{trans('menu.teachers')}}</a></li>
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
                                <a type="button" class="btn btn-primary mb-1" href="{{route('teachers.create')}}">
                                    {{trans('teachers.add')}}
                                </a>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{trans('teachers.name')}}</th>
                                        <th>{{trans('teachers.email')}}</th>
                                        <th>{{trans('teachers.phone')}}</th>
                                        <th>{{trans('teachers.specializations')}}</th>
                                        <th class="text-center">{{trans('public.actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($teachers)>0)
                                        @foreach ($teachers as $teacher)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$teacher->name}}</td>
                                                <td>{{$teacher->email}}</td>
                                                <td>{{$teacher->phone}}</td>
                                                <td>{{$teacher->specialization->name}}</td>
                                                <td class="d-flex justify-content-center">
                                                    <div class="px-1"><a href="" data-bs-toggle="modal" data-bs-target="#editModal{{$teacher->id}}"><i class="fa-solid fa-pen-to-square text-success"></i></a></div>
                                                    <div class="px-1"><a href="" data-bs-toggle="modal" data-bs-target="#deleteModal{{$teacher->id}}"><i class="fa-solid fa-trash text-danger "></i></a></div>
                                                </td>
                                            </tr>
                                            @include('pages.teachers.edit')
                                            @include('pages.teachers.delete')
                                        @endforeach
                                    @else
                                        <tr>
                                            <th colspan="4" class="text-center text-danger">note found</th>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection