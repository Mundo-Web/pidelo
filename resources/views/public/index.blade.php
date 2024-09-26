@extends('components.public.matrix', ['pagina' => 'index'])

@section('css_importados')

@stop

{{-- @php
  $bannersBottom = array_filter($banners, function ($banner) {
      return $banner['potition'] === 'bottom';
  });
  $bannerMid = array_filter($banners, function ($banner) {
      return $banner['potition'] === 'mid';
  });
@endphp --}}
<style>
  @media (max-width: 600px) {
    .fixedWhastapp {
      right: 13px !important;
    }
  }



  @media (max-width: 400px) {
    #cart-modal {
      width: 302px !important;
      right: 25% !important;
      top: 5px !important;
      /* left: 0% !important; */
    }
  }

  @media (min-width: 400px) and (max-width: 700px) {
    #cart-modal {
      width: 302px !important;
      right: 16% !important;
      top: 5px;
      /* left: 0% !important; */
    }
  }



  .swiper-button-next,
  .swiper-button-prev {
    position: absolute;
    top: 50%;
    width: 44px;
    height: 44px;
    margin-top: -22px;
    z-index: 10;
    cursor: pointer;
  }

  .swiper-button-next {
    right: 10px;
  }

  .swiper-button-prev {
    left: 10px;
  }

  .swiper-button-next img,
  .swiper-button-prev img {
    width: 100%;
    height: 100%;
  }
</style>



