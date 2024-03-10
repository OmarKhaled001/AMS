<section id="basic-datatable">
    <button class="btn btn-primary waves-effect waves-float waves-light" wire:click="showFormAdd" type="button">{{ trans('menu.add_parent') }}</button><br><br>
    <div class="row">
        <div class="table-responsive">
            <table id="datatable" class="table" data-page-length="50" style="text-align: center">
                <thead>
                    <tr class="table-success">
                        <th>#</th>
                        <th>{{ trans('parents.email') }}</th>
                        <th>{{ trans('parents.father_name') }}</th>
                        <th>{{ trans('parents.mother_name') }}</th>
                        <th>{{ trans('parents.phone') }}</th>
                        <th>{{ trans('public.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($parents as $parent)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $parent->email }}</td>
                        <td>{{ $parent->name_father }}</td>
                        <td>{{ $parent->name_mother }}</td>
                        <td>{{ $parent->phone_father }}</td>
                        <td class="d-flex justify-content-center">
                            <div class="px-1"><a wire:click="edit({{$parent->id}})"><i class="fa-solid fa-pen-to-square text-success"></i></a></div>
                            <div class="px-1"><a href="" data-bs-toggle="modal" data-bs-target="#deleteModal{{$parent->id}}"><i class="fa-solid fa-trash text-danger "></i></a></div>
                        </td>
                    </tr>
                    @include('livewire.parents.delete')
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
