@extends('layouts.app')

@section('nav-color', 'active')

@section('content')
<div class="container">
	<div class="row">

		<div class="panel panel-default">
			<div class="panel-body">
		        <div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong>Nombre:</strong>
		                <p style="padding-left: 0.5em;">{{ $color->nombre }}</p>
		            </div>
		        </div>
		        <div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong>Color:</strong>
		                <p style="padding-left: 0.5em;color:{{ $color->color }}">{{ $color->color }}</p>
		            </div>
		        </div>
				<div class="col-xs-12 col-md-4">
		        	<a class="btn btn-block btn-default" href="{{ route('colores.index') }}">atras</a>
				</div>
				<div class="col-xs-12 col-md-4">
	            	<a class="btn btn-block btn-primary" href="{{ route('colores.edit',$color->id) }}">Editar</a>
					
				</div>
				<div class="col-xs-12 col-md-4">
		            {!! Form::open(['method' => 'DELETE','route' => ['colores.destroy', $color->id],'style'=>'display:inline']) !!}
		            {!! Form::submit('Eliminar', ['class' => 'btn btn-block btn-danger']) !!}
		            {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection