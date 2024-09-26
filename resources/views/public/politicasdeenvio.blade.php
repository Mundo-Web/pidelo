@extends('components.public.matrix', ['pagina'=>' '])

@section('css_importados')

@stop


@section('content')

<main>
   
    <section class="w-10/12 mx-auto space-y-6">
        <h2 class="font-semibold font-poppins text-slate-800 text-center text-3xl tracking-tight pt-8">Políticas de Cambio</h2>
        <div class="font-poppins text-[#151515] flex flex-col gap-16">
           
            <div class="grid grid-cols-1 ">

                {!! $politicDev->content !!}
                
            </div>
        </div>
    </section>
    
</main>


@section('scripts_importados')


@stop

@stop