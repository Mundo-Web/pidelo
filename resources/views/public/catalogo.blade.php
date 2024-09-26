@extends('components.public.matrix', ['pagina' => 'catalogo'])
@section('title', 'Productos | ' . config('app.name', 'Laravel'))

@section('css_importados')


@stop


@section('content')

  @php
    $breadcrumbs = [['title' => 'Inicio', 'url' => route('index')], ['title' => 'Catálogo', 'url' => '']];
  @endphp

  @component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
  @endcomponent

  <div class="flex flex-col md:flex-row md:gap-10 w-11/12 mx-auto font-poppins mt-16">
    <section class="flex flex-col gap-10 md:basis-3/12   ">
      <button class="w-full h-12 bg-[#F1F1F1] text-[15px] text-center font-medium rounded-lg" type="button"> Limpiar
        Todo</button>

      <div class="relative mb-6">
        <label for="labels-range-input" class="sr-only">Labels range</label>
        <input id="labels-range-input" type="range" value="1000" min="100" max="1500"
          class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
        <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6">Min ($100)</span>
        <span
          class="text-sm text-gray-500 dark:text-gray-400 absolute start-1/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6">$500</span>
        <span
          class="text-sm text-gray-500 dark:text-gray-400 absolute start-2/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6">$1000</span>
        <span class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6">Max ($1500)</span>
      </div>
      <div class="flex flex-col gap-4">
        <h2 class="font-semibold">Precio </h2>
        <p class="font-normal text-[12px] text-[#666666]"> 0 Seleccionados </p>
        <div class="flex flex-row gap-4">
          <input type="text" class="w-24 rounded-xl custom-border" placeholder="S/ 00.00">
          <input type="text" class="w-24 rounded-xl custom-border" placeholder="S/ 00.00">
        </div>
        <button class="text-white bg-[#0168EE] rounded-md font-bold h-10 w-24"> Filtrar</button>

      </div>
      <div class="flex flex-col gap-4">
        <h2 class="font-semibold">Marca </h2>
        <p class="font-normal text-[12px] text-[#666666]"> 0 Seleccionados </p>
        <div class="flex flex-col gap-4 ">
          <div class="flex flex-row gap-2  items-center">
            <input type="checkbox" class="bg-[#DEE2E6] rounded-sm  border-none"> <span class="text-custom-border "> Marca
              Uno (1)
            </span>

          </div>
          <div class="flex flex-row gap-2 items-center">
            <input type="checkbox" class=" bg-[#DEE2E6] rounded-sm  border-none"> <span class="text-custom-border"> Marca
              Dos
              (4) </span>

          </div>
          <div class="flex flex-row gap-2 items-center">
            <input type="checkbox" class=" bg-[#DEE2E6] rounded-sm border-none "> <span class="text-custom-border"> Marca
              Tres
              (3) </span>

          </div>
          <div class="flex flex-row gap-2 items-center">
            <input type="checkbox" class=" bg-[#DEE2E6] rounded-sm border-none"> <span class="text-custom-border"> Marca
              Cuatro
              (2)
            </span>

          </div>


        </div>
        <button class="text-white bg-[#0168EE] rounded-md font-bold h-10 w-24"> Filtrar</button>

      </div>
      <div class="flex flex-col gap-4">
        <h2 class="font-semibold">Tamaño </h2>
        <p class="font-normal text-[12px] text-[#666666]"> 0 Seleccionados </p>
        <div class="flex flex-col gap-4 ">
          <div class="flex flex-row gap-2  items-center">
            <input type="checkbox" class="bg-[#DEE2E6] rounded-sm  border-none"> <span class="text-custom-border "> Marca
              Uno (1)
            </span>

          </div>
          <div class="flex flex-row gap-2 items-center">
            <input type="checkbox" class=" bg-[#DEE2E6] rounded-sm  border-none"> <span class="text-custom-border"> Marca
              Dos
              (4) </span>

          </div>
          <div class="flex flex-row gap-2 items-center">
            <input type="checkbox" class=" bg-[#DEE2E6] rounded-sm border-none "> <span class="text-custom-border"> Marca
              Tres
              (3) </span>

          </div>
          <div class="flex flex-row gap-2 items-center">
            <input type="checkbox" class=" bg-[#DEE2E6] rounded-sm border-none"> <span class="text-custom-border"> Marca
              Cuatro
              (2)
            </span>

          </div>


        </div>
        <button class="text-white bg-[#0168EE] rounded-md font-bold h-10 w-24"> Filtrar</button>

      </div>
      <div class="flex flex-col gap-4">
        <h2 class="font-semibold">Color </h2>
        <p class="font-normal text-[12px] text-[#666666]"> 0 Seleccionados </p>
        <div class="flex flex-col gap-4 ">
          <div class="flex flex-row gap-2  items-center">
            <input type="checkbox" class="bg-[#DEE2E6] rounded-sm  border-none"> <span class="text-custom-border "> Marca
              Uno (1)
            </span>

          </div>
          <div class="flex flex-row gap-2 items-center">
            <input type="checkbox" class=" bg-[#DEE2E6] rounded-sm  border-none"> <span class="text-custom-border"> Marca
              Dos
              (4) </span>

          </div>
          <div class="flex flex-row gap-2 items-center">
            <input type="checkbox" class=" bg-[#DEE2E6] rounded-sm border-none "> <span class="text-custom-border"> Marca
              Tres
              (3) </span>

          </div>
          <div class="flex flex-row gap-2 items-center">
            <input type="checkbox" class=" bg-[#DEE2E6] rounded-sm border-none"> <span class="text-custom-border"> Marca
              Cuatro
              (2)
            </span>

          </div>


        </div>
        <button class="text-white bg-[#0168EE] rounded-md font-bold h-10 w-24"> Filtrar</button>

      </div>
    </section>
    <section class="flex flex-col gap-10 md:basis-9/12   ">
      <div class="w-full h-12 bg-[#F8F8F8]     font-medium flex flex-row justify-between items-center">
        <div><span class="font-normal text-[17px] text-[#666666] ml-3">Mostrando 1 - 9 de 11 resultados</span></div>
        <div class="flex flex-row gap-3 items-center">
          <span class="font-normal text-[17px]">Ordenar Por</span>
          <x-dropdown-flowbite
            class="bg-[#EDEDED] text-[#666666] hover:bg-gray-500 hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            id="dropdownDefaultButton" />
        </div>
      </div>
      <div class="grid grid-cols-3 gap-6 gap-y-10">
        <div class="flex flex-col justify-center  gap-6">
          <div class="h-[295px] w-full bg-slate-400 "></div>
          <div class="flex flex-col justify-center items-center">
            <h2 class="font-normal text-[18px] text-[#333333]">Nombre del Producto</h2>
            <div class="flex flex-row gap-4 justify-center items-baseline ">
              <p class="font-bold text-[24px] text-[#006BF6]">S/ 39.00</p>
              <p class="font-normal   text-[18px] text-custom-border line-through">S/ 00.00</p>
            </div>



          </div>

        </div>
        <div class="flex flex-col justify-center  gap-6">
          <div class="h-[295px] w-full bg-slate-400 "></div>
          <div class="flex flex-col justify-center items-center">
            <h2 class="font-normal text-[18px] text-[#333333]">Nombre del Producto</h2>
            <div class="flex flex-row gap-4 justify-center items-baseline ">
              <p class="font-bold text-[24px] text-[#006BF6]">S/ 39.00</p>
              <p class="font-normal   text-[18px] text-custom-border line-through">S/ 00.00</p>
            </div>



          </div>

        </div>
        <div class="flex flex-col justify-center  gap-6">
          <div class="h-[295px] w-full bg-slate-400 "></div>
          <div class="flex flex-col justify-center items-center">
            <h2 class="font-normal text-[18px] text-[#333333]">Nombre del Producto</h2>
            <div class="flex flex-row gap-4 justify-center items-baseline ">
              <p class="font-bold text-[24px] text-[#006BF6]">S/ 39.00</p>
              <p class="font-normal   text-[18px] text-custom-border line-through">S/ 00.00</p>
            </div>



          </div>

        </div>
        <div class="flex flex-col justify-center  gap-6">
          <div class="h-[295px] w-full bg-slate-400 "></div>
          <div class="flex flex-col justify-center items-center">
            <h2 class="font-normal text-[18px] text-[#333333]">Nombre del Producto</h2>
            <div class="flex flex-row gap-4 justify-center items-baseline ">
              <p class="font-bold text-[24px] text-[#006BF6]">S/ 39.00</p>
              <p class="font-normal   text-[18px] text-custom-border line-through">S/ 00.00</p>
            </div>



          </div>

        </div>
        <div class="flex flex-col justify-center  gap-6">
          <div class="h-[295px] w-full bg-slate-400 "></div>
          <div class="flex flex-col justify-center items-center">
            <h2 class="font-normal text-[18px] text-[#333333]">Nombre del Producto</h2>
            <div class="flex flex-row gap-4 justify-center items-baseline ">
              <p class="font-bold text-[24px] text-[#006BF6]">S/ 39.00</p>
              <p class="font-normal   text-[18px] text-custom-border line-through">S/ 00.00</p>
            </div>



          </div>

        </div>
        <div class="flex flex-col justify-center  gap-6">
          <div class="h-[295px] w-full bg-slate-400 "></div>
          <div class="flex flex-col justify-center items-center">
            <h2 class="font-normal text-[18px] text-[#333333]">Nombre del Producto</h2>
            <div class="flex flex-row gap-4 justify-center items-baseline ">
              <p class="font-bold text-[24px] text-[#006BF6]">S/ 39.00</p>
              <p class="font-normal   text-[18px] text-custom-border line-through">S/ 00.00</p>
            </div>



          </div>

        </div>
        <div class="flex flex-col justify-center  gap-6">
          <div class="h-[295px] w-full bg-slate-400 "></div>
          <div class="flex flex-col justify-center items-center">
            <h2 class="font-normal text-[18px] text-[#333333]">Nombre del Producto</h2>
            <div class="flex flex-row gap-4 justify-center items-baseline ">
              <p class="font-bold text-[24px] text-[#006BF6]">S/ 39.00</p>
              <p class="font-normal   text-[18px] text-custom-border line-through">S/ 00.00</p>
            </div>



          </div>

        </div>
        <div class="flex flex-col justify-center  gap-6">
          <div class="h-[295px] w-full bg-slate-400 "></div>
          <div class="flex flex-col justify-center items-center">
            <h2 class="font-normal text-[18px] text-[#333333]">Nombre del Producto</h2>
            <div class="flex flex-row gap-4 justify-center items-baseline ">
              <p class="font-bold text-[24px] text-[#006BF6]">S/ 39.00</p>
              <p class="font-normal   text-[18px] text-custom-border line-through">S/ 00.00</p>
            </div>



          </div>

        </div>
        <div class="flex flex-col justify-center  gap-6">
          <div class="h-[295px] w-full bg-slate-400 "></div>
          <div class="flex flex-col justify-center items-center">
            <h2 class="font-normal text-[18px] text-[#333333]">Nombre del Producto</h2>
            <div class="flex flex-row gap-4 justify-center items-baseline ">
              <p class="font-bold text-[24px] text-[#006BF6]">S/ 39.00</p>
              <p class="font-normal   text-[18px] text-custom-border line-through">S/ 00.00</p>
            </div>



          </div>

        </div>


      </div>
      <div class="w-full h-12     font-medium flex flex-row justify-center items-center">
        <div><span class="font-normal text-[17px] text-[#666666] ml-3">Paginacion Laravel </span></div>

      </div>
    </section>
  </div>




  {{-- <div class="w-full md:w-11/12 md:mx-auto">
    <div style="background-image: url('{{ asset('images/img/header_catalogo.png') }}')"
      class="bg-cover bg-center bg-no-repeat min-h-[600px] flex flex-col justify-center items-center">
      <div class="flex justify-start py-10 md:py-16 w-11/12 mx-auto">
        <div class="text-white font-poppins flex flex-col gap-10 text-center">
          <h1 class="font-semibold text-[32px] md:text-[48px] leading-none md:leading-tight">
            Armo Tu Proyecto Con Deco Tab
          </h1>
          <p class="font-normal text-[16px] md:text-[18px]">
            Descubre la variedad de productos que tenemos para ti. Contamos con la mejor calidad en Wall Panel, Paneles de
            Piedra Cincelada, UV Mármol y más. ¡Te ayudaremos a crear un entorno más acogedor y confortable!
          </p>
        </div>
      </div>
    </div>
  </div> --}}




@section('scripts_importados')


  <script src="{{ asset('js/storage.extend.js') }}"></script>


@stop

@stop
