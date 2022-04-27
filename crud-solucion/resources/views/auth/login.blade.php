<x-guest-layout>
    <x-jet-authentication-card>
         

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Correo electrónico') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Introduce tu correo electrónico" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"  placeholder="**************" required autocomplete="current-password" />
            </div>
 
            <div class="flex items-center mt-4">
                <x-jet-button class="justify-center hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full w-screen ">
                    {{ __('Iniciar Sesión') }}
                 </x-jet-button>
                
                 <a class="ml-4 underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('No tienes cuenta?') }}
                </a>
            </div>
             
        </form>
      
       
    </x-jet-authentication-card>
</x-guest-layout>
