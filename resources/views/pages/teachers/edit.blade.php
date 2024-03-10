<!--Edit Modal -->
<div class="modal fade" id="editModal{{$teacher->id}}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">{{trans('public.edit')}} {{$teacher->name}}</h1>
                <i data-feather='x' data-bs-dismiss="modal" aria-label="Close"></i>
                
            </div>
            <div class="modal-body">
                <form action="{{route('teachers.update', 'test')}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input id="id" type="hidden" name="id" class="form-control" value="{{$teacher->id}}">
                        <div class="col">
                            <label for="name" class="mr-sm-2">{{trans('teachers.name')}}:</label>
                            <input id="name" type="text" name="name" class="form-control" value="{{$teacher->name}}">
                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <label for="email" class="mr-sm-2">{{trans('teachers.email')}}:</label>
                            <input id="email" type="text" name="email" class="form-control" value="{{$teacher->email}}">
                            @error('email') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        <div class="col">
                            <label for="phone" class="mr-sm-2">{{trans('teachers.phone')}}:</label>
                            <input id="phone" type="text" name="phone" class="form-control" value="{{$teacher->phone}}">
                            @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <label for="grade_id">{{ trans('teachers.grades') }}:</label>
                            <select name="grade_id" class="select2 form-select mt-1" id="grade_id">
                                @foreach ($grades as $grade)
                                <option value="{{$grade->id}}" {{$grade->id == $teacher->grade_id ? 'selected':"" }}>{{$grade->name}}</option>
                                @endforeach
                            </select>
                            @error('grade_id') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        <div class="col">
                            <label for="specialization_id">{{ trans('teachers.grades') }}:</label>
                            <select name="specialization_id" class="select2 form-select mt-1" id="specialization_id">
                                @foreach ($specializations as $specialization)
                                <option value="{{$specialization->id}}" {{$specialization->id == $teacher->specialization_id ? 'selected':"" }}>{{$specialization->name}}</option>
                                @endforeach
                            </select>
                            @error('specialization_id') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <label for="address">{{ trans('teachers.address') }}:</label>
                        <textarea class="form-control" name="address" id="address" rows="3">{{$teacher->address}}</textarea>
                        @error('address') <p class="text-danger">{{$message}}</p> @enderror
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