@section('content')

  <main class="z-[15] ">

    <section class="bg-[#f6f6f6]   my-10 mx-[5%] rounded-xl">
      <x-swipper-card :items="$slider" />
    </section>

    {{-- @if ($benefit->count() > 0)
      <section class="py-10 lg:py-13 bg-[#F8F8F8] w-full px[5%]" data-aos="zoom-out-right">
        <div class="grid grid-cols-1  gap-6 md:grid-cols-4 ">
          @foreach ($benefit as $item)
            <div class="flex flex-col items-center w-full gap-1 justify-center text-center px-[10%] xl:px-[18%]">
              <img src="{{ asset($item->icono) }}" alt="">
              <h4 class="text-xl font-mulish_Bold font-mulish_Medium"> {{ $item->titulo }} </h4>
              <div class="text-lg leading-8 text-[#444444] font-mulish_Medium">{!! $item->descripcionshort !!}</div>
            </div>
          @endforeach
        </div>
      </section>
    @endif --}}

    @if ($benefit->count() > 0)
      <section class="mx-[5%] text-[16px]">

        <div
          class="flex flex-row gap-10 justify-between items-center px-10 py-8 w-full rounded-3xl border border-solid border-neutral-200 text-zinc-950 max-md:px-5 max-md:max-w-full">

          @foreach ($benefit as $index => $item)
            @if ($index !== 0)
              <img loading="lazy" src="/images/pidelope/Vector3.png" class="object-contain shrink-0 self-stretch" />
            @endif
            <div class="flex gap-4 items-center self-stretch my-auto w-1/4 ">
              <img loading="lazy" src="{{ asset($item->icono) }}" class="object-contain shrink-0 w-12 aspect-square " />
              <div class="flex flex-col w-full]">
                <div class="text-base font-mulish_Bold">{{ $item->titulo }}</div>
                <div class="mt-2 text-sm opacity-[0.56]">{!! $item->descripcion !!}</div>

              </div>
            </div>
          @endforeach
      </section>
    @endif




    @if ($categoriasAll->count() > 0)
      {{-- <x-sections.simple title="Categorias" class="sectionOverflow">
        <div style="overflow-x: hidden">
          <x-swipper-card-categoria :items="$categorias" />

        </div>
      </x-sections.simple> --}}



      <section class="mx-[5%] my-16 ">
        <div class=" mt-20 w-full max-md:mt-10 max-md:max-w-full relative">
          <div
            class="flex flex-row gap-10 justify-between items-center pb-6 w-full border-b border-neutral-200 max-md:max-w-full">
            <div class="self-stretch my-auto text-3xl font-mulish_Bold  text-zinc-950">
              Comprar por categorías
            </div>
            <div class="flex gap-3 justify-center items-center self-stretch my-auto">
              <div class="prev-cat flex gap-2.5 items-center self-stretch p-2 my-auto w-8 h-8 bg-[#9AFA26] rounded-lg">
                <img loading="lazy"
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/38dbc3ba3fafac21d9cd9793b6015a45a393c978dc223540590f965ac0b01667?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                  class="object-contain w-4 aspect-square" />
              </div>
              <div
                class="next-cat flex gap-2.5 items-center self-stretch py-2 pr-2 pl-2 my-auto w-8 h-8 rounded-lg bg-zinc-50">
                <img loading="lazy"
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/2d954cd5757b6a0e2575ce9ba5cb67ae9662122dc7e0e72c6babd8f86a1f377c?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                  class="object-contain aspect-[1.06] w-[17px]" />
              </div>
            </div>
          </div>

          <div class="content-center text-center mt-6 ">
            <div class="swiper categorias-slider  flex items-center justify-center h-max ">
              <div class="swiper-wrapper flex items-center">
                @foreach ($categoriasAll->chunk(2) as $chuck)
                  <div class="swiper-slide flex items-center justify-center gap-2 ">
                    @foreach ($chuck as $item)
                      <a href="/catalogo/{{ $item->id }}"
                        class="mt-4 flex gap-2 items-center self-stretch px-4 py-2 my-auto rounded-xl bg-[#F7F7F7] bg-opacity-35 hover:bg-neutral-100 w-full cursor-pointer group">
                        <img loading="lazy" src="{{ asset($item->url_image . $item->name_image) }}" alt=""
                          class="object-contain shrink-0 self-stretch my-auto aspect-square w-[120px]" />
                        <div class="flex flex-col justify-start self-stretch my-auto text-start">
                          <div class="text-base font-mulish_Bold text-zinc-950">
                            {{ $item->name }}
                          </div>
                          <div
                            class="mt-2 text-xs font-medium text-[#0A090B] text-opacity-40 group-hover:text-blue-500 group-hover:underline">
                            Ver más
                          </div>
                        </div>
                      </a>
                    @endforeach
                  </div>
                @endforeach
              </div>
              <!-- Agrega la paginación si es necesario -->

            </div>
          </div>



        </div>


      </section>
    @endif

    @if ($banners->count() > 0)
      <section class="mx-[5%] my-10 ">
        <div class="flex flex-col md:flex-row w-full gap-6 h-[22vw]">

          @foreach ($banners as $item)
            <div class="relative h-full w-full bg-cover bg-top bg-no-repeat rounded-3xl"
              style="background-image: url({{ $item->image }});">
              <img src="/images/pidelope/blur.png" alt="" class=" opacity-55  h-full z-10">
              <div class="absolute bottom-[12%] left-8 h-[116px] w-[295px] flex flex-col gap-4 justify-stretch z-20 ">
                <p class="text-[24px] text-white font-mulish_Bold pr-9">{{ $item->title }} <span
                    class="text-[#9AFA26]">{{ $item->description }} </span></p>
                <p class="text-[16px] font-mulish_Regular text-white  ">{{ Str::limit($item->title_btn, 67, '...') }}
                </p>

              </div>
            </div>
          @endforeach




        </div>
      </section>
    @endif



    {{-- seccion Ultimos Productos  --}}
    @if ($productosPupulares->count() > 0)
      <section class="w-full px-[5%] py-10 lg:py-10 overflow-visible" style="overflow-x: visible">
        <div class="flex flex-col md:flex-row justify-between w-full gap-3" data-aos="zoom-out-left">
          <h1 class="text-[32px] md:text-3xl font-mulish_Bold font- text-[#111111]">Destacados
          </h1>
          <div
            class="flex gap-2.5 justify-center items-center self-stretch px-4 py-3 my-auto text-base bg-[#9AFA26] rounded-xl min-w-[240px] text-zinc-950">
            <a href="/catalogo" class="self-stretch my-auto font-mulish_Bold cursor-pointer">Ver todos los Productos</a>
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/0448c1bbdfa12dffa95e5de9d23f4da994ed54d115e5e1bf10b41154192595e4?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
              class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
          </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-4       md:flex-row gap-9 mt-14 w-full">
          @foreach ($productosPupulares as $item)
            <x-product.container width="col-span-1 " bgcolor="bg-neutral-100" :item="$item" />
            {{-- <x-productos-card width="w-1/5" bgcolor="" :item="$item" /> --}}
          @endforeach
        </div>
      </section>
    @endif


    {{-- seccion Gran Descuento  --}}
    {{-- @if (count($bannerMid) > 0)
      <section class="flex flex-col md:flex-row justify-between bg-[#EEEEEE] mt-14 overflow-visible"
        data-aos="fade-down" style="overflow-x: visible">
        <x-banner-section :banner="$bannerMid" />
      </section>
    @endif --}}
    <section class="w-full px-[5%] py-10 lg:py-10 overflow-visible" style="overflow-x: visible">
      <div class="h-[26vw] bg-[#9AFA26] rounded-3xl">
        <div class="px-24 py-14 content-center text-center  h-max">
          <div class="font-mulish_Bold text-[40px] px-28 ">Nuestras Marcas</div>
          <div class="mt-4 font-mulish_Regular px-28 mb-8 2xl:mb-16 ">Lorem ipsum dolor sit amet, consectetur
            adipiscing elit.
            Vivamus eu
            fermentum justo, ac fermentum nulla.
            Sed sed scelerisque urna, vitae ultrices libero. Pellentesque vehicula et urna in venenatis.
          </div>

          <div class="swiper  logos-slider  flex items-center justify-center ">
            <div class="swiper-wrapper flex items-center">
              @foreach ($logos as $item)
                <div class="swiper-slide flex items-center justify-center ">
                  <img src="{{ $item->url_image }}" class="object-contain object-top" alt="">
                </div>
              @endforeach
            </div>
            <!-- Agrega la paginación si es necesario -->
            <div class="swiper-pagination-slider-header"></div>
          </div>



        </div>

      </div>
    </section>



    {{-- seccion Productos populares  --}}
    @if ($descuentos->count() > 0)
      <section class="w-full px-[5%] py-10 lg:py-10 overflow-visible" style="overflow-x: visible">
        <div class="flex flex-col md:flex-row justify-between w-full gap-3" data-aos="zoom-out-left">
          <h1 class="text-[32px] md:text-3xl font-mulish_Bold text-[#111111]">En oferta
          </h1>
          <div
            class="flex gap-2.5 justify-center items-center self-stretch px-4 py-3 my-auto text-base bg-[#9AFA26] rounded-xl min-w-[240px] text-zinc-950">
            <a href="/ofertas" class="self-stretch my-auto font-mulish_Bold">Ver todos los Productos
            </a>
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/0448c1bbdfa12dffa95e5de9d23f4da994ed54d115e5e1bf10b41154192595e4?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
              class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
          </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-4       md:flex-row gap-9 mt-14 w-full">
          @foreach ($descuentos as $item)
            <x-product.container width="col-span-1 " bgcolor="bg-neutral-100" :item="$item" />
            {{-- <x-productos-card width="w-1/5" bgcolor="" :item="$item" /> --}}
          @endforeach
        </div>
      </section>
    @endif

    @if ($testimonie->count() > 0)
      <section class="bg-[#FBFBFB] w-full px-[5%] pt-10 lg:pt-10 overflow-visible h-[566px]">
        <div class=" px-[6%] xl:px-[10%]   text-center  w-full relative">
          <div class="flex flex-col w-full text-center max-md:max-w-full mt-16">
            <div class="text-4xl font-bold text-neutral-900 max-md:max-w-full">
              Clientes satisfechos
            </div>
            <div class="self-center mt-3 text-base text-neutral-600 w-[819px] max-md:max-w-full">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu
              fermentum justo, ac fermentum nulla. Sed sed scelerisque urna, vitae
              ultrices libero. Pellentesque vehicula et urna in venenatis.
            </div>
          </div>

          <div class="flex flex-row w-full gap-12 items-center mt-[75px]">
            <div class="prev-test flex gap-2.5 items-center self-stretch p-2 my-auto w-8 h-8 bg-[#9AFA26] rounded-lg ">
              <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/38dbc3ba3fafac21d9cd9793b6015a45a393c978dc223540590f965ac0b01667?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                class="object-contain w-4 aspect-square" />
            </div>
            <div class="swiper testimonios-slider flex items-center justify-center content-center h-max ">

              <div class="swiper-wrapper flex items-center ">
                @foreach ($testimonie as $item)
                  <div class="swiper-slide flex items-center justify-center content-center " data-aos="fade-up"
                    data-aos-offset="150">

                    <div class="flex items-center justify-center content-center w-full">
                      <div
                        class="flex flex-col self-stretch px-10 py-9 my-auto bg-white rounded-xl min-w-[240px] shadow-[0px_1px_3px_rgba(16,24,40,0.1)] w-[457px] max-md:px-5 ">
                        <div class="flex gap-3 items-start w-full text-neutral-900">
                          <img loading="lazy" src="{{ asset($item->img) }}"
                            class="object-contain shrink-0 w-14 aspect-square rounded-full" />
                          <div class="flex flex-col flex-1 shrink justify-start basis-0 min-w-[240px] text-start">
                            <div class="text-2xl font-bold">{{ $item->name }}</div>
                            <div class="text-xs">Lima - Perú</div>
                          </div>
                        </div>
                        <div class="mt-6 text-sm text-neutral-600">
                          {{ $item->testimonie }}
                        </div>
                      </div>

                    </div>


                  </div>
                @endforeach

                <!-- Puedes agregar más slides aquí -->
              </div>
              <!-- Agregar controles de navegación si es necesario -->

            </div>
            <div
              class="next-test flex gap-2.5 items-center self-stretch py-2 pr-2 pl-2 my-auto w-8 h-8 rounded-lg bg-[#9AFA26] ">
              <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/2d954cd5757b6a0e2575ce9ba5cb67ae9662122dc7e0e72c6babd8f86a1f377c?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                class="object-contain aspect-[1.06] w-[17px]" />
            </div>
          </div>

          {{-- <div class="px-[4%] mx-auto flex justify-center items-center py-32"> --}}


          {{-- </div> --}}
        </div>
      </section>
    @endif
    {{-- Seccion Blog --}}
    {{-- @if ($blogs->count() > 0)
      <section class="w-full px-[5%] py-7 lg:py-14 overflow-visible" data-aos="fade-up" style="overflow-x: visible">
        <div class="flex flex-col md:flex-row justify-between w-full gap-3">
          <h1 class="text-2xl md:text-3xl font-semibold font-mulish_Medium text-[#111111]">Blog & Eventos</h1>
          <a href="/blog/0" class="flex items-center text-base font-mulish_Medium font-semibold text-[#006BF6]">Ver
            todos
            las Publicaciones <img src="{{ asset('images/img/arrowBlue.png') }}" alt="Icono" class="ml-2 "></a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 mt-14 gap-10 sm:gap-5">
          @foreach ($blogs as $post)
            <x-blog.container-post :post="$post" />
          @endforeach
        </div>

      </section>
    @endif --}}


    {{-- gran descuento --}}
    {{--  @if (count($bannersBottom) > 0)
      <section class="w-full px-[5%] mt-7 lg:mt-10 " data-aos="zoom-out-right">
        <div class="bg-gradient-to-b from-gray-50 to-white flex flex-col md:flex-row justify-between bg-[#EEEEEE]">
          <x-banner-section :banner="$bannersBottom" />
        </div>
      </section>
    @endif --}}






  </main>
  {{-- modalOfertas --}}



  <!-- Modal toggle -->


  <!-- Main modal -->

  {{--  <div id="modalofertas" class="modal modalbanner">

    <!-- Modal body -->
    <div class="p-1 ">
      <x-swipper-card-ofertas :items="$popups" id="modalOfertas" />
    </div>


  </div> --}}


