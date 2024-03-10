@extends('layouts.master')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="col-12">
                <h2 >{{trans('menu.grades')}}</h2>
                </div>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("home")}}">{{trans('menu.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{trans('menu.grades')}}</a></li>
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
                                    {{trans('grade.add')}}
                                </button>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{trans('grade.name')}}</th>
                                        <th>{{trans('grade.notes')}}</th>
                                        <th class="text-center">{{trans('public.actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($grades)>0)
                                        @foreach ($grades as $grade)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$grade->name}}</td>
                                                <td>{{$grade->notes}}</td>
                                                <td class="d-flex justify-content-center">
                                                    <div class="px-1"><a href="" data-bs-toggle="modal" data-bs-target="#editModal{{$grade->id}}"><i class="fa-solid fa-pen-to-square text-success"></i></a></div>
                                                    <div class="px-1"><a href="" data-bs-toggle="modal" data-bs-target="#deleteModal{{$grade->id}}"><i class="fa-solid fa-trash text-danger "></i></a></div>
                                                </td>
                                            </tr>
                                            @include('pages.grades.delete')
                                            @include('pages.grades.edit')
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
@include('pages.grades.add')
@endsection