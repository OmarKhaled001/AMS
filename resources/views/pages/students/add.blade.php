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
                                <form action="{{route('students.store')}}" method="post">
                                    @csrf
                                    <div class="row mt-1">
                                        <div class="col">
                                            <label for="email">{{ trans('students.email') }}:</label>
                                            <input class="form-control mt-1" name="email" id="email" >
                                            @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                        <div class="col">
                                            <label for="password">{{ trans('students.password') }}:</label>
                                            <input class="form-control mt-1" name="password" id="password" type="password">
                                            @error('password') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                        <div class="col">
                                            <label for="phone">{{ trans('students.phone') }}:</label>
                                            <input type="text" class="form-control mt-1" name="phone">
                                            @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col">
                                            <label for="name" class="mb-1 ">{{trans('students.lab_name')}}:</label>
                                            <input id="name" type="text" name="name" class="form-control">
                                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                        <div class="col">
                                            <label for="name_en">{{ trans('students.lab_name_en') }}:</label>
                                            <input type="text" class="form-control mt-1" name="name_en">
                                            @error('name_en') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                        <div class="col">
                                            <label for="name" class="mb-1 ">{{trans('students.parent')}}:</label>
                                            <select class="select2 form-select"  name="parent_id">
                                                <option selected>{{trans('parents.choose')}}</option>
                                                @foreach($parents as $parent)
                                                    <option value="{{$parent->id}}">{{$parent->name_father}}</option>
                                                @endforeach
                                            </select>
                                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col">
                                            <label for="gender" class="mb-1 ">{{trans('students.gender')}}:</label>
                                            <select class="select2 form-select"  name="gender">
                                                <option selected>{{trans('parents.choose')}}</option>
                                                <option value="male">{{trans('students.male')}}</option>
                                                <option value="female">{{trans('students.female')}}</option>
                                            </select>
                                            @error('gender') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                        <div class="col">
                                            <label for="academic_year">{{trans('students.academic_year')}}:</label>
                                            <input type="date" class="form-control mt-1" name="academic_year">
                                            @error('academic_year') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                        <div class="col">
                                            <label for="birthdate">{{ trans('students.birthdate') }}:</label>
                                            <input type="date" class="form-control mt-1" name="birthdate">
                                            @error('birthdate') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col">
                                            <label for="nationality" class="mb-1">{{trans('parents.nationality')}}</label>
                                            <select class="select2 form-select"  name="nationality">
                                                <option selected>{{trans('parents.choose')}}</option>
                                                @foreach($nationalities as $nationality)
                                                    <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('nationality')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col">
                                            <label for="blood_type"  class="mb-1">{{trans('parents.blood_type')}}</label>
                                            <select class="select2 form-select" name="blood_type">
                                                <option selected>{{trans('parents.choose')}}</option>
                                                @foreach($bloodTypes as $bloodType)
                                                    <option value="{{$bloodType->id}}">{{$bloodType->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('blood_type')<div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="col">
                                            <label for="religion"  class="mb-1">{{trans('parents.religion')}}</label>
                                            <select class="select2 form-select" name="religion">
                                                <option selected>{{trans('parents.choose')}}</option>
                                                @foreach($religions as $religion)
                                                    <option value="{{$religion->id}}">{{$religion->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('religion')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
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
