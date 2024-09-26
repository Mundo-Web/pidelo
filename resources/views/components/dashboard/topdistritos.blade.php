<div
  class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
  <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
    <h2 class="font-semibold text-slate-800 dark:text-slate-100">Top distritos que mas compran</h2>
  </header>
  <div class="p-3">
    <div class="overflow-x-auto max-h-[320px] overflow-y-auto">
      <table class="table-auto w-full dark:text-slate-500">
        <thead
          class="text-xs uppercase text-slate-400 dark:text-slate-500 bg-slate-50 dark:bg-slate-700 dark:bg-opacity-50 rounded-sm">
          <tr>
            <th class="p-2">
              <div class="font-semibold text-left">Distrito</div>
            </th>
            <th class="p-2">
              <div class="font-semibold text-center">Ventas</div>
            </th>
            </th>
          </tr>
        </thead>
        <tbody id="topProducts" class="text-sm font-medium divide-y divide-slate-100 dark:divide-slate-700">
          @foreach ($data as $item)
            <tr>
              <td class="p-2">
                  <div class="text-slate-800 dark:text-slate-100">{{ $item->district }}</div>
                  <div class="text-xs">
                    {{$item->department}} - {{$item->province}}
                  </div>
              </td>
              <td class="p-2">
                <div class="text-center">{{ $item->quantity }}</div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>
