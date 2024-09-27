@extends('components.public.matrix', ['pagina' => 'catalogo'])

@section('title', 'Producto Detalle | ' . config('app.name', 'Laravel'))

@section('css_importados')

@stop

@section('content')
  <?php
  // Definición de la función capitalizeFirstLetter()
  // function capitalizeFirstLetter($string)
  // {
  //     return ucfirst($string);
  // }
  ?>
  <style>
    /* imagen de fondo transparente para calcar el dise;o */
    .clase_table {
      border-collapse: separate;
      border-spacing: 10;
    }

    .fixedWhastapp {
      right: 2vw !important;
    }

    .clase_table td {
      /* border: 1px solid black; */
      border-radius: 10px;
      -moz-border-radius: 10px;
      padding: 10px;
    }

    .swiper-pagination-bullet-active {
      background-color: #272727;
    }

    .swiper-pagination-bullet:not(.swiper-pagination-bullet-active) {
      background-color: #979693 !important;
    }

    .blocker {
      z-index: 20;
    }


    @media (min-width: 600px) {
      #offers .swiper-slide {
        margin-right: 100px !important;
      }

      #offers .swiper-slide::before {
        content: '+';
        display: block;
        position: absolute;
        top: 50%;
        right: -70px;
        transform: translateY(-50%);
        font-size: 32px;
        font-weight: bolder;
        color: #ffffff;
        padding: 0px 12px;
        background-color: #0d2e5e;
        border-radius: 50%;
        box-shadow: 0 0 5px rgba(0, 0, 0, .125);
      }

      #offers .swiper-slide:last-child::before {
        content: none;
      }

    }
  </style>

  @php
    $images = ['', '_ambiente'];
    $x = $product->toArray();
    $i = 1;
  @endphp
  @php
    $breadcrumbs = [['title' => 'Inicio', 'url' => route('index')], ['title' => 'Producto', 'url' => '']];
  @endphp
  @php
    $StockActual = $product->stock;
    $maxStock = 100; // maximo stock

    if (!is_null($product->max_stock) > 0) {
        $maxStock = $product->max_stock;
    }
    # calculamos en % cuanto queda en base a 100
    $stock = 0;
    if ($maxStock !== 0) {
        $stock = ($StockActual * 100) / $maxStock;
    }

  @endphp

  <main class="font-mulish_Regular" id="mainSection">
    @csrf
    <section class="w-full px-[5%] md:px-[8%]">
      <div class="grid grid-cols-1 2md:grid-cols-2 gap-10 md:gap-16 pt-8 lg:pt-16">

        <div class="flex flex-col md:flex-row justify-start md:gap-12 md:h-max-[540px] relative">
          <!-- Contenedor de la imagen principal -->
          <div id="containerProductosdetail"
            class=" w-[340px] md:w-[413px] flex justify-center h-[330px] 2xs:h-[400px] sm:h-[450px] xl:h-[550px] rounded-3xl overflow-hidden 
            order-1 md:order-2">
            <img src="{{ asset($product->imagen) }}" alt="computer" class="w-full h-full object-contain" data-aos="fade-up"
              data-aos-offset="150" onerror="this.onerror=null;this.src='/images/img/noimagen.jpg';">
          </div>

          <!-- Contenedor del slider de productos -->
          <div class="md:w-[75px] md:h-[540px] md:order-1 order-2 mt-5 md:mt-0">
            <x-product-slider :product="$product" />
          </div>
        </div>
        <div class="flex flex-col gap-6  mt-4 mb-24">
          <div class="flex flex-col max-w-[505px]">
            <div class="flex flex-col pb-6 w-full max-md:max-w-full">
              <div class="flex flex-col w-full max-md:max-w-full">
                <div class="flex flex-col justify-center w-full text-zinc-950 max-md:max-w-full">
                  <div class="text-xs font-mulish_Medium">{{ $product->category->name }}</div>
                  <div class="mt-1 text-[40px] font-mulish_Bold max-md:max-w-full">
                    {{ $product->producto }}
                  </div>
                </div>
                <div class="flex gap-2.5 items-center self-start mt-4 text-xs font-mulish_Medium text-zinc-950">
                  <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/210cf34f306a0c8793dc6e1384cc19c26139c217f7d854b2cdf0f526c1a16f17?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                    class="object-contain shrink-0 self-stretch my-auto aspect-[5.49] w-[88px]" />
                  <div class="self-stretch my-auto">11 Reseñas</div>
                </div>
              </div>
              <div class="mt-6 font-mulish_Regular  text-zinc-500 max-md:max-w-full">
                {{ $product->description }}
              </div>
              <div class="flex flex-wrap gap-3 items-center mt-6 w-full max-md:max-w-full">
                @if ($product->oferta > 0)
                  <div class="self-stretch my-auto text-3xl font-mulish_Bold text-neutral-900">
                    S/ {{ $product->oferta }}
                  </div>
                  <div class="self-stretch my-auto text-xl font-mulish_Medium  text-zinc-500">
                    S/ {{ $product->precio }}
                  </div>
                @else
                  <div class="self-stretch my-auto text-3xl font-mulish_Bold text-neutral-900">
                    S/ {{ $product->precio }}
                  </div>
                @endif
              </div>
              <div class="flex flex-wrap gap-6 justify-center items-center mt-6 w-full max-md:max-w-full">
                <div
                  class="flex flex-1 shrink gap-3 items-center self-stretch my-auto whitespace-nowrap basis-0 min-w-[240px]">
                  <div class="self-stretch my-auto text-sm text-zinc-500">Cantidad</div>
                  <div
                    class="flex gap-1 items-center self-stretch px-2 py-1.5 my-auto font-mulish_Regular font-mulish_Medium text-black rounded border border-black border-solid">
                    <div class="self-stretch my-auto">01</div>
                    <img loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/c17fd8f44f7ae5254a817f4dca91799083eb8099d2491bb655c4b0b7cffdd1df?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                      class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                  </div>
                </div>
                <div class="flex flex-1 shrink gap-6 self-stretch my-auto basis-0">
                  <div class="my-auto font-mulish_Regular font-mulish_Bold text-neutral-950">Color:</div>
                  <div class="flex flex-1 shrink gap-2 items-center h-full basis-0">
                    <div class="flex shrink-0 self-stretch my-auto w-7 h-7 bg-red-100 rounded-full"></div>
                    <div class="flex shrink-0 self-stretch my-auto w-7 h-7 rounded-full bg-zinc-600"></div>
                    <div class="flex shrink-0 self-stretch my-auto w-7 h-7 bg-orange-100 rounded-full"></div>
                    <div class="flex shrink-0 self-stretch my-auto w-7 h-7 bg-orange-50 rounded-full"></div>
                    <div class="flex shrink-0 self-stretch my-auto w-7 h-7 bg-gray-200 rounded-full"></div>
                  </div>
                </div>
              </div>
              <div class="flex flex-col mt-6 w-full text-sm text-zinc-950 max-md:max-w-full">
                <div class="max-md:max-w-full">
                  Disponibilidad:
                  <span class="text-zinc-950"> {{ $product->stock > 0 ? 'En stock' : 'No Disponible' }}</span>
                </div>
                <div class="mt-2 max-md:max-w-full">
                  Marca:
                  <span class="text-zinc-950">Apple</span>
                </div>
                <div class="mt-2 max-md:max-w-full">
                  Peso con empaque:
                  <span class="text-zinc-950">0.310 kg</span>
                </div>
                <div class="mt-2 text-zinc-500 max-md:max-w-full">
                  Producto sin devolución
                </div>
                <div class="mt-2 max-md:max-w-full">
                  Producto de:
                  <span class="text-zinc-950">Vendedor verificado</span>
                </div>
                <div class="mt-2 max-md:max-w-full">
                  SKU:
                  <span class="text-zinc-950">Vendedor 182631_8d860u3e</span>
                </div>
              </div>
              <div
                class="flex flex-wrap gap-4 items-start mt-6 w-full text-sm font-mulish_Bold text-zinc-950 max-md:max-w-full">
                <div class="flex flex-1 shrink gap-2 items-center p-4 rounded-lg basis-0 bg-neutral-100 min-w-[168px]">
                  <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/097b84dfeeaf9365d1a9194c0988752da3a1325f5b3e7e6eb28ce6e4fa92466f?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                    class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                  <div class="flex-1 shrink my-auto basis-0">
                    <span class="text-zinc-500">Tamaño de pantalla</span>
                    <br />
                    6.7&quot;
                  </div>
                </div>
                <div
                  class="flex flex-1 shrink gap-2 items-center px-4 py-3.5 rounded-lg basis-0 bg-neutral-100 min-h-[64px] min-w-[168px]">
                  <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/3054bc8ee2097b9f27f41a66ef637d0e798897aaa979bd8dc6eba3919a92e287?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                    class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                  <div class="flex-1 shrink my-auto basis-0">
                    <span class="text-zinc-500">CPU</span>
                    Apple A16 Bionic
                  </div>
                </div>
                <div
                  class="flex flex-1 shrink gap-2 items-center px-4 py-3.5 rounded-lg basis-0 bg-neutral-100 min-h-[64px] min-w-[168px]">
                  <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/0ae847612036b118de1f22da475013af26dbee3970974cd6abd0c16b5d818f1e?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                    class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                  <div class="flex-1 shrink my-auto basis-0">
                    <span class="text-zinc-500">Number of Cores</span>
                    6
                  </div>
                </div>
                <div
                  class="flex flex-1 shrink gap-2 items-center px-4 py-3.5 rounded-lg basis-0 bg-neutral-100 min-h-[64px] min-w-[168px]">
                  <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/2056b6e99d3776270412b4884cc2c7f0e2503122ad3f955485daeef7c5a43373?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                    class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                  <div class="flex-1 shrink my-auto basis-0">
                    <span class="text-zinc-500">Main camera</span>
                    <br />
                    48-12 -12 MP
                  </div>
                </div>
                <div
                  class="flex flex-1 shrink gap-2 items-center px-4 py-3.5 rounded-lg basis-0 bg-neutral-100 min-h-[64px] min-w-[168px]">
                  <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/0c0dcb86fa07830b61245469cbe4f3459d7f4e734ca1840028f54acd73773375?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                    class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                  <div class="flex-1 shrink my-auto basis-0">
                    <span class="text-zinc-500">Front-camera</span>
                    12 MP
                  </div>
                </div>
                <div
                  class="flex flex-1 shrink gap-2 items-center px-4 py-3.5 rounded-lg basis-0 bg-neutral-100 min-h-[64px] min-w-[168px]">
                  <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/a714f3c016828075a0d9b3e0c33176fcbabe8e4abe4e196aff8b598024d9c6ad?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                    class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                  <div class="flex-1 shrink my-auto basis-0">
                    <span class="text-zinc-500">Battery capacity</span>
                    4323 mAh
                  </div>
                </div>
              </div>
            </div>
            <div class="flex flex-col p-8 mt-5 w-full rounded-3xl bg-neutral-100 max-md:px-5 max-md:max-w-full">
              <div class="flex flex-col w-full max-md:max-w-full">
                <div class="flex gap-10 justify-between items-center w-full text-xs max-md:max-w-full">
                  @if ($product->oferta > 0)
                    <div class="flex flex-col self-stretch my-auto">
                      <div class="text-zinc-950 text-opacity-40">
                        <span class="text-zinc-950">Precio: </span>
                        <span class="line-through text-zinc-950">S/ {{ $product->precio }}</span>
                      </div>
                      <div class="mt-1 font-mulish_Bold text-zinc-950">Ahorras: S/ {{ $product->oferta }}
                        ({{ round((($product->precio - $product->oferta) / $product->precio) * 100) }}%)</div>
                    </div>
                  @endif
                  <div
                    class="gap-2.5 self-stretch px-3 py-2 my-auto font-mulish_Bold text-lime-400 rounded-xl bg-zinc-950">
                    Envío gratis
                  </div>
                </div>
                <div class="mt-8 text-4xl font-mulish_Bold text-zinc-950 max-md:max-w-full">
                  S/ {{ $product->precio }}
                </div>
                <div class="flex flex-col mt-8 w-full text-sm font-mulish_Medium max-md:max-w-full">
                  <div class="flex gap-3 items-center w-full max-md:max-w-full">
                    <img loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/63e6ecf3a665e18274aa4c462e15e0cf347abc8ff44f7a7658ab0ecaac95c0ac?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                      class="object-contain shrink-0 self-stretch my-auto w-4 aspect-square" />
                    <div class="flex gap-2 items-center self-stretch my-auto min-w-[240px]">
                      <div class="self-stretch my-auto text-zinc-950">
                        Este producto tiene
                      </div>
                      <div
                        class="gap-2.5 self-stretch px-1.5 py-1 my-auto rounded-lg bg-[#9AFA26] bg-opacity-40 text-zinc-950">
                        Garantía de Entrega
                      </div>
                    </div>
                  </div>
                  <div class="flex gap-3 items-center mt-3 w-full text-zinc-950 max-md:max-w-full">
                    <img loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/45047bcb091bba8f8f3d7d3086b27ae7b6cd41047da72bfd0c623cd2d3db7143?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                      class="object-contain shrink-0 self-stretch my-auto w-4 aspect-square" />
                    <div class="self-stretch my-auto">
                      Agrega el producto al carrito para conocer los costos de envío
                    </div>
                  </div>
                  <div class="flex gap-3 items-center mt-3 w-full text-zinc-950 max-md:max-w-full">
                    <img loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/87e003dad5b46bc764bb48b7e89aca24c449f6b28069c4aa2f91153b573779e4?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                      class="object-contain shrink-0 self-stretch my-auto w-4 aspect-square" />
                    <div class="flex-1 shrink self-stretch my-auto basis-0">
                      Recibí aproximadamente entre 18 y 23 días hábiles, seleccionando
                      envío normal
                    </div>
                  </div>
                </div>
                <div
                  class="flex gap-2 items-center px-4 py-3 mt-8 w-full font-mulish_Regular font-mulish_Medium bg-lime-200 rounded-lg text-zinc-950 max-md:max-w-full">
                  <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/dbeefc5c4a406246c1344618009d19886db5217f6552c53e2abbefbc70d2b155?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                    class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                  <div class="self-stretch my-auto">Hasta x6 cuotas sin intereses</div>
                </div>
                <div class="flex gap-10 items-start mt-8 w-full max-md:max-w-full">
                  <div class="flex flex-col">
                    <div class="flex gap-1 items-start">
                      <img loading="lazy"
                        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/d429e4d62079e21c93377c41b73e849dd1ff20c0d7b6359b7e2cd455f74b486a?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/d429e4d62079e21c93377c41b73e849dd1ff20c0d7b6359b7e2cd455f74b486a?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/d429e4d62079e21c93377c41b73e849dd1ff20c0d7b6359b7e2cd455f74b486a?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/d429e4d62079e21c93377c41b73e849dd1ff20c0d7b6359b7e2cd455f74b486a?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/d429e4d62079e21c93377c41b73e849dd1ff20c0d7b6359b7e2cd455f74b486a?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/d429e4d62079e21c93377c41b73e849dd1ff20c0d7b6359b7e2cd455f74b486a?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/d429e4d62079e21c93377c41b73e849dd1ff20c0d7b6359b7e2cd455f74b486a?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/d429e4d62079e21c93377c41b73e849dd1ff20c0d7b6359b7e2cd455f74b486a?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                        class="object-contain shrink-0 w-10 aspect-[1.54]" />
                      <img loading="lazy"
                        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/362a8fb23120c6d780b5c6f6a2385d27eb6945afa2aed7dd5a994d7ef8d96d32?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/362a8fb23120c6d780b5c6f6a2385d27eb6945afa2aed7dd5a994d7ef8d96d32?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/362a8fb23120c6d780b5c6f6a2385d27eb6945afa2aed7dd5a994d7ef8d96d32?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/362a8fb23120c6d780b5c6f6a2385d27eb6945afa2aed7dd5a994d7ef8d96d32?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/362a8fb23120c6d780b5c6f6a2385d27eb6945afa2aed7dd5a994d7ef8d96d32?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/362a8fb23120c6d780b5c6f6a2385d27eb6945afa2aed7dd5a994d7ef8d96d32?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/362a8fb23120c6d780b5c6f6a2385d27eb6945afa2aed7dd5a994d7ef8d96d32?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/362a8fb23120c6d780b5c6f6a2385d27eb6945afa2aed7dd5a994d7ef8d96d32?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                        class="object-contain shrink-0 aspect-[1.5] w-[39px]" />
                      <img loading="lazy"
                        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/0b72cf8afa312611fb61fd5ca8e58668577707e7c844ec0128b2a1cb9eb5a6ed?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/0b72cf8afa312611fb61fd5ca8e58668577707e7c844ec0128b2a1cb9eb5a6ed?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/0b72cf8afa312611fb61fd5ca8e58668577707e7c844ec0128b2a1cb9eb5a6ed?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/0b72cf8afa312611fb61fd5ca8e58668577707e7c844ec0128b2a1cb9eb5a6ed?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/0b72cf8afa312611fb61fd5ca8e58668577707e7c844ec0128b2a1cb9eb5a6ed?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/0b72cf8afa312611fb61fd5ca8e58668577707e7c844ec0128b2a1cb9eb5a6ed?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/0b72cf8afa312611fb61fd5ca8e58668577707e7c844ec0128b2a1cb9eb5a6ed?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/0b72cf8afa312611fb61fd5ca8e58668577707e7c844ec0128b2a1cb9eb5a6ed?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                        class="object-contain shrink-0 w-10 aspect-[1.54]" />
                      <img loading="lazy"
                        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/06afbcbad0b203e0dc301470e2a843ad8782caa5f58c0e61f676556c1f754208?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/06afbcbad0b203e0dc301470e2a843ad8782caa5f58c0e61f676556c1f754208?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/06afbcbad0b203e0dc301470e2a843ad8782caa5f58c0e61f676556c1f754208?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/06afbcbad0b203e0dc301470e2a843ad8782caa5f58c0e61f676556c1f754208?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/06afbcbad0b203e0dc301470e2a843ad8782caa5f58c0e61f676556c1f754208?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/06afbcbad0b203e0dc301470e2a843ad8782caa5f58c0e61f676556c1f754208?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/06afbcbad0b203e0dc301470e2a843ad8782caa5f58c0e61f676556c1f754208?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/06afbcbad0b203e0dc301470e2a843ad8782caa5f58c0e61f676556c1f754208?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                        class="object-contain shrink-0 w-10 aspect-[1.54]" />
                      <img loading="lazy"
                        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/85895488a3402b5094e3fe5d28fdff47bc38946a876ccdd57237bf2fd01b9c43?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/85895488a3402b5094e3fe5d28fdff47bc38946a876ccdd57237bf2fd01b9c43?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/85895488a3402b5094e3fe5d28fdff47bc38946a876ccdd57237bf2fd01b9c43?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/85895488a3402b5094e3fe5d28fdff47bc38946a876ccdd57237bf2fd01b9c43?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/85895488a3402b5094e3fe5d28fdff47bc38946a876ccdd57237bf2fd01b9c43?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/85895488a3402b5094e3fe5d28fdff47bc38946a876ccdd57237bf2fd01b9c43?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/85895488a3402b5094e3fe5d28fdff47bc38946a876ccdd57237bf2fd01b9c43?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/85895488a3402b5094e3fe5d28fdff47bc38946a876ccdd57237bf2fd01b9c43?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                        class="object-contain shrink-0 w-10 aspect-[1.54]" />
                    </div>
                    <div class="flex gap-1 items-start mt-1">
                      <img loading="lazy"
                        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/13efdadfba40cbe79d355dac9bbde85d6b6c5194e7a0403d209ee4c4aa67bf2c?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/13efdadfba40cbe79d355dac9bbde85d6b6c5194e7a0403d209ee4c4aa67bf2c?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/13efdadfba40cbe79d355dac9bbde85d6b6c5194e7a0403d209ee4c4aa67bf2c?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/13efdadfba40cbe79d355dac9bbde85d6b6c5194e7a0403d209ee4c4aa67bf2c?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/13efdadfba40cbe79d355dac9bbde85d6b6c5194e7a0403d209ee4c4aa67bf2c?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/13efdadfba40cbe79d355dac9bbde85d6b6c5194e7a0403d209ee4c4aa67bf2c?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/13efdadfba40cbe79d355dac9bbde85d6b6c5194e7a0403d209ee4c4aa67bf2c?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/13efdadfba40cbe79d355dac9bbde85d6b6c5194e7a0403d209ee4c4aa67bf2c?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                        class="object-contain shrink-0 w-10 aspect-[1.54]" />
                      <img loading="lazy"
                        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/d18a06a7bb65a8c7ae8c0cb6e8c0096cc6240a316059291d985c7d301eaa5dd9?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/d18a06a7bb65a8c7ae8c0cb6e8c0096cc6240a316059291d985c7d301eaa5dd9?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/d18a06a7bb65a8c7ae8c0cb6e8c0096cc6240a316059291d985c7d301eaa5dd9?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/d18a06a7bb65a8c7ae8c0cb6e8c0096cc6240a316059291d985c7d301eaa5dd9?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/d18a06a7bb65a8c7ae8c0cb6e8c0096cc6240a316059291d985c7d301eaa5dd9?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/d18a06a7bb65a8c7ae8c0cb6e8c0096cc6240a316059291d985c7d301eaa5dd9?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/d18a06a7bb65a8c7ae8c0cb6e8c0096cc6240a316059291d985c7d301eaa5dd9?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/d18a06a7bb65a8c7ae8c0cb6e8c0096cc6240a316059291d985c7d301eaa5dd9?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                        class="object-contain shrink-0 w-10 aspect-[1.54]" />
                      <img loading="lazy"
                        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/7a7b6eed8e68db41a2b77744b1e641355c558790f0bd39e6ec66c17716aee005?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/7a7b6eed8e68db41a2b77744b1e641355c558790f0bd39e6ec66c17716aee005?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/7a7b6eed8e68db41a2b77744b1e641355c558790f0bd39e6ec66c17716aee005?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/7a7b6eed8e68db41a2b77744b1e641355c558790f0bd39e6ec66c17716aee005?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/7a7b6eed8e68db41a2b77744b1e641355c558790f0bd39e6ec66c17716aee005?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/7a7b6eed8e68db41a2b77744b1e641355c558790f0bd39e6ec66c17716aee005?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/7a7b6eed8e68db41a2b77744b1e641355c558790f0bd39e6ec66c17716aee005?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/7a7b6eed8e68db41a2b77744b1e641355c558790f0bd39e6ec66c17716aee005?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                        class="object-contain shrink-0 w-10 aspect-[1.54]" />
                      <img loading="lazy"
                        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/d4e554848be334efa55393b82e6f23433644ffbbc7e3797dd420b9b18088e515?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/d4e554848be334efa55393b82e6f23433644ffbbc7e3797dd420b9b18088e515?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/d4e554848be334efa55393b82e6f23433644ffbbc7e3797dd420b9b18088e515?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/d4e554848be334efa55393b82e6f23433644ffbbc7e3797dd420b9b18088e515?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/d4e554848be334efa55393b82e6f23433644ffbbc7e3797dd420b9b18088e515?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/d4e554848be334efa55393b82e6f23433644ffbbc7e3797dd420b9b18088e515?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/d4e554848be334efa55393b82e6f23433644ffbbc7e3797dd420b9b18088e515?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/d4e554848be334efa55393b82e6f23433644ffbbc7e3797dd420b9b18088e515?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                        class="object-contain shrink-0 aspect-[1.5] w-[39px]" />
                      <img loading="lazy"
                        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/2a3bd114b3e63234c2b54fb4170d47b199b59b5a9fad82bf57847355660da108?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/2a3bd114b3e63234c2b54fb4170d47b199b59b5a9fad82bf57847355660da108?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/2a3bd114b3e63234c2b54fb4170d47b199b59b5a9fad82bf57847355660da108?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/2a3bd114b3e63234c2b54fb4170d47b199b59b5a9fad82bf57847355660da108?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/2a3bd114b3e63234c2b54fb4170d47b199b59b5a9fad82bf57847355660da108?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/2a3bd114b3e63234c2b54fb4170d47b199b59b5a9fad82bf57847355660da108?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/2a3bd114b3e63234c2b54fb4170d47b199b59b5a9fad82bf57847355660da108?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/2a3bd114b3e63234c2b54fb4170d47b199b59b5a9fad82bf57847355660da108?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                        class="object-contain shrink-0 w-10 aspect-[1.54]" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex flex-col mt-10 w-full  font-mulish_Bold text-zinc-950 max-md:max-w-full">
                <div
                  class="gap-2.5 self-stretch px-6 py-4 w-full whitespace-nowrap bg-[#9AFA26] rounded-xl max-md:px-5 max-md:max-w-full text-center cursor-pointer">
                  Comprar
                </div>
                <div
                  class="gap-2.5 self-stretch px-6 py-4 mt-3 w-full rounded-xl border border-solid border-zinc-950 max-md:px-5 max-md:max-w-full text-center cursor-pointer">
                  Agregar al Carrito
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @if ($ProdComplementarios->count() > 0)
      <section class="w-full px-[5%] py-10 lg:py-10 overflow-visible" style="overflow-x: visible">
        <div class="flex flex-col md:flex-row justify-between w-full gap-3" data-aos="zoom-out-left">
          <h1 class="text-[32px] md:text-3xl font-mulish_Bold font- text-[#111111]">Productos Relacinados
          </h1>
          <div
            class="flex gap-2.5 justify-center items-center self-stretch px-4 py-3 my-auto text-base bg-[#9AFA26] rounded-xl min-w-[240px] text-zinc-950">
            <a href="/catalogo" class="self-stretch my-auto font-mulish_Bold cursor-pointer">Ver Más</a>
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/0448c1bbdfa12dffa95e5de9d23f4da994ed54d115e5e1bf10b41154192595e4?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
              class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
          </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-4       md:flex-row gap-9 mt-14 w-full">
          @foreach ($ProdComplementarios as $item)
            <x-product.container width="col-span-1 " bgcolor="bg-neutral-100" :item="$item" />
          @endforeach
        </div>
      </section>
    @endif

    {{--  @if ($combo->id)
      <section class="bg-[#F8F8F8] py-10 lg:py-14">
        <div class="w-full px-[5%] md:px-[8%]">
          <div class="flex flex-col justify-between w-full ">
            <h1 class="text-3xl font-Inter_SemiBold tracking-tight">Por tu compra llévate</h1>
            <div class="flex flex-col mt-7">
              <div class="border rounded-md shadow-sm py-4 px-6">
                <div class="flex justify-between items-center mb-4">
                  <div>
                    <b class="block text-xl">{{ $combo->producto }}</b>
                    <span class="flex items-start gap-1">
                      <span class="text-lg font-semibold">S/. {{ $combo->descuento }}</span>
                      <span class="text-sm line-through">{{ $combo->precio }}</span>
                    </span>
                  </div>
                  <button id="btnAgregarCombo" type="button"
                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-mulish_Medium rounded-full text-sm px-3 py-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
                    data-id={{ $combo->id }}>
                    <i class="fa fa-cart-plus"></i>
                    Agregar al carrito
                  </button>
                </div>
                <div class="grid grid-cols-3 gap-3  mb-6">
                  <div class="col-span-3">
                    <div class="swiper productos-relacionados ">
                      <div class="swiper-wrapper h-full" id="offers">
                        @foreach ($combo->products as $item)
                          <div class="swiper-slide w-full h-full col-span-1">
                            <div class="flex flex-col items-center justify-center col-span-1  shadow-lg py-2  pb-5">
                              <a href="/producto/{{ $item->id }}" target="_blanck">
                                
                                <x-product.container width="col-span-1 " bgcolor="" :item="$item" />
                              </a>
                            </div>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
      </section>
    @endif --}}

    {{--  <section class="bg-[#F8F8F8] py-10 lg:py-14">
      <div class="w-full px-[5%] md:px-[8%]">
        <div class="flex flex-col md:flex-row justify-between w-full ">
          <h1 class="text-3xl font-Inter_SemiBold tracking-tight">Productos Relacionados</h1>
          @php
            $url = '#';
            if (isset($ProdComplementarios) && count($ProdComplementarios) > 0) {
                $url = "/catalogo/{$ProdComplementarios[0]->categoria_id}";
            }
          @endphp
          <a href="{{ $url }}"
            class="flex items-center font-mulish_Regular font-Inter_SemiBold text-[#006BF6] ">Ver
            todos los productos <img src="{{ asset('images/img/arrowBlue.png') }}" alt="Icono" class="ml-5 "></a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-14 w-full">
          @foreach ($ProdComplementarios->take(4) as $item)
            
            <x-product.container width="col-span-1 " bgcolor="bg-[#FFFFFF]" :item="$item" />
          @endforeach
        </div>
      </div>

    </section> --}}

    {{--  @if ($testimonios->count() > 0)
      <section class="">
        <div class="w-full px-[5%] md:px-[8%]">
          <h3 class="text-[34.7px] font-Inter_Medium "> ¿Qué dicen los clientes sobre nosotros?</h3>
          <div class="grid grid-cols-3 w-full gap-8 pt-16">
            @foreach ($testimonios->take(3) as $item)
              <div class="flex flex-col bg-[#F7F7F7] col-span-1 p-12 gap-4">
                <div class="flex items-center gap-4 pt-3">
                  <!-- Contenedor Flex para la imagen y el texto -->
                  <p class="font-Inter_Medium text-[24px] flex-1">{{ $item->name }}</p>
                  <!-- flex-1 hace que el texto ocupe el espacio disponible -->
                  <img src="{{ asset('images\svg\icons8-comillas-48.png') }}" alt=""
                    class="w-10 h-10 rounded-full">
                </div>
                <div class="min-h-[130px]">
                  <p class="font-Inter_Medium text-[19px] pt-1 leading-8 ">
                    {{ $item->testimonie }}
                  </p>
                </div>

                <div class="font-Inter_Bold text-[24px] w-5">
                  {{ $item->ocupation }}
                </div>
                <p class="text-[16px] font-Inter_Regular">Lima, Peru</p>
              </div>
            @endforeach
          </div>
        </div>
      </section>
    @endif --}}

  </main>

