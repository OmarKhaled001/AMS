@extends('layouts.master')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="col-12">
                <h2 >{{trans('menu.students')}}</h2>
                </div>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("home")}}">{{trans('menu.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{trans('menu.students')}}</a></li>
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
                                <a type="button" class="btn btn-primary mb-1" href="{{route('students.create')}}">
                                    {{trans('students.add')}}
                                </a>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{trans('students.name')}}</th>
                                        <th>{{trans('students.email')}}</th>
                                        <th>{{trans('students.phone')}}</th>
                                        <th>{{trans('classrooms.name')}}</th>
                                        <th class="text-center">{{trans('public.actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($students)>0)
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$student->name}}</td>
                                                <td>{{$student->email}}</td>
                                                <td>{{$student->phone}}</td>
                                                <td>{{$student->classroom->name}}</td>
                                                <td class="d-flex justify-content-center">
                                                    <div class="px-1"><a href="" data-bs-toggle="modal" data-bs-target="#editModal{{$student->id}}"><i class="fa-solid fa-pen-to-square text-success"></i></a></div>
                                                    <div class="px-1"><a href="" data-bs-toggle="modal" data-bs-target="#deleteModal{{$student->id}}"><i class="fa-solid fa-trash text-danger "></i></a></div>
                                                </td>
                                            </tr>
                                            @include('pages.students.edit')
                                            @include('pages.students.delete')
                                        @endforeach
                                    @else
                                        <tr>
                                            <th colspan="6" class="text-center text-danger">note found</th>
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