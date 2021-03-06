@extends('adminlte::page')

@section('title', 'Inicio')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content_header')
<div class="row py-lg-2">
    <div class="col-md-6">
        <h2>Lista de Roles</h2>
    </div>
    <div class="col-md-6">
        <a href="/roles/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear Nuevo Role</a>
    </div>
</div>

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Data Table Example</div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Id</th>
                <th>Role</th>
                <th>Slug</th>
                <th>Permissions</th>
                <th colspan="3"><center>Tools</center></th>
            </tr>
            </thead>
            
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role['id'] }}</td>
                        <td>{{ $role['name'] }}</td>
                        <td>{{ $role['slug'] }}</td>
                        <td>
                            @if ($role->permissions != null)
                                    
                                @foreach ($role->permissions as $permission)
                                <span class="badge badge-secondary">
                                    {{ $permission->name }}                                    
                                </span>
                                @endforeach
                            
                            @endif
                       </td>
                       <td >
                        <a href="roles/{{ $role['id'] }}"><i class="fa fa-eye"></i></a>
                        </td>
                          <td>
                            <a href="roles/{{ $role['id'] }}/edit"><i class="fa fa-edit"></i></a>
                          </td>
                        
                              
                          <td>
                            <form action="{{'roles/'.$role->id}}" method="post"> 
                            @csrf
                            {{ method_field('DELETE') }}
                            <button  type="submit" class="btn fas fa-trash-alt" onclick="return confirm('??BORRAR?')"></button>
                        </form>
                          </td>
                   
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>               
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>   
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
     $('#dataTable').DataTable();
    </script>
@endsection

