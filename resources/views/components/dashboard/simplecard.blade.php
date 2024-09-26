<div
  class="flex flex-col col-span-full sm:col-span-6 xl:col-span-3 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700 p-5">
  <h2 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-2">{{ $title }}</h2>
  <div class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase mb-1">
    {{ $subTitle ?? '' }}
  </div>
  <div class="flex items-center">
    <div class="text-2xl font-bold text-slate-800 dark:text-slate-100 mr-2">
      {{ $amount ?? 0 }}
    </div>
    @isset($badge)
      <div class="text-sm font-semibold text-white px-1.5 bg-emerald-500 rounded-full">{{ $badge }}</div>
    @endisset
  </div>
</div>
