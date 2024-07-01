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
                        <li class="breadcrumb-item"><a href="{{route('students.index')}}">{{trans('menu.students')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('students.add')}}</li>
                    </ol>
                </div>
                @include('layouts.helper-errors')
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 mb-30">
                        <div class="card card-statistics">
                            <div class="card-body">
                                <form action="{{route('promotions.store')}}" method="post">
                                    @csrf
                                    
                                    <div class="row mt-1">
                                        <h3 class="mb-1">قديم</h3>
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

                                    <div class="row mt-1">
                                        <h3 class="mb-1">جديد</h3>
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
@section('js')
    <script>
            $(document).ready(function () {
                $('#classroom_id').change(function () {
                    var $section = $('#section_id');
                    $.ajax({
                        url: "{{ route('sections.create') }}",
                        data: {
                            classroom_id: $(this).val()
                        },
                        success: function (data) {
                            $section.html('<option value="" selected>{{ trans('sections.choose_classroom') }}</option>');
                            $.each(data, function (id, value) {
                                $section.append('<option value="' + id + '">' + value + '</option>');
                            });
                        }
                    });
                });
                $('#grade_id').change(function () {
                    var $classroom = $('#classroom_id');
                    $.ajax({
                        url: "{{ route('classrooms.create') }}",
                        data: {
                            grade_id: $(this).val()
                        },
                        success: function (data) {
                            $classroom.html('<option value="" selected>{{ trans('sections.choose_classroom') }}</option>');
                            $.each(data, function (id, value) {
                                $classroom.append('<option value="' + id + '">' + value + '</option>');
                            });
                        }
                    });
                });
            });
        
    </script> 
@endsection
