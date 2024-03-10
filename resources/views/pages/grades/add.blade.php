<!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{trans('grade.add')}}</h1>
                <i data-feather='x' data-bs-dismiss="modal" aria-label="Close"></i>
                
            </div>
            <div class="modal-body">
                <form action="{{route('grades.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="name" class="mr-sm-2">{{trans('grade.lab_name')}}:</label>
                            <input id="name" type="text" name="name" class="form-control">
                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        <div class="col">
                            <label for="name_en"class="mr-sm-2">{{ trans('grade.lab_name_en') }}:</label>
                            <input type="text" class="form-control" name="name_en">
                            @error('name_en') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <label for="notes">{{ trans('grade.lab_notes') }}:</label>
                        <textarea class="form-control" name="notes" id="notes" rows="3"></textarea>
                        @error('notes') <p class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="form-group mt-1">
                        <label for="notes_en">{{ trans('grade.lab_notes_en') }}:</label>
                        <textarea class="form-control" name="notes_en" id="notes_en" rows="3"></textarea>
                        @error('notes_en') <p class="text-danger">{{$message}}</p> @enderror
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
