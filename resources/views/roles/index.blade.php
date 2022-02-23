@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            @can('crear-rol')
                            <a class="btn bg-primary" href="{{ route('roles.create') }}">Nuevo</a> 
                            @endcan

                            <table class="table table-striped mt-2">
                                <thead style="background-color:#0D497F">                                                       
                                    <th style="color:#fff;">Rol</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>  
                                <tbody>
                                @foreach ($roles as $role)
                                <tr>                           
                                    <td>{{ $role->name }}</td>
                                    <td>                                
                                        @can('editar-rol')
                                            <a class="btn btn-info" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                                        @endcan
                                        
                                        @can('borrar-rol')
                                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>               
                            </table>

                            <!-- Centramos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $roles->links() !!} 
                            </div>    

                        </div>
                    </div>
                </div>
            </div>
        </div>

@stop

