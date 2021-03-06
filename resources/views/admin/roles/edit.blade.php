@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')

<h2>Editar Role</h2>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li> 
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/roles/{{$role->id}}">
    @csrf
    @method('PATCH')
    
    <div class="form-group">
        <label for="role_name">Role</label>
        <input type="text" name="role_name" class="form-control" id="role_name" placeholder="Role name..." value="{{$role->name}}" >
    </div>
    <div class="form-group">
        <label for="role_slug">Role Slug</label>
        <input type="text" name="role_slug" tag="role_slug" class="form-control" id="role_slug" placeholder="Role Slug..." value="{{$role->slug}}" >
    </div>
    <div class="form-group" >
        <label for="role_permissions">Agregar Permisos</label>
        <input type="text" data-role="tagsinput" name="role_permissions" class="form-control" id="role_permissions" value="@foreach ($role->permissions as $permission)
        {{$permission->name. ","}}
    @endforeach">   
    </div>     

    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Submit">
    </div>
</form>
@section('css')
    <link rel="stylesheet" href="/css/admin/bootstrap-tagsinput.css">
@endsection

@section('js')
    <script src="/js/admin/bootstrap-tagsinput.js"></script>
    <script>

        $(document).ready(function(){
            $('#role_name').keyup(function(e){
                var str = $('#role_name').val();
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//rplace stapces with dash
                $('#role_slug').val(str);
                $('#role_slug').attr('placeholder', str);
            });
        });
        
    </script>
@endsection

@stop