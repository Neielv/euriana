<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servidores') }}
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
                    Servidores
                </x-jet-label>
            </div>
            <x-jet-label class="px-2">
                <x-jet-input class="mx-1" type="text" wire:model="search" placeholder="Ingrese un código">
                    </x-input>
            </x-jet-label>
            <div class="min-w-min">
                @livewire('create-servidor')
            </div>

        </div>
        @if ($servidores->count())
            <x-table>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cédula
                            </th>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('nombre')">
                                Nombre
                                @if ($sort == 'nombre')
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
                                Correo
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Teléfono
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cargo
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Unidad
                            </th>

                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <!--ojo aqui cambio 10px-->
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($servidores as $servidor)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-ms text-gray-900"> {{ $servidor->cedula }}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-ms text-gray-900"> {{ $servidor->nombre }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-ms text-gray-900"> {{ $servidor->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $servidor->telefono}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $servidor->cargo }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $servidor->unidad->nombre}}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap ext-sm font-medium flex">
                                    <a class="btn btn-green" wire:click="edit({{ $servidor }})">
                                        <i class="fas fa-edit">
                                        </i>
                                    </a>


                                    <a class="btn btn-red ml-2" wire:click="$emit('borrarUser',{{ $servidor->id }})">
                                        <i class="fas fa-trash">

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
        @if ($servidores->hasPages())
            <div class="px-6 py-3">
                {{ $servidores->links() }}
            </div>
        @endif
    </div>
    
    <x-jet-dialog-modal wire:model='open_edit'>
        <x-slot name="title">
            Editar Servidor:
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Cédula" />
                <x-jet-input wire:model="servidor.cedula" type="text" class="w-full" />
                <x-jet-input-error for="servidor.cedula" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input wire:model="servidor.nombre" type="text" class="w-full" />
                <x-jet-input-error for="servidor.nombre" />
            </div>
            
            

            <table >
                <tr>
                    <td>
                        <div class="mb-4" style="float: left">                               
                            <x-jet-label for="date_of_birth" value="Fecha de nacimiento" />
                            <x-jet-input id="date_of_birth" type="date"  wire:model.defer="servidor.fecha_nacimiento" />
                        </div>
                    </td>
                    <td>
                        <div class="mb-4 " >
                            <x-jet-label value="Lugar de nacimiento" />
                            <x-jet-input wire:model="servidor.lugar_nacimiento" type="text"  />
                            <x-jet-input-error for="servidor.lugar_nacimiento" />
                        </div>
                        
                    </td>
                    <td>
                        <div class="mb-4"  >
                            <x-jet-label value="Estado Civil" />
                            <select name="estado_civil_id" wire:model.defer="servidor.estado_civil_id" class="border-gray-300 w-full focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"><option value="" selected>Seleccione una opción</option>
                                                                                                              
                                @foreach ($estados_civil as $estado)
                                <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                @endforeach
                            </select> 
                            <x-jet-input-error for="servidor.estado_civil_id"/>                                               
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="mb-4 " >
                            <x-jet-label value="E-mail" />
                            <x-jet-input wire:model="servidor.email" type="text"  />
                            <x-jet-input-error for="servidor.email" />
                        </div>

                    </td>
                    <td>
                        <div class="mb-4 ">
                            <x-jet-label value="Teléfono" />
                            <x-jet-input wire:model="servidor.telefono" type="text"  />
                            <x-jet-input-error for="servidor.telefono" />
                        </div>
                    </td>
                    <td>
                        <div class="mb-4 ">
                            <x-jet-label value="E-mail personal" />
                            <x-jet-input wire:model="servidor.mail_personal" type="text"  />
                            <x-jet-input-error for="servidor.mail_personal" />
                        </div>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="mb-1" >
                            <x-jet-label value="Genero" />
                            <select name="genero_id" wire:model.defer="servidor.genero_id" class="border-gray-300 w-full focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"><option value="" selected>Seleccione una opción</option>
                                @foreach ($generos as $genero)
                                <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                                @endforeach
                            </select> 
                            <x-jet-input-error for="servidor.genero_id"/>                                               
                        </div>
                    </td>
                    <td>
                        <div class="mb-1"  >
                            <x-jet-label value="Formación académica" />
                            <select name="formacion_id" wire:model.defer="servidor.formacion_id" class="border-gray-300 w-full focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"><option value="" selected>Seleccione una opción</option>
                                @foreach ($formaciones as $formacion)
                                <option value="{{ $formacion->id }}">{{ $formacion->nombre }}</option>
                                @endforeach
                            </select> 
                            <x-jet-input-error for="servidor.fomracion_id"/>                                               
                        </div>
                    </td>
                    <td>
                        <div class="mb-1"  >
                            <x-jet-label value="Unidad Administrativa" />
                            <select name="unidad_id" wire:model.defer="servidor.unidad_id" class="border-gray-300 w-full focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"><option value="" selected>Seleccione una opción</option>
                                @foreach ($unidades as $unidad)
                                <option value="{{ $unidad->id }}">{{ $unidad->nombre }}</option>
                                @endforeach
                            </select> 
                            <x-jet-input-error for="servidor.unidad_id"/>                                               
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="mb-1"  >
                            <x-jet-label value="Tipo de Contrato" />
                            <select name="tipo_contrato_id" wire:model.defer="servidor.tipo_contrato_id" class="border-gray-300 w-full focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"><option value="" selected>Seleccione una opción</option>
                                @foreach ($tipos_cotrato as $contrato)
                                <option value="{{ $contrato->id }}">{{ $contrato->nombre }}</option>
                                @endforeach
                            </select> 
                            <x-jet-input-error for="servidor.tipo_contrato_id"/>                                               
                        </div>
                    </td>
                    <td>
                        <div class="mb-1"  >
                            <x-jet-label value="Grupo" />
                            <select name="grupo_id" wire:model.defer="servidor.grupo_id" class="border-gray-300 w-full focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"><option value="" selected>Seleccione una opción</option>
                                @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                                @endforeach
                            </select> 
                            <x-jet-input-error for="servidor.grupo_id"/>                                               
                        </div>
                    </td>
                    <td>
                        <div class="mb-1"  >
                            <x-jet-label value="Etnia" />
                            <select name="etnia_id" wire:model.defer="servidor.etnia_id" class="border-gray-300 w-full focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"><option value="" selected>Seleccione una opción</option>
                                @foreach ($etnias as $etnia)
                                <option value="{{ $etnia->id }}">{{ $etnia->nombre }}</option>
                                @endforeach
                            </select> 
                            <x-jet-input-error for="servidor.etnia_id"/>                                               
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="mb-1"  >
                            <x-jet-label value="Nacionalidad" />
                            <select name="nacionalidad_id" wire:model.defer="servidor.nacionalidad_id" class="border-gray-300 w-full focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"><option value="" selected>Seleccione una opción</option>
                                @foreach ($nacionalidades as $nacionalidad)
                                <option value="{{ $nacionalidad->id }}">{{ $nacionalidad->nombre }}</option>
                                @endforeach
                            </select> 
                            <x-jet-input-error for="servidor.nacionalidad_id"/>                                               
                        </div>
                    </td>
                    <td>
                        <div class="mb-1"  >
                            <x-jet-label value="Discapacidad" />
                            <select name="discapacidad_id" wire:model.defer="servidor.discapacidad_id" class="border-gray-300 w-full focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"><option value="" selected>Seleccione una opción</option>
                                @foreach ($discapacidades as $discapacidad)
                                <option value="{{ $discapacidad->id }}">{{ $discapacidad->nombre }}</option>
                                @endforeach
                            </select> 
                            <x-jet-input-error for="servidor.discapacidad_id"/>                                               
                        </div>
                    </td>
                    <th>
                    </th>
                </tr>
            </table>

            

           
            
            
           
            
            

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
    

</div>