@section('scripts_importados')
  <script>
    var headerServices = new Swiper(".productos-relacionados", {
      slidesPerView: 4,
      spaceBetween: 10,
      loop: false,
      centeredSlides: false,
      initialSlide: 0, // Empieza en el cuarto slide (índice 3) */
      /* pagination: {
        el: ".swiper-pagination-estadisticas",
        clickable: true,
      }, */
      //allowSlideNext: false,  //Bloquea el deslizamiento hacia el siguiente slide
      //allowSlidePrev: false,  //Bloquea el deslizamiento hacia el slide anterior
      allowTouchMove: true, // Bloquea el movimiento táctil
      autoplay: {
        delay: 5500,
        disableOnInteraction: true,
        pauseOnMouseEnter: true
      },

      breakpoints: {
        0: {
          slidesPerView: 1,
          centeredSlides: true,
          loop: false,
        },
        420: {
          slidesPerView: 2,
          centeredSlides: false,

        },
        700: {
          slidesPerView: 3,
          centeredSlides: false,

        },
        850: {
          slidesPerView: 4,
          centeredSlides: false,

        },
      },
    });
  </script>
  <script>
    // $(document).ready(function() {


    function capitalizeFirstLetter(string) {
      string = string.toLowerCase()
      return string.charAt(0).toUpperCase() + string.slice(1);
    }
    // })
    $('#disminuir').on('click', function() {
      let cantidad = Number($('#cantidadSpan span').text())
      if (cantidad > 0) {
        cantidad--
        $('#cantidadSpan span').text(cantidad)
      }


    })
    // cantidadSpan
    $('#aumentar').on('click', function() {
      let cantidad = Number($('#cantidadSpan span').text())
      cantidad++
      $('#cantidadSpan span').text(cantidad)

    })
  </script>
  <script>
    // let articulosCarrito = [];

    /* 
        function deleteOnCarBtn(id, operacion) {
          const prodRepetido = articulosCarrito.map(item => {
            if (item.id === id && item.cantidad > 0) {
              item.cantidad -= Number(1);
              return item; // retorna el objeto actualizado 
            } else {
              return item; // retorna los objetos que no son duplicados 
            }

          });
          Local.set('carrito', articulosCarrito)
          limpiarHTML()
          PintarCarrito()


        } */

    function calcularTotal() {
      let articulos = Local.get('carrito')
      let total = articulos.map(item => {
        let monto
        if (Number(item.descuento) !== 0) {
          monto = item.cantidad * Number(item.descuento)
        } else {
          monto = item.cantidad * Number(item.precio)

        }
        return monto

      })
      const suma = total.reduce((total, elemento) => total + elemento, 0);

      $('#itemsTotal').text(`S/. ${suma.toFixed(2)} `)

    }

    /*  function addOnCarBtn(id, operacion) {

       const prodRepetido = articulosCarrito.map(item => {
         if (item.id === id) {
           item.cantidad += Number(1);
           return item; // retorna el objeto actualizado 
         } else {
           return item; // retorna los objetos que no son duplicados 
         }

       });
       Local.set('carrito', articulosCarrito)
       // localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
       limpiarHTML()
       PintarCarrito()


     } */



    var appUrl = <?php echo json_encode($url_env); ?>;
    $(document).ready(function() {
      articulosCarrito = Local.get('carrito') || [];

      // PintarCarrito();
    });

    function limpiarHTML() {
      //forma lenta 
      /* contenedorCarrito.innerHTML=''; */
      $('#itemsCarrito').html('')


    }

    $('#btnAgregarCombo').on('click', async function() {
      const offerId = this.getAttribute('data-id')
      const res = await fetch(`/api/offers/${offerId}`)
      const data = await res.json()

      let nombre = `<b>${data.producto}</b><ul class="mb-1">`
      data.products.forEach(product => {
        nombre +=
          `<li class="text-xs text-nowrap overflow-hidden text-ellipsis w-[270px]">${product.producto}</li>`
      })
      nombre += '</ul>'

      let newcarrito
      articulosCarrito = Local.get('carrito') ?? []


      const index = articulosCarrito.findIndex(item => item.id == data.id && item.isCombo)

      if (index != -1) {

        articulosCarrito = articulosCarrito.map(item => {
          if (item.isCombo && item.id == data.id) {
            item.nombre = nombre
            item.cantidad++
          }
          return item
        })
      } else {

        articulosCarrito = [...articulosCarrito, {
          "id": data.id,
          "isCombo": true,
          "producto": nombre,
          "descuento": data.descuento,
          "precio": data.precio,
          "imagen": data.imagen ? `${appUrl}${data.imagen}` : `${appUrl}/images/img/noimagen.jpg`,
          "cantidad": 1,
          "color": null
        }]

      }


      Local.set('carrito', articulosCarrito)

      limpiarHTML()
      PintarCarrito()
      mostrarTotalItems()

      Swal.fire({
        icon: "success",
        title: `Combo agregado correctamente`,
        showConfirmButton: true
      });
    })



    $('#addWishlist').on('click', function() {
      $.ajax({
        url: `{{ route('wishlist.store') }}`,
        method: 'POST',
        data: {
          _token: $('input[name="_token"]').val(),
          product_id: '{{ $product->id }}'
        },
        success: function(response) {

          // Cambiar el color del botón

          if (response.message === 'Producto agregado a la lista de deseos') {
            $('#addWishlist').removeClass('bg-[#99b9eb]').addClass('bg-[#0D2E5E]');
          } else {
            $('#addWishlist').removeClass('bg-[#0D2E5E]').addClass('bg-[#99b9eb]');
          }
          Swal.fire({
            icon: 'success',
            title: response.message,
            showConfirmButton: false,
            timer: 1500
          });
        },
        error: function(error) {
          console.log(error);
        }
      });
    })
  </script>


@stop

@stop
