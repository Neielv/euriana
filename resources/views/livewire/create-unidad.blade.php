<div>
    {{-- The Master doesn't talk, he acts. --}}
    <x-jet-danger-button wire:click="$set('open',true)">
        Nuevo 
    </x-jet-danger-button>  
    
    <x-jet-dialog-modal wire:model='open'>
        <x-slot name="title">
            Crear un nueva Unidad
        </x-slot>
        <x-slot name="content">
            
            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" wire:model.defer="nombre" class="w-full"/>
                <x-jet-input-error for="nombre"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Siglas" />
                <x-jet-input type="text" wire:model.defer="siglas"/>
                <x-jet-input-error for="siglas"/>
            </div>

            
            
            <div class="mb-4">
                <x-jet-label value="Proceso" />
                <select name="proceso_id" id="proceso_id"  wire:model="proceso_id" class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline"><option value="" selected>Seleccione una ciudad</option>
                    @foreach ($procesos as $proceso)
                    <option value="{{ $proceso->id }}">{{ $proceso->nombre }}</option>
                    @endforeach
                    </select>                
            </div> 

            <div class="mb-4">
                <x-jet-label value="Unidad" />
                <select name="parent_id" id="parent_id"  wire:model="parent_id" class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline"><option value="" selected>Seleccione una unidad</option>
                    @foreach ($padres as $padre)
                    <option value="{{ $padre->id }}">{{ $padre->nombre }}</option>
                    @endforeach
                    </select>                
            </div> 

            <div class="mb-4">
                <x-jet-label value="Responsable" />
                <select name="servidor_id" id="servidor_id"  wire:model="servidor_id" class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline"><option value="" selected>Seleccione un servidor</option>
                    @foreach ($servidores as $servidor)
                    <option value="{{ $servidor->id }}">{{ $servidor->nombre }}</option>
                    @endforeach
                    </select>                
            </div> 
            
               
             
        </x-slot>
        <x-slot name="footer">    
            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:pacity-25">
                Crear Unidad
            </x-jet-danger-button>     
            
        </x-slot>

    </x-jet-dialog-modal>
</div>