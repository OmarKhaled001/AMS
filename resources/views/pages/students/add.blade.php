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
                        <li class="breadcrumb-item"><a href="{{route('teachers.index')}}">{{trans('menu.teachers')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('teachers.add')}}</li>
                    </ol>
                </div>
                @include('layouts.helper-errors')
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 mb-30">
                        <div class="card card-statistics">
                            <div class="card-body">
                                <form action="{{route('teachers.store')}}" method="post">
                                    @csrf
                                    <div class="row mt-1">
                                        <div class="col">
                                            <label for="email">{{ trans('teachers.email') }}:</label>
                                            <input class="form-control mt-1" name="email" id="email" >
                                            @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                        <div class="col">
                                            <label for="password">{{ trans('teachers.password') }}:</label>
                                            <input class="form-control mt-1" name="password" id="password" type="password">
                                            @error('password') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col">
                                            <label for="name" class="mb-1 ">{{trans('teachers.lab_name')}}:</label>
                                            <input id="name" type="text" name="name" class="form-control">
                                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                        <div class="col">
                                            <label for="name_en">{{ trans('teachers.lab_name_en') }}:</label>
                                            <input type="text" class="form-control mt-1" name="name_en">
                                            @error('name_en') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                        <div class="col">
                                            <label for="phone">{{ trans('teachers.phone') }}:</label>
                                            <input type="text" class="form-control mt-1" name="phone">
                                            @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col">
                                            <label for="address">{{ trans('teachers.lab_address') }}:</label>
                                            <textarea class="form-control mt-1" name="address" id="address" rows="3"></textarea>
                                            @error('address') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                        <div class="col">
                                            <label for="address_en">{{ trans('teachers.lab_address_en') }}:</label>
                                            <textarea class="form-control mt-1" name="address_en" id="address_en" rows="3"></textarea>
                                            @error('address_en') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col">
                                            <label for="grade_id">{{ trans('sections.grades') }}:</label>
                                            <select name="grade_id" class="form-select mt-1" id="grade_id">
                                                <option value="" selected >{{ trans('sections.choose_grade') }}</option>
                                                @foreach ($grades as $grade)
                                                <option value="{{$grade->id}}">{{$grade->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('grade_id') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>

                                        <div class="col">
                                            <label for="classroom_id">{{ trans('sections.classrooms') }}:</label>
                                            <select name="classroom_id" class="form-select mt-1"  id="classroom_id" >
                                                <option value="" >{{ trans('sections.choose_classroom') }}</option>
                                            </select>
                                            @error('classroom_id') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>

                                        <div class="col">
                                            <label for="section_id">{{ trans('sections.name') }}:</label>
                                            <select name="section_id" class="form-select mt-1"  id="section_id" >
                                                <option value="" >{{ trans('public.choose') }}</option>
                                            </select>
                                            @error('section_id') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>

                                    </div>
                                    <div class="form-group mt-1">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">{{trans('public.add')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
