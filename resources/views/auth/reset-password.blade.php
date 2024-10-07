<x-authentication-layout>
  <x-validation-errors class="mb-4" />
  <div class="flex h-screen">
    <!-- Primer div -->
    <div class="basis-1/2 hidden md:block font-poppins">
      <!-- Imagen ocupando toda la altura y sin desbordar -->
      <div style="background-image: url('{{ asset('images/imagen_login.png') }}')"
        class="bg-cover bg-center bg-no-repeat w-full h-full shadow-lg">
        {{-- <h1 class="font-medium text-[24px] py-10 bg-black bg-opacity-25 text-center text-white">
                {{ config('app.name', 'Laravel') }}
              </h1> --}}
      </div>
    </div>

    <!-- Segundo div -->
    <div class="w-full md:basis-1/2  text-[#151515] flex justify-center items-center font-Inter_Medium">
      <div class="w-5/6 flex flex-col gap-5 bg-[#FCFCFC] px-2 md:px-10 rounded-xl py-12">
        <div class="flex flex-col gap-5 text-center md:text-left">
          @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
              {{ session('status') }}
            </div>
          @endif
          <h1 class="font-semibold font-Inter_Medium text-4xl tracking-tight">Nueva contraseña</h1>
          <p class="font-normal text-base font-Inter_Medium tracking-tight">
            Le enviaremos un correo electrónico para restablecer su contraseña.
          </p>
        </div>
        <div class="">

          <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
              <x-label for="email" value="{{ __('Email') }}" />
              {{--   <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required
                autofocus /> --}}
              <input type="email" placeholder="Email" name="email" id="email" type="email"
                :value="old('email', $request - > email)" required autofocus
                class="font-Inter_Medium w-full py-5 px-4 focus:outline-none placeholder-gray-400 font-normal 
                text-base bg-[#[#FFFFFF]] rounded-lg border-0 focus:border-transparent focus:ring-0" />
            </div>

            <div class="mt-4">
              <x-label for="password" value="{{ __('Nueva contraseña') }}" />
              {{-- <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" /> --}}
              <input type="password" placeholder="Nueva contraseña" name="password" id="password" type="emapasswordil"
                :value="old('password')" required autofocus
                class="font-Inter_Medium w-full py-5 px-4 focus:outline-none placeholder-gray-400 font-normal 
                text-base bg-[#[#FFFFFF]] rounded-lg border-0 focus:border-transparent focus:ring-0"
                required />
            </div>

            <div class="mt-4">
              <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
              {{-- <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
                required autocomplete="new-password" /> --}}
              <input type="password" placeholder="Confirmar Contraseña" name="password_confirmation"
                id="password_confirmation" type="emapasswordil" :value="old('password_confirmation')" required autofocus
                class="font-Inter_Medium w-full py-5 px-4 focus:outline-none placeholder-gray-400 font-normal 
                text-base bg-[#[#FFFFFF]] rounded-lg border-0 focus:border-transparent focus:ring-0"
                required />

            </div>

            <div class="flex items-center justify-end mt-4">
              <input type="submit" value="Crear"
                class="text-[#0A090B] bg-[#9AFA26]  w-full py-4 rounded-xl cursor-pointer font-mulish_Bold tracking-wide" />
              {{-- <x-button>
                {{ __('Nueva Contraseña') }}
              </x-button> --}}
            </div>
          </form>
        </div>
      </div>
    </div>
</x-authentication-layout>
