<!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{trans('classrooms.add')}}</h1>
                <i data-feather='x' data-bs-dismiss="modal" aria-label="Close"></i>
                
            </div>
            <div class="modal-body">
                <form action="{{route('classrooms.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="name" class="mr-sm-2 mb-1">{{trans('classrooms.name')}}:</label>
                            <input id="name" type="text" name="name" class="form-control">
                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        <div class="col">
                            <label for="name_en"class="mr-sm-2 mb-1">{{ trans('classrooms.lab_name') }}:</label>
                            <input type="text" class="form-control" name="name_en">
                            @error('name_en') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <label for="grade_id">{{ trans('classrooms.grades') }}:</label>
                        <select name="grade_id" class="select2 form-select select2-hidden-accessible mt-1" id="select2-basic" data-select2-id="select2-basic" tabindex="-1" aria-hidden="true">
                            <option value=""  data-select2-id="2">{{ trans('classrooms.choose') }}</option>
                            @foreach ($grades as $grade)
                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                            @endforeach
                        </select>
                        @error('grade_id') <p class="text-danger">{{$message}}</p> @enderror
                
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
