<x-app-layout>
  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <div
      class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
      <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
        <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">Pedidos</h2>
      </header>
      <div class="p-3">
        <!-- Table -->
        <div class="overflow-x-auto">
          <x-sales.table is-admin/>
        </div>
      </div>
    </div>
  </div>

  <x-sales.modal is-admin :statuses="$statuses"/>
</x-app-layout>
