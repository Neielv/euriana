<div>    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kardex') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="px-6  py-6 flex items-center">
            <div class="flex items-center ">                
                <x-jet-label class="px-2">
                    Servidores
                </x-jet-label>
            </div>
            <x-jet-label class="px-2">
               <select name="servidor_id" id="servidor_id"  wire:model="servidor_id" class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                        <option value="" selected>Seleccione un servidor</option>
                        @foreach ($servidores as $servidor)
                            <option value="{{ $servidor->id }}">{{ $servidor->nombre }}</option>
                        @endforeach
                    </select> 
                    <x-jet-input-error for="servidor_id"/>  

            </x-jet-label>
            <a class="btn btn-blue" wire:click="buscar()">
                <i class="fas fa-search">
                    Buscar
                </i>
            </a>    

        </div>
        <div class="px-6  py-6 flex items-center">
            <div class="flex items-center ">                
                <x-jet-label class="px-2">
                    Fecha de ingreso:
                </x-jet-label>
                <div class="text-sm text-gray-900">{{ $fechaIngreso }}</div>
            </div>
           
            

       
            <div class="flex items-center ">                
                <x-jet-label class="px-2">
                   Saldo inicial:
                </x-jet-label>
                
                <x-jet-label value="D:{{$dias}} H:{{$horas}} M:{{$minutos}} " class="font" />   
                   
                
            </div>
            

        </div>
        
        <x-table>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            No.
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Fecha
                        </th>
                        
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tipo de permiso
                        </th>  

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            DEBE (H:M:S)
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            HABER (H:M:S)
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            SALDO (H:M:S)
                        </th>

                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @if($servidor_id)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">1</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"> 2023-01-01</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Saldo Inicial
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap">
                             D:{{$dias}} H:{{$horas}} M:{{$minutos}} 
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                           
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            
                        </td>
                    </tr>
                    @endif
                    @foreach ($permisos as $permiso)
                    
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"> {{ $loop->iteration+1 }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"> {{ $permiso->Fecha}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $permiso->Tipo}}
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $permiso->Debe}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $permiso->Haber}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $permiso->Saldo}}
                            </td>

                            


                            
                        </tr>
                    @endforeach
                    <!-- More people... -->
                </tbody>
            </table>
        </x-table>
       
    </div>
    
   

</div>
