@extends('components.public.matrix', ['pagina' => 'contacto'])

@section('css_importados')

@stop




@section('content')



  <main>

    <section class="mx-[5%] my-16">
      <div class="flex flex-wrap gap-10 justify-center items-start">
        <div class="flex flex-col flex-1 shrink basis-0 h-[988px] min-w-[240px] max-md:max-w-full">
          <form class="flex flex-col justify-center w-full max-md:max-w-full" id="formContactos">
            <div class="flex flex-col justify-center w-full max-md:max-w-full">
              <div class="text-5xl font-mulish_Bold text-zinc-950 max-md:max-w-full max-md:text-4xl">
                Hablemos Hoy
              </div>
              <div class="mt-2 text-base text-zinc-500 max-md:max-w-full">
                <p>
                  ¡Estamos aquí para ayudarte!
                </p>
                <p>
                  Si tienes alguna pregunta, duda o simplemente quieres saber más sobre lo que ofrecemos, no dudes en
                  ponerte en contacto con nosotros. ¡Tu consulta es
                  importante para nosotros!
                </p>

              </div>
            </div>
            <div class="flex flex-col justify-center mt-10 w-full text-sm text-zinc-500 max-md:max-w-full">
              <input
                class="gap-2.5 self-stretch px-5 py-4 w-full rounded-xl bg-neutral-100 max-md:max-w-full outline-none border-none"
                name="name" placeholder="Nombre completo">

              </input>
              <input type="email" id="email"
                class="gap-2.5 self-stretch px-5 py-4 mt-4 w-full rounded-xl bg-neutral-100 max-md:max-w-full outline-none border-none"
                name="email" placeholder="Correo electrónico">

              </input>
              <textarea name="message" placeholder="Mensaje"
                class="flex-1 shrink gap-2.5 self-stretch px-5 py-4 mt-4 w-full whitespace-nowrap rounded-xl bg-neutral-100 max-md:max-w-full outline-none border-none">
              </textarea>
            </div>
            <div class="flex flex-col mt-10 w-full text-sm font-mulish_Bold text-center text-zinc-950 max-md:max-w-full">
              <button class="px-16 py-4 w-full bg-lime-400 rounded-xl max-md:px-5 max-md:max-w-full" id="btnEnviar">
                Enviar Mensaje
              </button>
            </div>
          </form>
          <img loading="lazy"
            srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/172b380826f7e9fbce24f99b048e3288f957841c4f24b8b4cb59a1ac828b0dec?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/172b380826f7e9fbce24f99b048e3288f957841c4f24b8b4cb59a1ac828b0dec?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/172b380826f7e9fbce24f99b048e3288f957841c4f24b8b4cb59a1ac828b0dec?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/172b380826f7e9fbce24f99b048e3288f957841c4f24b8b4cb59a1ac828b0dec?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/172b380826f7e9fbce24f99b048e3288f957841c4f24b8b4cb59a1ac828b0dec?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/172b380826f7e9fbce24f99b048e3288f957841c4f24b8b4cb59a1ac828b0dec?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/172b380826f7e9fbce24f99b048e3288f957841c4f24b8b4cb59a1ac828b0dec?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/172b380826f7e9fbce24f99b048e3288f957841c4f24b8b4cb59a1ac828b0dec?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
            class="object-contain flex-1 mt-10 w-full rounded-none aspect-[2.05] max-md:max-w-full" />
        </div>
        <div class="flex flex-col min-w-[240px] w-[414px]">
          <div class="flex flex-col px-6 pt-6 pb-14 w-full rounded-xl bg-neutral-100 min-h-[308px] max-md:px-5">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/6f3a1bd5e9a23768beade21eac0023529f3f65b37716fb9474a4040ad6a87208?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
              class="object-contain w-12 aspect-square" />
            <div class="flex flex-col mt-6 w-full">
              <div class="flex flex-col w-full">
                <div class="text-3xl font-mulish_Bold leading-tight text-zinc-950">
                  Email
                </div>
                <div class="mt-4 text-base text-zinc-500">
                  Escríbenos para recibir atención personalizada y resolver tus dudas.
                </div>
              </div>
              <div
                class="gap-2.5 self-start px-3 py-2 mt-6 text-xs font-mulish_Bold text-lime-400 whitespace-nowrap rounded-xl bg-zinc-950">
                {{ $general->email }}
              </div>
            </div>
          </div>
          <div class="flex flex-col px-6 pt-6 pb-14 mt-8 w-full rounded-xl bg-neutral-100 min-h-[308px] max-md:px-5">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/04c6778499411318914add0c438e73dc19d2924bbe14e8d6da576a9a2539399a?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
              class="object-contain w-12 aspect-square" />
            <div class="flex flex-col mt-6 w-full">
              <div class="flex flex-col w-full">
                <div class="text-3xl font-mulish_Bold leading-tight text-zinc-950">
                  Teléfono
                </div>
                <div class="mt-4 text-base text-zinc-500">
                  Llámanos para obtener soporte inmediato y asistencia profesional.
                </div>
              </div>
              <div
                class="gap-2.5 self-start px-3 py-2 mt-6 text-xs font-mulish_Bold text-lime-400 rounded-xl bg-zinc-950">
                {{ $general->cellphone }}
              </div>
            </div>
          </div>
          <div class="flex flex-col p-6 mt-8 w-full rounded-xl bg-neutral-100 max-md:px-5">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/6931878251df8fba8ec622d7f67f55077f97cd6d21acd30bfe44b7439aac35c6?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
              class="object-contain w-12 aspect-square" />
            <div class="flex flex-col mt-6 w-full">
              <div class="flex flex-col w-full">
                <div class="text-3xl font-mulish_Bold leading-tight text-zinc-950">
                  Oficina
                </div>
                <div class="mt-4 text-base text-zinc-500">
                  Visítanos en nuestra oficina para conocer nuestras soluciones de
                  tratamiento de agua en persona.
                </div>
              </div>
              <div
                class="flex-1 shrink gap-2.5 self-stretch px-3 py-2 mt-6 w-full text-xs font-mulish_Bold text-lime-400 rounded-xl bg-zinc-950">
                {{ $general->address }} , {{ $general->inside }} , {{ $general->district }} - {{ $general->city }} -
                {{ $general->country }}

              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

    @if ($faqs->isEmpty())
      {{-- <div class="w-full flex flex-row justify-center items-center">
                <div class="p-5 text-xl font-mulish_Bold">No tienes faqs visibles</div>
            </div> --}}
    @else
      <section class="my-12 mx-[5%]">
        <div class=" font-mulish_Regular">
          <div class="relative  pt-10 pb-8 mt-8 ring-gray-900/5 sm:mx-auto sm:rounded-lg ">
            <div class="mx-auto px-5">
              <div class="flex flex-col items-center">
                <h2 class="font-mulish_Bold  text-[40px] text-[#151515] text-center leading-none md:leading-tight">
                  Preguntas Frecuentes
                </h2>
              </div>
              <div class=" mt-8 grid w-full ">

                @foreach ($faqs as $faq)
                  <div class="p-6 bg-[#F7F7F7] rounded-2xl mb-4">
                    <details class="group">
                      <summary class="flex cursor-pointer list-none items-center justify-between font-mulish_Medium">
                        <span class="font-mulish_Bold text-[20px] text-[#151515]">
                          {!! $faq->pregunta !!}</span>
                        <span class="transition group-open:rotate-180">
                          <svg width="18" height="20" viewBox="0 0 18 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                              d="M16.2923 11.3882L9.00065 18.3327M9.00065 18.3327L1.70898 11.3882M9.00065 18.3327L9.00065 1.66602"
                              stroke="#EB5D2C" stroke-width="3.33333" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                        </span>
                      </summary>
                      <p class="group-open:animate-fadeIn mt-3 text-neutral-600">
                        {!! $faq->respuesta !!}
                      </p>
                    </details>
                  </div>
                @endforeach


              </div>
            </div>
          </div>
        </div>
        </div>
      </section>
    @endif



  </main>


