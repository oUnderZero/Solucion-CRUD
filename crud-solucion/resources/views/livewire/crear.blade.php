<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400  ">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    
        <div class="fixed inset-0 transition-opacity ">
            <div class="absolute inset-0 bg-gray-300 opacity-75 blur-2xl"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">    
                <div
                class=" text-center p-4 bg-gray-700 border-b "
                >
                <p class="font-semibold text-white ">Agregar persona</p>
                 
                
                </div>
                <form>
                    <div class="bg-gray-600 px-4 pt-5 pb-4 sm:p-6 sm:pb-4 shadow">
                        
                        <div class="mb-4">
                            <label for="dni" class="lbl">Dni</label>
                            <input type="text" @if($bloqueo) disabled  @endif class="in " id="dni" wire:model="dni">
                            @error('dni') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="nombre" class="lbl">Nombre</label>
                            <input type="text" @if($bloqueo) disabled  @endif class="in" id="nombre" wire:model="nombre">
                            @error('nombre') <span class="errortext-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4 flex flex-row  ">
                            <div class="mb-4 pr-4">
                                <label for="apellido_paterno" class="lbl">Apellido Paterno</label>
                                <input type="text" @if($bloqueo) disabled  @endif class="in" id="apellido_paterno" wire:model="apellido_paterno">
                                @error('apellido_paterno') <span class="error text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-4">
                                <label for="apellido_materno" class="lbl">Apellido Materno</label>
                                <input type="text" @if($bloqueo) disabled  @endif class="in" id="apellido_materno" wire:model="apellido_materno">
                                @error('apellido_materno') <span class="error text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="fecnac" class="lbl">Fecha de Nacimiento</label>
                            <input type="date" @if($bloqueo) disabled  @endif class="in" id="fecnac" wire:model="fecnac">
                            @error('fecnac') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="dir" class="lbl">Direccion</label>
                            <input type="text" @if($bloqueo) disabled  @endif class="in" id="dir" wire:model="dir">
                            @error('dir') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="tfno" class="lbl">Telefono</label>
                            <input type="number" @if($bloqueo) disabled  @endif  class="in" id="tfno" wire:model="tfno">
                            @error('tfno') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                         
 
                        

                        <div class="  px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                           @if (!$bloqueo )
                           <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="guardar()" type="button" class=" btn border-transparent  bg-purple-600  text-white   hover:bg-purple-800  focus:border-green-700 focus:shadow-outline-green ">Guardar</button>
                          </span>

                          @else
                          <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click="cerrarModal()" type="button" class=" btn border-transparent  bg-green-600  text-white   hover:bg-green-800  focus:border-green-700 focus:shadow-outline-green ">Aceptar</button>
                          </span>
                           @endif
                            


                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click="cerrarModal()" type="button" class=" btn border border-gray-300   bg-gray-200  text-gray-700  hover:text-gray-500   focus:border-blue-300 focus:shadow-outline-blue ">Cancelar</button>
                            </span>
                        </div>

                    </div>
                </form>    
            </div>


    </div>
</div>