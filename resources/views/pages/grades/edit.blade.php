<!--Edit Modal -->
<div class="modal fade" id="editModal{{$grade->id}}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">{{trans('public.edit')}} {{$grade->name}}</h1>
                <i data-feather='x' data-bs-dismiss="modal" aria-label="Close"></i>
                
            </div>
            <div class="modal-body">
                <form action="{{route('grades.update', 'test')}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <input id="id" type="hidden" name="id" class="form-control" value="{{$grade->id}}">
                        <div class="col">
                            <label for="name" class="mr-sm-2">{{trans('grade.name')}}:</label>
                            <input id="name" type="text" name="name" class="form-control" value="{{$grade->name}}">
                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <label for="exampleFormControlTextarea1">{{ trans('grade.notes') }}:</label>
                        <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3">{{$grade->notes}}</textarea>
                        @error('notes') <p class="text-danger">{{$message}}</p> @enderror
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
