<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\casa;
use App\colores;

class CasaController extends Controller
{
    public function index()
    {
        $casas = casa::with('color')->get();
        return view('casas.index', compact('casas'));
    }

    public function create()
    {
        $colores = colores::pluck('nombre', 'id');
        return view('casas.create', compact('colores'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'color_id' => 'required',
        ]);


        casa::create($request->all());
        return redirect()->route('casa.index')
                        ->with('success','Casa creada!');
    }


    public function show($id)
    {
        $casa = casa::find($id);
        return view('casas.show',compact('casa'));
    }


    public function edit($id)
    {
        $casa = casa::find($id);
        $colores = colores::pluck('nombre', 'id');
        return view('casas.edit',compact('casa', 'colores'));
    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'nombre' => 'required',
            'color_id' => 'required',
        ]);

        casa::find($id)->update($request->all());
        return redirect()->route('casa.index')
                        ->with('success','Casa Editada!');
    }

    public function destroy($id)
    {
        casa::find($id)->delete();
        return redirect()->route('casa.index')
                        ->with('success','Casa Eliminada!');
    }
}
