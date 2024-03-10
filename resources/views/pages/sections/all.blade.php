@extends('layouts.master')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="col-12">
                <h1>{{trans('menu.sections')}}</h1>
                </div>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("home")}}">{{trans('menu.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{trans('menu.sections')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('menu.list')}}</li>
                    </ol>
                </div>
                @include('layouts.helper-errors')
            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            {{ trans('sections.add') }}
                        </button>
                        @foreach ($grades_list as $grade)
                        <div class="accordion accordion-border" id="accordionExample">
                            <div class="accordion-item ">
                                <h2 class="accordion-header" id="heading{{$grade->id}}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion{{$grade->id}}" aria-expanded="false" aria-controls="accordion{{$grade->id}}">
                                        {{$grade->name}}
                                    </button>
                                </h2>
                                <div id="accordion{{$grade->id}}" class="accordion-collapse  collapse" aria-labelledby="heading{{$grade->id}}" style="">
                                    <div class="accordion-body">
                                        <table class="table text-center">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{trans('sections.name')}}</th>
                                                <th>{{trans('sections.classrooms')}}</th>
                                                <th>{{trans('sections.status')}}</th>
                                                <th class="text-center">{{trans('public.actions')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if (count($grade->sections)>0)
                                            @foreach ($grade->sections as $section)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$section->name}}</td>
                                                    <td>{{$section->classroom->name}}</td>
                                                    <td>{{$section->status == 1 ? trans('public.enabled'):trans('public.not_enabled')}} <span class="badge  bg-{{$section->status == 1 ? 'success':'danger'}} "> </span></td>
                                                    <td class="d-flex justify-content-center">
                                                        <div class="px-1"><a href="" data-bs-toggle="modal" data-bs-target="#editModal{{$section->id}}"><i class="fa-solid fa-pen-to-square text-success"></i></a></div>
                                                        <div class="px-1"><a href="" data-bs-toggle="modal" data-bs-target="#deleteModal{{$section->id}}"><i class="fa-solid fa-trash text-danger "></i></a></div>
                                                    </td>
                                                </tr>
                                                @include('pages.sections.delete')
                                                @include('pages.sections.edit')
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
                            
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.sections.add')
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $('#grade_id').change(function () {
            var $classroom = $('#classroom_id');
            $.ajax({
                url: "{{ route('sections.create') }}",
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
            $('#classroom').removeClass('d-none');
        });
    }); 
</script>

@endpush
@section('js')
@endsection