@section('scripts_importados')
  <script>
    function alerta(message) {
      Swal.fire({
        title: message,
        icon: "error",
      });
    }

    function validarEmail(value) {
      console.log(value)
      const regex =
        /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/

      if (!regex.test(value)) {
        alerta("El campo email no es válido");
        return false;
      }
      return true;
    }

    $('#formContactos').submit(function(event) {
      // Evita que se envíe el formulario automáticamente
      //console.log('evcnto')
      let btnEnviar = $('#btnEnviar');
      btnEnviar.prop('disabled', true);
      btnEnviar.text('Enviando...');
      btnEnviar.css('cursor', 'not-allowed');

      event.preventDefault();
      let formDataArray = $(this).serializeArray();

      if (!validarEmail($('#email').val())) {
        btnEnviar.prop('disabled', false);
        btnEnviar.text('Enviar Mensaje');
        btnEnviar.css('cursor', 'pointer');
        return;
      };


      /* console.log(formDataArray); */
      $.ajax({
        url: '{{ route('guardarContactos') }}',
        method: 'POST',
        data: $(this).serialize(),
        beforeSend: function() {
          Swal.fire({
            title: 'Enviando...',
            text: 'Por favor, espere',
            allowOutsideClick: false,
            onBeforeOpen: () => {
              Swal.showLoading();
            }
          });
        },
        success: function(response) {
          Swal.close(); // Close the loading message
          $('#formContactos')[0].reset();
          Swal.fire({
            title: response.message,
            icon: "success",
          });

          if (!window.location.href.includes('#formularioenviado')) {
            window.location.href = window.location.href.split('#')[0] + '#formularioenviado';
          }
          btnEnviar.prop('disabled', false);
          btnEnviar.text('Enviar Mensaje');
          btnEnviar.css('cursor', 'pointer');
        },
        error: function(error) {
          Swal.close(); // Close the loading message
          const obj = error.responseJSON.message;
          const keys = Object.keys(error.responseJSON.message);
          let flag = false;
          keys.forEach(key => {
            if (!flag) {
              const e = obj[key][0];
              Swal.fire({
                title: error.message,
                text: e,
                icon: "error",
              });
              flag = true; // Marcar como mostrado
            }
          });
          btnEnviar.prop('disabled', false);
          btnEnviar.text('Enviar Mensaje');
          btnEnviar.css('cursor', 'pointer');
        }
      });
    })
  </script>

  <script>
    $(document).ready(function() {


      function capitalizeFirstLetter(string) {
        string = string.toLowerCase()
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
    })
    $('#disminuir').on('click', function() {
      console.log('disminuyendo')
      let cantidad = Number($('#cantidadSpan span').text())
      if (cantidad > 0) {
        cantidad--
        $('#cantidadSpan span').text(cantidad)
      }


    })
    // cantidadSpan
    $('#aumentar').on('click', function() {
      console.log('aumentando')
      let cantidad = Number($('#cantidadSpan span').text())
      cantidad++
      $('#cantidadSpan span').text(cantidad)

    })
  </script>
  <script>
    let articulosCarrito = [];


    function deleteOnCarBtn(id, operacion) {
      console.log('Elimino un elemento del carrito');
      console.log(id, operacion)
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


    }

    function calcularTotal() {
      let articulos = Local.get('carrito')
      console.log(articulos)
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

      $('#itemsTotal').text(`S/. ${suma} `)

    }

    function addOnCarBtn(id, operacion) {
      console.log('agrego un elemento del cvarrio');
      console.log(id, operacion)

      const prodRepetido = articulosCarrito.map(item => {
        if (item.id === id) {
          item.cantidad += Number(1);
          return item; // retorna el objeto actualizado 
        } else {
          return item; // retorna los objetos que no son duplicados 
        }

      });
      console.log(articulosCarrito)
      Local.set('carrito', articulosCarrito)
      // localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
      limpiarHTML()
      PintarCarrito()


    }

    function deleteItem(id) {
      console.log('borrando elemento')
      articulosCarrito = articulosCarrito.filter(objeto => objeto.id !== id);

      Local.set('carrito', articulosCarrito)
      limpiarHTML()
      PintarCarrito()
    }

    var appUrl = <?php echo json_encode($url_env); ?>;
    console.log(appUrl);
    $(document).ready(function() {
      articulosCarrito = Local.get('carrito') || [];

      PintarCarrito();
    });

    function limpiarHTML() {
      //forma lenta 
      /* contenedorCarrito.innerHTML=''; */
      $('#itemsCarrito').html('')


    }



    // function PintarCarrito() {
    //   console.log('pintando carrito ')

    //   let itemsCarrito = $('#itemsCarrito')

    //   articulosCarrito.forEach(element => {
    //     let plantilla = `<div class="flex justify-between bg-white font-Inter_Regular border-b-[1px] border-[#E8ECEF] pb-5">
  //         <div class="flex justify-center items-center gap-5">
  //           <div class="bg-[#F3F5F7] rounded-md p-4">
  //             <img src="${appUrl}/${element.imagen}" alt="producto" class="w-24" />
  //           </div>
  //           <div class="flex flex-col gap-3 py-2">
  //             <h3 class="font-mulish_SemiBold text-[14px] text-[#151515]">
  //               ${element.producto}
  //             </h3>
  //             <p class="font-normal text-[12px] text-[#6C7275]">

  //             </p>
  //             <div class="flex w-20 justify-center text-[#151515] border-[1px] border-[#6C7275] rounded-md">
  //               <button type="button" onClick="(deleteOnCarBtn(${element.id}, '-'))" class="  w-8 h-8 flex justify-center items-center ">
  //                 <span  class="text-[20px]">-</span>
  //               </button>
  //               <div class="w-8 h-8 flex justify-center items-center">
  //                 <span  class="font-mulish_SemiBold text-[12px]">${element.cantidad }</span>
  //               </div>
  //               <button type="button" onClick="(addOnCarBtn(${element.id}, '+'))" class="  w-8 h-8 flex justify-center items-center ">
  //                 <span class="text-[20px]">+</span>
  //               </button>
  //             </div>
  //           </div>
  //         </div>
  //         <div class="flex flex-col justify-start py-2 gap-5 items-center pr-2">
  //           <p class="font-mulish_SemiBold text-[14px] text-[#151515]">
  //             S/ ${Number(element.descuento) !== 0 ? element.descuento : element.precio}
  //           </p>
  //           <div class="flex items-center">
  //             <button type="button" onClick="(deleteItem(${element.id}))" class="  w-8 h-8 flex justify-center items-center ">
  //             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  //               <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
  //             </svg>
  //             </button>

  //           </div>
  //         </div>
  //       </div>`

    //     itemsCarrito.append(plantilla)

    //   });

    //   calcularTotal()
    // }






    $('#btnAgregarCarrito').on('click', function() {
      let url = window.location.href;
      let partesURl = url.split('/')
      let item = partesURl[partesURl.length - 1]
      let cantidad = Number($('#cantidadSpan span').text())
      item = item.replace('#', '')



      // id='nodescuento'


      $.ajax({

        url: `{{ route('carrito.buscarProducto') }}`,
        method: 'POST',
        data: {
          _token: $('input[name="_token"]').val(),
          id: item,
          cantidad

        },
        success: function(success) {
          console.log(success)
          let {
            producto,
            id,
            descuento,
            precio,
            imagen,
            color
          } = success.data
          let cantidad = Number(success.cantidad)
          let detalleProducto = {
            id,
            producto,
            descuento,
            precio,
            imagen,
            cantidad,
            color

          }
          let existeArticulo = articulosCarrito.some(item => item.id === detalleProducto.id)
          if (existeArticulo) {
            //sumar al articulo actual 
            const prodRepetido = articulosCarrito.map(item => {
              if (item.id === detalleProducto.id) {
                item.cantidad += Number(detalleProducto.cantidad);
                return item; // retorna el objeto actualizado 
              } else {
                return item; // retorna los objetos que no son duplicados 
              }

            });
          } else {
            articulosCarrito = [...articulosCarrito, detalleProducto]

          }

          Local.set('carrito', articulosCarrito)
          let itemsCarrito = $('#itemsCarrito')
          let ItemssubTotal = $('#ItemssubTotal')
          let itemsTotal = $('#itemsTotal')
          limpiarHTML()
          PintarCarrito()

        },
        error: function(error) {
          console.log(error)
        }

      })



      // articulosCarrito = {...articulosCarrito , detalleProducto }
    })
    // $('#openCarrito').on('click', function() {
    //   console.log('abriendo carrito ');
    //   $('.main').addClass('blur')
    // })
    // $('#closeCarrito').on('click', function() {
    //   console.log('cerrando  carrito ');

    //   $('.cartContainer').addClass('hidden')
    //   $('#check').prop('checked', false);
    //   $('.main').removeClass('blur')


    // })
  </script>

  <script src="{{ asset('js/storage.extend.js') }}"></script>
@stop

@stop
