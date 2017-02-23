@extends('layouts.app')

@section('nav-casa', 'active')

@section('content')
<div class="container">
	<div class="row">
		<div class="row">
	        <div class="col-lg-12 margin-tb">
	            <div class="pull-left">
	                <h2 style="margin-top: 0;">Lista de Casas</h2>
	            </div>
	            <a class="btn btn-success pull-right" href="{{ route('casa.create') }}"> Nueva Casa</a>
	        </div>
    	</div>
		<div class="panel panel-default">
            <div class="panel-body">
                @if ($message = Session::get('success'))
			        <div class="alert alert-success">
			            <p>{{ $message }}</p>
			        </div>
			    @endif

			    <table class="table table-bordered">
			        <tr>
			            <th>ID</th>
			            <th>Nombre</th>
			            <th>Color</th>
			            <th width="280px">Opciones</th>
			        </tr>
				    @foreach ($casas as $key => $casa)
				    <tr>
				        <td>{{ $casa->id }}</td>
				        <td>{{ $casa->nombre }}</td>
				        <td>{{ $casa->color->nombre }}</td>
				        <td>
				            <a class="btn btn-info" href="{{ route('casa.show',$casa->id) }}">Ver</a>
				            <a class="btn btn-primary" href="{{ route('casa.edit',$casa->id) }}">Editar</a>
				            {!! Form::open(['method' => 'DELETE','route' => ['casa.destroy', $casa->id],'style'=>'display:inline']) !!}
				            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
				            {!! Form::close() !!}
				        </td>
				    </tr>
				    @endforeach
			    </table>
            </div>
		</div>
	</div>
</div>
@endsection