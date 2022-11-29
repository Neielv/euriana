<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permisos') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="px-6  py-6 flex items-center">
            <div class="flex items-center ">
                <samp>
                    <x-jet-label class="px-2">
                        Mostrar
                    </x-jet-label>
                </samp>
                <select wire:model="cant" class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <x-jet-label class="px-2">
                    Permisos
                </x-jet-label>
            </div>
            <x-jet-label class="px-2">
                <x-jet-input class="mx-1" type="text" wire:model="search" placeholder="Ingrese un código">
                    </x-input>
            </x-jet-label>
            <div class="min-w-min">
                @livewire('create-permiso')
            </div>

        </div>
        @if ($permisos->count())
            <x-table>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No.
                            </th>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('name')">
                                Nombre
                                @if ($sort == 'name')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tipo de permiso
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado
                            </th>
                            

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                F_Desde
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                F_Hasta
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                H_Desde
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                H_Hasta
                            </th>

                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($permisos as $permiso)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"> {{ $permiso->id }}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"> {{ $permiso->servidor->nombre}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $permiso->tipo->nombre}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $permiso->estado->nombre}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $permiso->fecha_desde}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $permiso->fecha_hasta}}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $permiso->hora_desde}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $permiso->hora_hasta}}
                                </td>


                                <td class="px-6 py-4 whitespace-nowrap ext-sm font-medium flex">
                                    
                                    <a class="btn btn-blue" wire:click="imprimir({{ $permiso }})">
                                        <i class="fas fa-print">
                                        </i>
                                    </a>


                                    <a class="btn btn-green ml-2" wire:click="edit({{ $permiso }})">
                                        <i class="fas fa-edit">
                                        </i>
                                    </a>                                    
                                </td>
                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>
            </x-table>
        @else
            <div class="px-6 py-4">
                <br>
                No se encontraron coincidencias
            </div>
        @endif
        @if ($permisos->hasPages())
            <div class="px-6 py-3">
                {{ $permisos->links() }}
            </div>
        @endif
    </div>

    <x-jet-dialog-modal wire:model='open_edit'>
        <x-slot name="title">
            Editar usuario:
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input wire:model="user.name" type="text" class="w-full" />
                <x-jet-input-error for="user.name" />
            </div>
            <div class="mb-4">
                <x-jet-label value="E-mail" />
                <x-jet-input wire:model="user.email" type="text" class="w-full" />
                <x-jet-input-error for="user.email" />
            </div>
            <hr>
            <h2>Rol</h2>
          

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_edit',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="save"
                class="disabled:pacity-25">
                Actualizar
            </x-jet-danger-button>

        </x-slot>

    </x-jet-dialog-modal>
    @push('js')
        <script src="sweetalert2.all.min.js"></script>
        <script>
            Livewire.on('borrarUser', CiudadId =>
                Swal.fire({
                    title: 'Está seguro de elimar el registro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, borrar el registro'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('show-users', 'delete', UserId);
                        Swal.fire(
                        'Euriana!',
                        'El registro se borró.',
                        'success'
                        )
                    }
                })
            )
        </script>
    @endpush

</div>
