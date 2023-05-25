<div>
    {{-- The Master doesn't talk, he acts. --}}
    <x-jet-danger-button wire:click="$set('open',true)">
        Nuevo 
    </x-jet-danger-button> 
 
    <x-jet-dialog-modal wire:model='open'>
        <x-slot name="title">
            Crear nuevo permiso
        </x-slot>
        <x-slot name="content">
            <div class="mb-2 float-right">
                <x-jet-label value="Saldo" class="font-semibold" />
                <x-jet-label value="D:{{$dias}} H:{{$horas}} M:{{$minutos}} " class="font" />           
            </div>
            
            <div class="mb-2">
                <x-jet-label value="Cédula:" class="font-semibold" />
                <x-jet-label value="{{$servidor->cedula}}" />                
            </div>
            <div class="mb-2">
                <x-jet-label value="Nombre"  class="font-semibold" />
                <x-jet-label value="{{$servidor->nombre}}" />                                     
            </div>
            <div class="mb-2">
                <x-jet-label value="Unidad"  class="font-semibold"  />
                <x-jet-label value="{{$servidor->unidad->nombre}}" />    
            </div>
            <div class="mb-2">
                <x-jet-label value="Tipo de solicitud"  class="font-semibold"  />
                <select name="tipo_id" id="tipo_id"  wire:model="tipo_id" class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline"><option value="" selected>Seleccione un tipo</option>
                    @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="tipo_id"/>
            </div>
            <hr/>
                           
                <div style="float: left; width: 50%;">
                    <x-jet-label for="date_of_birth" value="Fecha desde" />
                    <x-jet-input id="date_of_birth" type="date"  wire:model.defer="fecha_desde" />
                    <x-jet-input-error for="fecha_desde"/>
                </div>
                <div style="float: left; width: 50%;" >
                    <x-jet-label for="date_of_birth" value="Fecha hasta" />
                    <x-jet-input id="date_of_birth" type="date"  wire:model.defer="fecha_hasta" />
                    <x-jet-input-error for="fecha_hasta"/>
                </div>
                
            
            
                <div  style="float: left; width: 50%;">
                    <div class="mb-2">
                        <x-jet-label for="date_of_birth" value="Hora desde" />
                        <x-jet-input id="date_of_birth" type="time"  wire:model.defer="hora_desde" />
                        <x-jet-input-error for="hora_hasta"/>
                    </div>
                </div>
                <div  style="float: left; width: 50%;">
                    <div class="mb-2">
                        <x-jet-label for="date_of_birth" value="Hora hasta" />
                        <x-jet-input id="date_of_birth" type="time"  wire:model.defer="hora_hasta" />
                        <x-jet-input-error for="hora_hasta"/>
                    </div>
                
                
            </div>
            
            <div style="float: left; width: 100%;">
                <x-jet-label value="Motivo" />
                <x-jet-input type="text" class="w-full" wire:model.defer="motivo"/>
                <x-jet-input-error for="motivo"/>                               
            </div>
            <div style="float: left; width: 100%;">
                <x-jet-label value="Soporte" />
                <input type="file" wire:model="">                                             
            </div>           


        </x-slot>
        <x-slot name="footer">    
            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:pacity-25">
                Crear solicitud
            </x-jet-danger-button>     
            
        </x-slot>

    </x-jet-dialog-modal>
</div>
