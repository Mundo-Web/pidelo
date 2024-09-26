<div class="{{ $width }} {{ $bgcolor }} flex flex-col justify-center items-center text-center">
  <img src="{{ asset($item->imagen) }}" alt="" class="w-full  object-cover">
  <h2 class="text-[17px] mt-4  ">
    {{ $item->producto }}
  </h2>
  <div class="flex content-between flex-row gap-4 items-center justify-center">
    <span class="text-[#006BF6] text-[16.45px] font-bold">{{ $item->precio }}</span>
    <span class="text-sm text-[#15294C] opacity-60 line-through">{{ $item->descuento }}</span>
  </div>

</div>
