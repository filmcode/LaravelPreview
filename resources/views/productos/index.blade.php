@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Busqueda de carros</h1>
@stop

@section('content')

<x-app-layout>

            @can('crear-producto')
            <a type="button" href="{{ route('productos.create') }}" class="btn bg-primary mb-4">Crear</a>
            @endcan
            <div class="col-sm-12" style="overflow: auto">
            <table id="articulos" class="table table-striped table-bordered nowrap shadow-lg mt-4" style="width: 100%">
                <thead class="text-white" style="background-color: #0D497F">
                    <tr>
                    <th scope="col">ID</th>
                        <th scope="col">Línea</th>
                        <th scope="col">Catálogo</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Serie</th>
                        <th scope="col">Color</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">Días_piso</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Apartado</th>
                        <th scope="col">Autorizado</th>
                        <th scope="col">Observaciónes</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                    </tr>  
                </thead>    
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->linea}}</td>
                        <td>{{$product->catalogo}}</td>
                        <td>{{$product->modelo}}</td>
                        <td>{{$product->serie}}</td>
                        <td>{{$product->color}}</td>
                        <td>{{$product->ubicacion}}</td>
                        <td>{{$product->diasPiso}}</td>
                        <td>{{$product->costo}}</td>
                        <td>{{$product->apartado}}</td>
                        <td>{{$product->autorizado}}</td>
                        <td>{{$product->observaciones}}</td>
                        <td>{{$product->estatus}}</td>    
                        <td  class="border px-14 py-1">
                            @php
                                $images = array();
                            @endphp
                            @foreach($productsImages as $image)
                                @if($product->id == $image->product_id)
                                @php
                                $images[] = '/img/' . $image->name;
                                @endphp
                                @endif
                            @endforeach
                            <img src="{{$images[0]}}" data-images="{{implode(',',$images)}}" style="cursor: pointer;height:80px;width:80px;border-radius: 5px;">
                        </td>                        
                        <td class="border px-4 py-2">
                            <div class="flex justify-center rounded-lg text-lg" role="group">
                                <!-- botón editar -->
                                @can('editar-producto')
                                <a href="{{ route('productos.edit', $product->id) }}" class="rounded btn btn-info text-white font-bold py-2 px-4">Editar</a>
                                @endcan
                                <!-- botón borrar -->
                                <form action="{{ route('productos.destroy', $product->id) }}" method="POST" class="formEliminar">
                                    @csrf
                                    @method('DELETE')
                                    @can('borrar-producto')
                                    <button type="submit" class="rounded btn btn-danger text-white font-bold py-2 px-4">Borrar</button>
                                    @endcan
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach   
                </tbody>  
                     
            </table>   
            </div>
                <div>
                {!! $products->links() !!}
                </div>
                <div class="modal modal--close" id="modal">
                    <div class="modal__btn" id="modalBtn">×</div>
                     <div class="slider">
                         <div class="slider__content" id="sliderContent"></div>
                        <div class="slider__btn slider__btn--left" id="sliderButtonLeft">&#60;</div>
                        <div class="slider__btn slider__btn--right" id="sliderButtonRight">&#62;</div>
                     </div>
                </div>
</x-app-layout>

@stop

@section('css')
    <link rel="stylesheet" href="/css/modal.css">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="/js/previewProductsImages.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#articulos').DataTable();
        } );
    </script>
    
    <script>
    (function () {
  'use strict'
  //debemos crear la clase formEliminar dentro del form del boton borrar
  //recordar que cada registro a eliminar esta contenido en un form  
  var forms = document.querySelectorAll('.formEliminar')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {        
          event.preventDefault()
          event.stopPropagation()        
          Swal.fire({
                title: '¿Confirma la eliminación del registro?',        
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#20c997',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                    Swal.fire('¡Eliminado!', 'El registro ha sido eliminado exitosamente.','success');
                }
            })                      
      }, false)
    })
})()
</script>
@stop
