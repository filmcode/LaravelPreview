@extends('adminlte::page')

@section('title', 'FORD')

@section('content_header')
    <h1>Listado de Carrros</h1>
@stop

@section('content')
 <div class="col-sm-12" style="overflow: auto">
    <table id="carros" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="text-white" style="background-color: #0D497F">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">AGENCIA</th>
                <th scope="col">No_INVENT</th>
                <th scope="col">DIAS_INVENT</th>
                <th scope="col">MARCA</th>
                <th scope="col">MODELO</th>
                <th scope="col">CLAVE_MOD</th>
                <th scope="col">COLOR_EXT</th>
                <th scope="col">COLOR_INT</th>
                <th scope="col">TRANSMISION</th>
                <th scope="col">UBICACION</th>
                <th scope="col">COSTO_UNI</th>
                <th scope="col">PRECIO_UNI</th>
                <th scope="col">DEMO</th>
                <th scope="col">No_SERIE</th>
                <th scope="col">NOM_AGENTE</th>
                <th scope="col">ESTATUS</th>
            </tr>
        </thead>
        <tbody class="p-2 text-dark bg-opacity-25">
            @foreach( $carros as  $carro)
            <tr>
                <td>{{$carro['ID']}}</td>
                <td>{{$carro['Agencia']}}</td>
                <td>{{$carro['NumerodeInventario1']}}</td>
                <td>{{$carro['DiasDeInventario']}}</td>
                <td>{{$carro['Marca']}}</td>
                <td>{{$carro['Modelo']}}</td>
                <td>{{$carro['ClaveModelo']}}</td>
                <td>{{$carro['ColorExterior']}}</td>
                <td>{{$carro['ColorInterior']}}</td>
                <td>{{$carro['Transmision']}}</td>
                <td>{{$carro['Ubicacion']}}</td>
                <td>{{$carro['CostoUnidad']}}</td>
                <td>{{$carro['PrecioUnidad']}}</td>
                <td>{{$carro['Demo']}}</td>
                <td>{{$carro['NumeroDeSerie']}}</td>
                <td>{{$carro['NombreAgente']}}</td>
                <td>{{$carro['Estatus']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
 </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#carros').DataTable({
                "lengthMenu": [[10, 50, -1], [10, 50, "All"]]
            });
        } );
    </script>
@stop