<x-authentication-layout>

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
        <div class="w-5/6 flex flex-col gap-5">
          <div class="flex flex-col gap-5 text-center md:text-left">
            @if (session('status'))
              <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
              </div>
            @endif
            <h1 class="font-semibold font-Inter_Medium text-4xl tracking-tight">Recuperar contraseña</h1>
            <p class="font-normal text-base font-Inter_Medium tracking-tight">
                Le enviaremos un correo electrónico para restablecer su contraseña.
            </p>
          </div>
          <div class="">
            <form method="POST" action="{{ route('password.email') }}" class="flex flex-col gap-5">
              @csrf
              <div>
                <input type="text" placeholder="Correo electrónico" name="email"
                  id="email" type="email" :value="old('email')" required autofocus
                  class="font-Inter_Medium w-full py-5 px-4 focus:outline-none placeholder-gray-400 font-normal text-base bg-[#F8F8F8] rounded-lg border-0 focus:border-transparent focus:ring-0" />
              </div>
  
              <div class="px-4">
                <input type="submit" value="Enviar"
                  class="text-white bg-[#006BF6] w-full py-4 rounded-3xl cursor-pointer font-light font-Inter_Medium tracking-wide" />
              </div>
  
             <div class="flex flex-row justify-center items-centerpx-4">
                <a href="{{ route('login') }}" 
                  class="text-[#006BF6] w-full py-2 rounded-3xl cursor-pointer font-light font-Inter_Medium tracking-normal text-center">Cancelar</a>
              </div>
  
            </form>
            <x-validation-errors class="mt-4" />
          </div>
        </div>
      </div>
    </div>
  </x-authentication-layout>
  