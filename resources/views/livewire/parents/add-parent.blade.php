<div>

    @if ($show_table)
        {{-- Show All Parents --}}
        @include('livewire.parents.all-parent')
    @else
        <!-- Forme Add Parents -->
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a type="button" wire:click="firstStepSubmit"
                        class="btn {{ $currentStep != 1 ? 'btn-secondary' : 'btn-primary' }}">1</a>
                    <p>{{ trans('parents.Step1') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a  type="button" wire:click="firstStepSubmit"
                        class="btn {{ $currentStep != 2 ? 'btn-secondary' : 'btn-primary' }}">2</a>
                    <p>{{ trans('parents.Step2') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a type="button" wire:click="secondStepSubmit"
                        class="btn {{ $currentStep != 3 ? 'btn-secondary' : 'btn-primary' }}"
                        disabled="disabled">3</a>
                    <p>{{ trans('parents.Step3') }}</p>
                </div>
            </div>
        </div> 
        {{-- Father Form --}}
        @include('livewire.parents.step1')
        {{-- Mother Form --}}
        @include('livewire.parents.step2')
        {{-- Confirm Form --}}
        @include('livewire.parents.step3')
    @endif

</div>
