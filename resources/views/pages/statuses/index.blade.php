<x-app-layout title="Estados">
  <style>
    @media (prefers-color-scheme: dark) {
      .dark\:even\:bg-gray-900\/50:nth-child(even) {
        background-color: transparent !important;
        border-top: 1px solid rgb(55 65 81 / 0.25);
        border-bottom: 1px solid rgb(55 65 81 / 0.25);
      }
    }
  </style>
  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <section class="py-4 border-b border-slate-100 dark:border-slate-700">
      <a href="{{ route('estados.create') }}"
        class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded text-sm">Crear estado</a>
    </section>
    <div
      class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
      <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
        <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">Estados</h2>
      </header>
      <div class="p-3">
        <!-- Table -->
        <div class="overflow-x-auto">
          <table id="tabladatos" class="display text-lg" style="width:100%">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th class="w-32">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($statuses as $status)
                <tr>
                  <td>{{ $status->name }}</td>
                  <td>{{ $status->description }}</td>
                  <td class="flex flex-row justify-end items-center gap-2">

                    <a href="{{ route('estados.edit', $status->id) }}"
                      class="bg-yellow-400 px-3 py-2 rounded text-white  "><i
                        class="fa-regular fa-pen-to-square"></i></a>
                    <form action=" " method="POST">
                      @csrf
                      <a id="btn-delete" data-idService='{{ $status->id }}'
                        class="bg-red-600 px-3 py-2 rounded text-white cursor-pointer"><i
                          class="fa-regular fa-trash-can"></i></a>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>

  </div>

  <script>
    $('document').ready(function() {
      new DataTable('#tabladatos', {
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        layout: {
          topStart: 'buttons'
        },
        language: {
          "lengthMenu": "Mostrar _MENU_ registros",
          "zeroRecords": "No se encontraron resultados",
          "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
          "infoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sSearch": "Buscar:",

          "sProcessing": "Procesando...",
        },
        buttons: [

          {
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel"></i> ',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success',
          },
          {
            extend: 'pdfHtml5',
            text: '<i class="fas fa-file-pdf"></i> ',
            titleAttr: 'Exportar a PDF',
          },
          {
            extend: 'csvHtml5',
            text: '<i class="fas fa-file-csv"></i> ',
            titleAttr: 'Imprimir',
            className: 'btn btn-info',
          },
          {
            extend: 'print',
            text: '<i class="fa fa-print"></i> ',
            titleAttr: 'Imprimir',
            className: 'btn btn-info',
          },
          {
            extend: 'copy',
            text: '<i class="fas fa-copy"></i> ',
            titleAttr: 'Copiar',
            className: 'btn btn-success',
          },
        ]
      });
      $(document).on('click', '#btn-delete', function(e) {
        var id = $(this).attr('data-idService');
        Swal.fire({
          title: "Seguro que deseas eliminar?",
          text: "Vas a eliminar un estado",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Si, borrar!",
          cancelButtonText: "Cancelar"
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: `/admin/estados/${id}`,
              method: 'DELETE',
              data: {
                _token: $('input[name="_token"]').val()
              }
            }).done(function(res) {
              Swal.fire({
                title: res.message,
                icon: "success"
              });
              location.reload();
            })
          }
        });
      });
    })
  </script>



</x-app-layout>
