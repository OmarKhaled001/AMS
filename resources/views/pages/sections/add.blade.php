<!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ trans('sections.add') }}</h1>
                <i data-feather='x' data-bs-dismiss="modal" aria-label="Close"></i>
                
            </div>
            <div class="modal-body">
                <form action="{{route('sections.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="name" class="mr-sm-2">{{trans('sections.lab_name')}}:</label>
                            <input id="name" type="text" name="name" class="form-control">
                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        <div class="col">
                            <label for="name_en"class="mr-sm-2">{{ trans('sections.lab_name_en') }}:</label>
                            <input type="text" class="form-control" name="name_en">
                            @error('name_en') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <label for="grade_id">{{ trans('sections.grades') }}:</label>
                        <select name="grade_id" class="select2 form-select mt-1" id="grade_id">
                            <option value="" selected >{{ trans('sections.choose_grade') }}</option>
                            @foreach ($grades as $grade)
                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                            @endforeach
                        </select>
                        @error('grade_id') <p class="text-danger">{{$message}}</p> @enderror
                    </div>

                    <div class="form-group mt-1 d-none" id="classroom">
                        <label for="classroom_id">{{ trans('sections.classrooms') }}:</label>
                        <select name="classroom_id" class="form-select mt-1"  id="classroom_id" >
                            <option value="" >{{ trans('sections.choose_classroom') }}</option>
                        </select>
                        @error('classroom_id') <p class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="form-group mt-1">
                        <label for="select2-multiple">{{ trans('teachers.name') }}:</label>
                        <select name="teacher_id[]" placeholder="{{ trans('sections.choose_grade') }}"  class="select2 form-select mt-1" id="select2-multiple" multiple>
                            @foreach ($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                            @endforeach
                        </select>
                        @error('teacher_id') <p class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('public.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{trans('public.add')}}</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
