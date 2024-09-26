<div class="swiper header-slider-categorias" data-aos="fade-left">
  <div class="swiper-wrapper">
    @foreach ($items as $item)
      <div class="swiper-slide">
        <div class="bg-[#EEEEEE] w-full flex flex-col justify-between items-center gap-5 relative px-[5%] md:px-[4%]">
          <div class="z-20 h-40 flex flex-col items-center text-center gap-3">
            <h2 class="mt-10 text-sm lg:text-base font-normal text-[#333] font-Inter_Medium uppercase">
              {{ $item->name }} </h2>
            <h1 class="text-xl font-normal font-Inter_Medium text-[#333333]"> {{ $item->description }}</h1>
            <a href="catalogo/{{ $item->id }}"
              class="bg-[#006BF6] text-sm font-normal text-white text-center px-4 py-3 rounded-3xl font-Inter_Medium  items-center justify-center w-auto block"
              type="button">
              Comprar ahora
            </a>
          </div>

          <div class="h-72 relative z-10 -mt-10 flex flex-col items-end justify-end">
            <img class="block h-full object-contain object-bottom"
              src="{{ asset($item->url_image . $item->name_image) }}" alt="">
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

<script>
  new Swiper(".header-slider-categorias", {
    slidesPerView: 2,
    spaceBetween: 30,
    loop: true,
    autoplay: false,
    grab: true,
    centeredSlides: false,
    initialSlide: 0, // Empieza en el cuarto slide (índice 3)
    pagination: {
      el: ".swiper-pagination-slider-header",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
    },
  });
</script>
