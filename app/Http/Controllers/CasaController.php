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

        // dd($request);

        casa::create($request->all());
        return redirect()->route('casa.index')
                        ->with('success','Casa creada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
