<button id="{{ $id }}" data-dropdown-toggle="dropdown-{{ $id }}"
  class="flex items-center {{ $class }}" type="button">
  ETIQUETAS
  <svg class="w-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
  </svg>
</button>

<!-- Dropdown menu -->
<div id="dropdown-{{ $id }}"
  class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
  <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
    @foreach ($items as $item)
      <li>
        <a href="/catalogo?tag={{ $item->id }}"
          class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $item->name }}</a>
      </li>
    @endforeach


  </ul>
</div>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
