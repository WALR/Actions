## Instructions

1.- Crear la base de datos en postgresql ( CREATE DABASE nombreDB; )
2.- Verificar la el plugin pgsql este activo en php.ini ( php -m )
	2.1.- Instalar sudo apt-get install php-pgsql ( "En windows descomentar el plugin en php.ini" )
3.- Modificar config/database.php > 'default' => env('DB_CONNECTION', 'pgsql')
4.- Modificar archivo .env :
		DB_CONNECTION=pgsql
		DB_HOST=127.0.0.1
		DB_PORT=5432
		DB_DATABASE=nombreDB
		DB_USERNAME=nombreUSER
		DB_PASSWORD=123

5.- php artisan make:auth  (Genera scaffolding user and login)
6.- php artisan make:model colores -m ( Crea el model y la migracion "-m" ) 
		Tipos de Datos y relaciones ( https://laravel.com/docs/5.4/migrations )
7.- php artisan migrate (Realiza las migraciones en la DB)
8.- php artisan make:controller ColoresController --resource ( Crea el controller con el CRUD)
9.- Agregar en router/web.php > Route::resource('colores', 'ColoresController'); (Se agregan todas las rutas del CRUD)

10.- Para agregar la route en views es {{ route('colores.index') }} agregando la accion
11.- Crear en views el folder colores (Del modelo/controller/router) y agregar estas views:
			create.blade.php
			edit.blade.php
			index.blade.php
			show.blade.php

12.- Agregar disenio a las views creadas anteriormente
13.- Agregar acciones al Controller. 

			Solo usuarios logueado pueden acceder
			public function __construct()
	    {
	        $this->middleware('auth');
	    }


	13.1.- ColoresController:index 
			
			use App\colores;

			class ColoresController extends Controller
			{


				public function index()
		    {
		        $colores = colores::all();
		        return view('colores.index', compact('colores'));
		    }

	13.2.- ColoresController:create

			public function create()
	    {
	        return view('colores.create');
	    }
		

			Para crear un formulario hay que agregar este plugin (https://laravelcollective.com/docs/5.3/html):
			consola:
				composer require "laravelcollective/html":"^5.3.0"
			en config/app.php agregar:
				'providers' => [
	    		// ...
					Collective\Html\HtmlServiceProvider::class,
				]

				'aliases' => [
		    	// ...
		      'Form' => Collective\Html\FormFacade::class,
		      'Html' => Collective\Html\HtmlFacade::class,
		    ]


	13.3.- ColoresController:store

			public function store(Request $request)
	    {
	        $this->validate($request, [
	            'nombre' => 'required',
	            'color' => 'required',
	        ]);

	        Colores::create($request->all());
	        return redirect()->route('colores.index')
	                        ->with('success','Color creado!');
	    }

	13.4.- ColoresController:show 

			public function show($id)
	    {
	        $color = Colores::find($id);
	        return view('colores.show',compact('color'));
	    }

	13.5.- ColoresController:edit

			public function edit($id)
    {
        $color = Colores::find($id);
        return view('colores.edit',compact('color'));
    }

	13.5.- ColoresController:update

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'color' => 'required',
        ]);

        Colores::find($id)->update($request->all());
        return redirect()->route('colores.index')
                        ->with('success','Color Editado!');
    }

  13.6.- ColoresController:destroy
  
  	public function destroy($id)
    {
        Colores::find($id)->delete();
        return redirect()->route('colores.index')
                        ->with('success','Color Eliminado!');
    }


