@if ($currentStep == 3)
<div  class="row setup-content" id="step-3">
    <div class="row">
        <div class="col-12"><br>
            <h3 class="card-title">{{trans('parents.attachments')}}</h3>
            <br>
            <input type="hidden" wire:model.live="parent_id">
            <div class="btns">
                <button class="btn btn-danger btn-md pull-right" type="button" wire:click="back(2)">{{ trans('parents.back') }}</button>
                @if($updateMode)
                    <button class="btn btn-success btn-md pull-right" wire:click="submitFormEdit" type="button">{{trans('parents.finish')}}
                    </button>
                @else
                    <button class="btn btn-success btn-md pull-right" wire:click="submitForm" type="button">{{ trans('parents.finish') }}</button>
                @endif
            </div>
        </div>
    </div>
</div>    
@endif  