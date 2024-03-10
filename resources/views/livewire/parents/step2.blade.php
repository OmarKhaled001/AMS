{{-- Mother Form --}}
@if($currentStep == 2)
<div class="row setup-content" id="step-1">
    <div class="row mt-1">
        <div class="col">
            <label for="title" class="mb-1">{{trans('parents.name_mother')}}</label>
            <input type="text" wire:model="name_mother" class="form-control" >
            @error('name_mother')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="title" class="mb-1">{{trans('parents.name_mother_en')}}</label>
            <input type="text" wire:model="name_mother_en" class="form-control" >
            @error('name_mother_en')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mt-1">
        <div class="col">
            <label for="title"  class="mb-1">{{trans('parents.job')}}</label>
            <input type="text" wire:model="job_mother" class="form-control">
            @error('job_mother')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="title" class="mb-1">{{trans('parents.job_en')}}</label>
            <input type="text" wire:model="job_mother_en" class="form-control">
            @error('job_mother_en')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mt-1">
        <div class="col">
            <label for="title"  class="mb-1">{{trans('parents.national_id')}}</label>
            <input type="text" wire:model="national_id_mother" class="form-control">
            @error('national_id_mother')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="title"  class="mb-1">{{trans('parents.passport_id')}}</label>
            <input type="text" wire:model="passport_id_mother" class="form-control">
            @error('passport_id_mother')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="title"  class="mb-1">{{trans('parents.phone')}}</label>
            <input type="text" wire:model="phone_mother" class="form-control">
            @error('phone_mother')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mt-1">
        <div class="col">
            <label for="inputCity" class="mb-1">{{trans('parents.nationality')}}</label>
            <select class="select2 form-select"  wire:model="nationality_mother_id">
                <option selected>{{trans('parents.choose')}}</option>
                @foreach($nationalities as $nationality)
                    <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                @endforeach
            </select>
            @error('nationality_mother_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="inputState"  class="mb-1">{{trans('parents.blood_type')}}</label>
            <select class="select2 form-select" wire:model="blood_type_mother_id">
                <option selected>{{trans('parents.choose')}}</option>
                @foreach($bloodTypes as $bloodType)
                    <option value="{{$bloodType->id}}">{{$bloodType->name}}</option>
                @endforeach
            </select>
            @error('blood_type_mother_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="inputZip"  class="mb-1">{{trans('parents.religion')}}</label>
            <select class="select2 form-select" wire:model="religion_mother_id">
                <option selected>{{trans('parents.choose')}}</option>
                @foreach($religions as $religion)
                    <option value="{{$religion->id}}">{{$religion->name}}</option>
                @endforeach
            </select>
            @error('religion_mother_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row p-1">
        <div class="col">
            <label for="address"  class="mb-1">{{trans('parents.address_mother')}}</label>
            <textarea class="form-control" wire:model="address_mother" id="address" rows="4"></textarea>
            @error('address_mother')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <div class="col">
                <label for="address"  class="mb-1">{{trans('parents.address_mother_en')}}</label>
                <textarea class="form-control" wire:model="address_mother_en" id="address" rows="4"></textarea>
                @error('address_mother_en')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="mt-1">
        <button class="btn btn-danger btn-md pull-right" type="button" wire:click="back(1)">
            {{trans('parents.back')}}
        </button>
        @if($updateMode)
            <button class="btn btn-primary  btn-md pull-right" wire:click="secondStepSubmitEdit" type="button">{{trans('parents.next')}}</button>
        @else
            <button class="btn btn-primary  btn-md pull-right" wire:click="secondStepSubmit" type="button" >{{trans('parents.next')}}</button>
        @endif
    </div>
</div>
@endif
