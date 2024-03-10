<!--Edit Modal -->
<div class="modal fade" id="editModal{{$student->id}}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">{{trans('public.edit')}} {{$student->name}}</h1>
                <i data-feather='x' data-bs-dismiss="modal" aria-label="Close"></i>
                
            </div>
            <div class="modal-body">
                <form action="{{route('students.update', 'test')}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input id="id" type="hidden" name="id" class="form-control" value="{{$student->id}}">
                        <div class="col">
                            <label for="name" class="mr-sm-2">{{trans('students.name')}}:</label>
                            <input id="name" type="text" name="name" class="form-control" value="{{$student->name}}">
                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col">
                            <label for="email" class="mr-sm-2">{{trans('students.email')}}:</label>
                            <input id="email" type="text" name="email" class="form-control" value="{{$student->email}}">
                            @error('email') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        <div class="col">
                            <label for="phone" class="mr-sm-2">{{trans('students.phone')}}:</label>
                            <input id="phone" type="text" name="phone" class="form-control" value="{{$student->phone}}">
                            @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    {{-- <div class="row mt-1">
                        <div class="col">
                            <label for="grade_id">{{ trans('students.grades') }}:</label>
                            <select name="grade_id" class="select2 form-select mt-1" id="grade_id">
                                @foreach ($grades as $grade)
                                <option value="{{$grade->id}}" {{$grade->id == $student->grade_id ? 'selected':"" }}>{{$grade->name}}</option>
                                @endforeach
                            </select>
                            @error('grade_id') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        <div class="col">
                            <label for="specialization_id">{{ trans('students.grades') }}:</label>
                            <select name="specialization_id" class="select2 form-select mt-1" id="specialization_id">
                                @foreach ($specializations as $specialization)
                                <option value="{{$specialization->id}}" {{$specialization->id == $student->specialization_id ? 'selected':"" }}>{{$specialization->name}}</option>
                                @endforeach
                            </select>
                            @error('specialization_id') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div> --}}
                    <div class="form-group mt-1">
                        <label for="address">{{ trans('students.address') }}:</label>
                        <textarea class="form-control" name="address" id="address" rows="3">{{$student->address}}</textarea>
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
