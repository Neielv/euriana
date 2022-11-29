<div>
    {{-- The Master doesn't talk, he acts. --}}
    <x-jet-danger-button wire:click="$set('open',true)">
        Nuevo
    </x-jet-danger-button>
    <x-jet-dialog-modal wire:model='open'>
        <x-slot name="title">
            Crear un nuevo Servidor
        </x-slot>
        <x-slot name="content">
            <div class="container mx-auto">
                <div class="p-8 rounded-xl shadown-md   tab-servidor-1">
                    <div class="flex">
                        <div>
                            <h2>Datos Generales</h2>
                            <hr/>
                            
                            <div class="mb-1">
                                <x-jet-label value="Cédula" />
                                <x-jet-input type="text" wire:model.defer="cedula"/>
                                <x-jet-input-error for=""/>
                            </div>
                            <div class="mb-1">
                                <x-jet-label value="Nombre" />
                                <x-jet-input type="text" class="w-full" wire:model.defer="nombre"/>
                                <x-jet-input-error for=""/>                                               
                            </div>                            
                            <div class="mb-1" style="float: left">                               
                                <x-jet-label for="date_of_birth" value="Fecha de nacimiento" />
                                <x-jet-input id="date_of_birth" type="date"  wire:model.defer="fecha_nacimiento" />
                            </div>
                            <div class="mb-1 "  style="float: left">
                                <x-jet-label value="Lugar de nacimiento" />
                                <x-jet-input type="text" class="w-full" wire:model.defer="lugar_nacimiento"/>
                                <x-jet-input-error for="lugar_nacimiento"/>                                               
                            </div>
                            <div class="mb-1"  style="float: left">
                                <x-jet-label value="Estado Civil" />
                                <select name="estado_civil" id="estado_civil"  wire:model.defer="estado_civil" class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline"><option value="" selected>Seleccione una opción</option>
                                    @foreach ($estados as $estado)
                                    <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                    @endforeach
                                </select> 
                                <x-jet-input-error for="estado_civil"/>                                               
                            </div>
                                                       
                            <div class="mb-1"  style="float: left;">
                                <x-jet-label value="Dirección" />
                                <x-jet-input type="text" class="w-full" wire:model.defer="direccion"/>
                                <x-jet-input-error for="direccion"/>                                                
                            </div>
                            <div class="mb-1 " style="float: left">
                                <x-jet-label value="Teléfono" />
                                <x-jet-input type="text"  wire:model.defer="telefono"/>
                                <x-jet-input-error for="telefono"/>                                               
                            </div>
                            <div class="mb-1"  style="float: left">
                                <x-jet-label value="Email" />
                                <x-jet-input type="text"  wire:model.defer="email"/>
                                <x-jet-input-error for="email"/>                                               
                            </div>
                            <div class="mb-1"  style="float: left">
                                <x-jet-label value="Genero" />
                                <select name="genero_id" id="genero_id"  wire:model="genero_id" class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline"><option value="" selected>Seleccione una opción</option>
                                    @foreach ($generos as $genero)
                                    <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                                    @endforeach
                                </select> 
                                <x-jet-input-error for="genero_id"/>                                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-8 rounded-xl shadown-md   tab-servidor-2">
                    <div class="flex">
                        <div>
                            <h2>Información de vinculación</h2>
                            <hr/>                            
                            
                                                    
                            <div class="mb-1" style="float: left">
                                <x-jet-label value="Unidad Administrativa" />
                                <select name="unidad_id" id="unidad_id"  wire:model.defer="unidad_id" class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline"><option value="" selected>Seleccione una opción</option>
                                    @foreach ($unidades as $unidad)
                                    <option value="{{ $unidad->id }}">{{ $unidad->nombre }}</option>
                                    @endforeach
                                </select> 
                                <x-jet-input-error for="estado_civil"/>                                              
                            </div>
                            <div class="mb-1"  style="float: left">
                                <x-jet-label value="Tipo de contrato" />
                                <select name="contrato_id" id="contrato_id"  wire:model.defer="contrato_id" class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline"><option value="" selected>Seleccione una opción</option>
                                    @foreach ($contratos as $contrato)
                                    <option value="{{ $contrato->id }}">{{ $contrato->nombre }}</option>
                                    @endforeach
                                </select> 
                                <x-jet-input-error for="grupo_id"/>                                               
                            </div>
                            <div class="mb-1"  style="float: left">
                                <x-jet-label value="Grupo ocupacional" />
                                <select name="grupo_id" id="grupo_id"  wire:model.defer="grupo_id" class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline"><option value="" selected>Seleccione una opción</option>
                                    @foreach ($grupos as $grupo)
                                    <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                                    @endforeach
                                </select> 
                                <x-jet-input-error for="grupo_id"/>                                               
                            </div>
                            <div class="mb-4"  style="float: left">
                                <x-jet-label value="Denominación" />
                                <x-jet-input type="text" class="w-full" wire:model.defer="denominacion"/>
                                <x-jet-input-error for="denominacion"/>                                               
                            </div>

                            <div class="mb-1"  style="float: left">
                                <x-jet-label value="Partida" />
                                <x-jet-input type="text" class="w-full" wire:model.defer="partida"/>
                                <x-jet-input-error for="partida"/>                                               
                            </div>
                            
                                                                                  
                            

                                
                        </div>
                    </div>
                </div>
                <div class="p-8 rounded-xl shadown-md  hidden tab-servidor-3">
                    <div class="flex">
                        <div>
                            <h2>TAB 1</h2>
                            <p>
                                Este es un texto en tab1 
                            </p>
                            <button>Shop now</button>
                        </div>
                    </div>
                </div>
                <div class="p-8 rounded-xl shadown-md  hidden tab-servidor-4">
                    <div class="flex">
                        <div>
                            <h2>TAB 1</h2>
                            <p>
                                Este es un texto en tab1 
                            </p>
                            <button>Shop now</button>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save"
                class="disabled:pacity-25">
                Crear Servidor
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
