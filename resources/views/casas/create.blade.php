@extends('layouts.app')

@section('nav-casa', 'active')

@section('content')
<div class="container">
	<div class="row">
		<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Crear Casa</h2>
            </div>
        </div>
    	</div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Ohhh!</strong> tenemos un error en los siguientes datos.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
		<div class="panel panel-default">
		<div class="panel-body">
		    {!! Form::open(array('route' => 'casa.store','method'=>'POST')) !!}
				{{ csrf_field() }}
		        <div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong>Nombre:</strong>
		                {!! Form::text('nombre', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
		            </div>
		        </div>

		        <div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong>Color:</strong>
		                {!! Form::select('color_id', $colores, 0, array('class' => 'form-control')) !!}

		            </div>
		        </div>

				<div class="col-xs-6">
					<a class="btn btn-block btn-default" href="{{ route('casa.index') }}"> Atras</a>
				</div>
				<div class="col-xs-6">			
		            <button type="submit" class="btn btn-block btn-primary">Guardar</button>
				</div>

		    {!! Form::close() !!}
		</div>
		</div>
	</div>
</div>
@endsection