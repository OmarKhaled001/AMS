<!--Edit Modal -->
<div class="modal fade" id="editModal{{$section->id}}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">{{trans('public.edit')}} {{$section->name}}</h1>
                <i data-feather='x' data-bs-dismiss="modal" aria-label="Close"></i>
            </div>
            <div class="modal-body">
                <form action="{{route('sections.update', 'test')}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <input id="name"  type="hidden" name="id" class="form-control" value="{{$section->id}}">
                        <div class="col">
                            <label for="name" class="mr-sm-2">{{trans('sections.lab_name')}}:</label>
                            <input id="name" type="text" name="name" class="form-control" value="{{$section->name}}">
                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <label for="grade_id">{{ trans('sections.grades') }}:</label>
                        <select name="grade_id" class="select2 form-select mt-1" id="grade_id">
                            @foreach ($grades as $grade)
                            <option value="{{$grade->id}}" {{$grade->id == $section->grade_id ? 'selected':"" }}>{{$grade->name}}</option>
                            @endforeach
                        </select>
                        @error('grade_id') <p class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="form-group mt-1" id="classroom" >
                        <label for="classroom_id">{{ trans('sections.classrooms') }}:</label>
                        <select name="classroom_id" class="select2 form-select mt-1" id="classroom_id" >
                            @foreach ($grade->classrooms as $classroom)
                            <option value="{{$classroom->id}}" {{$classroom->id == $section->classroom_id ? 'selected':"" }}>{{$classroom->name}}</option>
                            @endforeach
                        </select>
                        @error('classroom_id') <p class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="form-group mt-1">
                        <label for="select2-multiple">{{ trans('teachers.name') }}:</label>
                        <select name="teacher_id[]" placeholder="{{ trans('sections.choose_grade') }}"  class="select2 form-select mt-1" id="select2-multiple" multiple>
                            @foreach ($teachers as $teacher)
                            <option value="{{$teacher->id}}" {{$teacher->id == $section->teacher_id ? 'selected':"" }}>{{$teacher->name}}</option>
                            @endforeach
                        </select>
                        @error('teacher_id') <p class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('public.close')}}</button>
                        <button type="submit" class="btn btn-success">{{trans('public.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
