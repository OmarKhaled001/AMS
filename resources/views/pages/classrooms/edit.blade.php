<!--Edit Modal -->
<div class="modal fade" id="editModal{{$classroom->id}}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">{{trans('public.edit')}} {{$classroom->name}}</h1>
                <i data-feather='x' data-bs-dismiss="modal" aria-label="Close"></i>
                
            </div>
            <div class="modal-body">
                <form action="{{route('classrooms.update', 'test')}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <input id="id" type="hidden" name="id" class="form-control" value="{{$classroom->id}}">
                        <div class="col">
                            <label for="name" class="mr-sm-2">{{trans('classrooms.name')}}:</label>
                            <input id="name" type="text" name="name" class="form-control" value="{{$classroom->name}}">
                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <label for="grade_id" class="mr-sm-2">{{ trans('classrooms.choose') }}:</label>
                        <select name="grade_id" class="select2 form-select">
                            @foreach ($grades as $grade)
                            <option value="{{$grade->id}}" {{$grade->id == $classroom->grade_id ? 'selected':"" }}>{{$grade->name}}</option>
                            @endforeach
                        </select>
                        @error('grade_id') <p class="text-danger">{{$message}}</p> @enderror
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
