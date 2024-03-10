<!--Delete Modal -->
<div class="modal fade" id="deleteModal{{$student->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">{{trans('students.delete')}} {{$student->name}}</h1>
                <i data-feather='x' data-bs-dismiss="modal" aria-label="Close"></i>
                
            </div>
            <div class="modal-body">
                <form action="{{route('students.destroy', $student->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <h5>{{trans('public.msg_delete')}} {{$student->name}}!</h5>
                    <input type="hidden" id="id" name="id" value=''>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('public.close')}}</button>
                        <button type="submit" class="btn btn-danger">{{trans('public.delete')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
