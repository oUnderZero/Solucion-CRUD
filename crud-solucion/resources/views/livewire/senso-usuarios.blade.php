<x-slot name="header">

    <div class=" justify-center w-full flex mb-14">
        
        <div class="max-w-max absolute  ">
            <h1 class="text-white p-3 rounded-2xl bg-gray-800  "> Senso Usuarios </h1>
        </div>
       
        
    </div>


</x-slot>

<div class="items-center justify-center min-h-screen ">
    <div class="max-w-max mx-auto sm:px6 lg:px-8 ">
        <div class=" text-gray-400 overflow-hidden    ">
           @if ($tipo_usuario != null)
           <button  wire:click="crear()" class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-4 mt-3 rounded-lg" > Crear </button>
           @else
           <div class="pt-9">

           </div>
           @endif
             @if($modal)
                @include('livewire.crear')
            @endif
            <table class="table mt-2 max-w-7xl  border-separate  text-sm ">
                <thead class="bg-gray-800 text-white">
                    <tr >  
                            <th class="border-r-2  border-gray-700   px-4 py-2 ">Id </th>
                            <th class="border-r-2 border-gray-700  px-4 py-2">Dni</th>
                            <th class="border-r-2 border-gray-700  px-4 py-2">Nombre</th>
                            <th class="border-r-2 border-gray-700  px-4 py-2">Apellido Paterno</th>
                            <th class="border-r-2 border-gray-700  px-4 py-2">Apellido Materno</th>
                            <th class="border-r-2 border-gray-700  px-4 py-2">Fecha de Nacimiento</th>
                            <th class="border-r-2 border-gray-700  px-4 py-2">Direccion</th>
                            <th class="border-r-2 border-gray-700  px-4 py-2">Telefono</th>
                            @if ($tipo_usuario != null)
                            <th class=" border-gray-700  px-4 py-2">Acciones</th>
                            @endif
                            
                    </tr>
                </thead>
                <tbody class="bg-gray-800">
                    
                    @foreach ($senso  as $senso_usuarios)
                   
                   
                        <tr> 
                            <td class=" px-4  py-2 text-center"> {{$numero}}</td>
                            <td class=" px-4 text-center py-2">{{ $senso_usuarios->DNI }}</td>
                            <td class=" px-4 text-center py-2">{{ $senso_usuarios->NOMBRE }}</td>
                            <td class=" px-4 text-center py-2">{{ $senso_usuarios->APELLIDO_PATERNO }}</td>
                            <td class=" px-4 text-center py-2">{{ $senso_usuarios->APELLIDO_MATERNO }}</td>
                            <td class=" px-4 text-center py-2">{{ $senso_usuarios->FECHA_NACIMIENTO }}</td>
                            <td class=" px-4 text-center py-2">{{ $senso_usuarios->DIRECCION }}</td>
                            <td class=" px-4 text-center py-2">{{ $senso_usuarios->TELEFONO }}</td>
                         @if ($tipo_usuario != null)
                            <td class="p-3">
                                
                                <a wire:click="ver({{$senso_usuarios->id }})" class="text-blue-500 hover:text-blue-200 mr-2 ">
                                    <i class="material-icons-outlined text-base " >visibility</i>
                                </a>
                                <a wire:click="editar({{$senso_usuarios->id }})"  class="text-green-500 hover:text-green-200 mx-2">
                                    <i class="material-icons-outlined text-base">edit</i>
                                </a>
                                
                               
                                @if ($tipo_usuario ==1)
                                <a wire:click="eliminar({{$senso_usuarios->id }})" onclick="return confirm('Are you sure?')" class="text-red-500 hover:text-red-200 ml-2">
                                    <i class="material-icons-round text-base">delete_outline</i>
                                </a>
                                @endif  
                                
                            </td>
                            @endif
                        </tr>
                        @php
                            $numero+=1
                        @endphp
                    @endforeach
                   
                </tbody>
            </table>
            <div class="pagination justify-content-end">
                {{$senso->links()}}
              </div>  
            @if(session()->has('verde'))
            <div class="container" id="alertbox">
                <div class="container bg-green-500 flex items-center text-white text-sm font-bold px-4 py-3 relative"
                    role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                    </svg>
                    <p>{{session('verde')}}.</p>
        
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closealertbutton">
                        <svg class="fill-current h-6 w-6 text-white" role="button" onclick="$(this).parent().parent().hide(500);" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            </div>
            @elseif(session()->has('rojo'))
             
            <div class="container" id="alertbox">
                <div class="container bg-red-500 flex items-center text-white text-sm font-bold px-4 py-3 relative"
                    role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                    </svg>
                    <p>{{session('rojo')}}.</p>
        
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closealertbutton">
                        <svg class="fill-current h-6 w-6 text-white" role="button" onclick="$(this).parent().parent().hide(500);" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            </div>
            
            @endif
            
             

        </div>


    </div>
  

    
</div>




  
