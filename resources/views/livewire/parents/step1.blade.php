{{-- Father Form --}}
@if($currentStep == 1)
<div class="row setup-content" id="step-1">
    <div class="row mb-1">
        <div class="col">
            <label for="title" class="mb-1">{{trans('parents.email')}}</label>
            <input type="email"  wire:model="email"  class="form-control">
            @error('email')
            <div class="text-danger p-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="title" class="mb-1">{{trans('parents.password')}}</label>
            <input type="password" wire:model="password" class="form-control" >
            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mt-1">
        <div class="col">
            <label for="title" class="mb-1">{{trans('parents.name_father')}}</label>
            <input type="text" wire:model="name_father" class="form-control" >
            @error('name_father')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="title" class="mb-1">{{trans('parents.name_father_en')}}</label>
            <input type="text" wire:model="name_father_en" class="form-control" >
            @error('name_father_en')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mt-1">
        <div class="col">
            <label for="title"  class="mb-1">{{trans('parents.job')}}</label>
            <input type="text" wire:model="job_father" class="form-control">
            @error('job_father')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="title" class="mb-1">{{trans('parents.job_en')}}</label>
            <input type="text" wire:model="job_father_en" class="form-control">
            @error('job_father_en')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mt-1">
        <div class="col">
            <label for="nationality_father_id" class="mb-1">{{trans('parents.nationality')}}</label>
            <select class="select2 form-select"  wire:model="nationality_father_id">
                <option selected>{{trans('parents.choose')}}</option>
                @foreach($nationalities as $nationality)
                    <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                @endforeach
            </select>
            @error('nationality_father_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="blood_type_father_id"  class="mb-1">{{trans('parents.blood_type')}}</label>
            <select class="select2 form-select" wire:model="blood_type_father_id">
                <option selected>{{trans('parents.choose')}}</option>
                @foreach($bloodTypes as $bloodType)
                    <option value="{{$bloodType->id}}">{{$bloodType->name}}</option>
                @endforeach
            </select>
            @error('blood_type_father_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="religion_father_id"  class="mb-1">{{trans('parents.religion')}}</label>
            <select class="select2 form-select" wire:model="religion_father_id">
                <option selected>{{trans('parents.choose')}}</option>
                @foreach($religions as $religion)
                    <option value="{{$religion->id}}">{{$religion->name}}</option>
                @endforeach
            </select>
            @error('religion_father_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mt-1">
        <div class="col">
            <label for="national_id_father"  class="mb-1">{{trans('parents.national_id')}}</label>
            <input type="text" wire:model="national_id_father" class="form-control">
            @error('national_id_father')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="passport_id_father"  class="mb-1">{{trans('parents.passport_id')}}</label>
            <input type="text" wire:model="passport_id_father" class="form-control">
            @error('passport_id_father')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="phone_father"  class="mb-1">{{trans('parents.phone')}}</label>
            <input type="text" wire:model="phone_father" class="form-control">
            @error('phone_father')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row p-1">
        <div class="col">
            <label for="address"  class="mb-1">{{trans('parents.address_father')}}</label>
            <textarea class="form-control" wire:model="address_father" id="address" rows="4"></textarea>
            @error('address_father')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="address"  class="mb-1">{{trans('parents.address_father_en')}}</label>
            <textarea class="form-control" wire:model="address_father_en" id="address" rows="4"></textarea>
            @error('address_father_en')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="mt-1">
        @if($updateMode)
            <button class="btn btn-primary  btn-md pull-right" wire:click="firstStepSubmitEdit"
                    type="button">{{trans('parents.next')}}
            </button>
        @else
            <button class="btn btn-primary btn-md pull-right" wire:click="firstStepSubmit"
                    type="button">{{trans('parents.next')}}
            </button>
        @endif
    </div>
</div>
@endif