@section('scripts_importados')

  <script>
    let pops = @json($popups);

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
    $(document).ready(function() {
      console.log(pops.length)
      if (pops.length > 0) {
        $('#modalofertas').modal({
          show: true,
          fadeDuration: 100
        })

      }


      $(document).ready(function() {
        articulosCarrito = Local.get('carrito') || [];

        // PintarCarrito();
      });

    })
  </script>
  <script>
    new Swiper(".logos-slider", {
      slidesPerView: 1,
      spaceBetween: 10,
      loop: true,
      /* autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      }, */
      grabCursor: true,
      centeredSlides: false,
      initialSlide: 0,
      pagination: {
        el: ".swiper-pagination-slider-header",
        clickable: true,
      },
      breakpoints: {
        0: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 5,
        },
      },
    });
    new Swiper(".testimonios-slider", {
      slidesPerView: 2,
      spaceBetween: 10,
      centeredSlides: false,
      loop: true,

      pagination: {
        el: ".swiper-pagination-slider-header",
        clickable: true,
      },
      navigation: {
        nextEl: ".next-test",
        prevEl: ".prev-test",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
      },
    });

    new Swiper(".categorias-slider", {

      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      /* autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      }, */
      grabCursor: true,
      centeredSlides: false,
      initialSlide: 0,
      pagination: {
        el: ".swiper-pagination-slider-header",
        clickable: true,
      },
      navigation: {
        nextEl: ".next-cat",
        prevEl: ".prev-cat",
      },
      breakpoints: {
        0: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 4,
        },
      },
    });
  </script>


@stop

@stop
