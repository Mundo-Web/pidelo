<div class="flex flex-col flex-1 shrink basis-0 min-w-[240px]">
  <div class="flex flex-col w-full rounded-none">
    <div class="flex flex-col justify-center px-12 py-16 rounded-xl bg-neutral-100 max-md:px-5">
      <img loading="lazy" src="{{ asset($item->imagen) }}" class="object-contain aspect-square w-[200px]" />
    </div>
  </div>
  <div class="flex flex-col mt-6 w-full">
    <div class="flex flex-col w-full">
      <div class="text-base font-medium text-zinc-950">Smartphone</div>
      <a href="/producto/{{ $item->id }}" class="flex flex-col mt-2 w-full">
        <div class="w-full text-2xl font-bold text-black tippy line-clamp-2 h-[64px]" title="{{ $item->producto }}">
          {{ $item->producto }}
        </div>
        <div class="mt-4 text-sm text-zinc-950 text-opacity-60 line-clamp-2 ">
          {{ $item->extract }}
        </div>
        <div class="flex gap-8 items-center mt-4 w-full">
          <div class="flex gap-3 items-start self-stretch my-auto">
            <div class="flex shrink-0 w-5 h-5 rounded-full bg-slate-600"></div>
            <div class="flex shrink-0 w-5 h-5 rounded-full bg-zinc-950"></div>
          </div>
        </div>
      </a>
    </div>
    <div class="mt-8 text-2xl font-bold text-zinc-950">S/. {{ $item->precio }}</div>
  </div>
</div>
<script>
  $(document).ready(function() {
    tippy('.tippy', {
      arrow: true,
      followCursor: true,
      placement: 'right',

    })
  })
</script>
