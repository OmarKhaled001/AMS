<!--Delete Modal -->
<div class="modal fade" id="deleteModal{{$parent->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">{{trans('public.delete')}} {{trans('menu.parents')}}</h1>
                <i data-feather='x' data-bs-dismiss="modal" aria-label="Close"></i>
                
            </div>
            <div class="modal-body">

                    <h5>{{trans('public.msg_delete')}} {{$parent->email}}!</h5>
                    <input type="hidden" id="id" name="id" value=''>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('public.close')}}</button>
                        <button wire:click="delete({{$parent->id}})" type="button" class="btn btn-danger">{{trans('public.delete')}}</button>
                    </div>
            </div>
        </div>
    </div>
</div>
