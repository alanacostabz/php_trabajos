<?php

namespace App\Http\Controllers;

use App\Marcas;
use Illuminate\Http\Request;
use DB;


class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$marcas = Marcas::orderBy('nombre_marca', 'asc')->get();
        $marcas = DB::table('catalogo_marcas')
            ->select('*')
            ->where('estatus', '=', '1')
            ->paginate(9);

        // $marcas = Marcas::orderBy('nombre_marca', 'asc')->paginate(9);
        return view('brands.index')->with('marcas', $marcas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // esta desde el modal
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'marca' => 'required',
        ]);

        $comparar =  DB::table('catalogo_marcas')
            ->select('nombre_marca')
            ->where('nombre_marca', '=', $request->input('marca'))
            ->paginate(9);
        //->get();

        if (count($comparar) == 0) {
            // create products
            $marca = new Marcas();
            $marca->nombre_marca = strtoupper($request->input('marca'));
            $marca->save();

            return redirect('/marcas')->with('success', 'Categoría Agregado');
        } else {
            return redirect('/marcas')->with('error', 'No se pudo guardar la marca debido a que ya existe en la base datos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $search = $request->input('buscar');
        $marcas =  DB::table('catalogo_marcas')
            ->select('id', 'nombre_marca')
            ->where('nombre_marca', 'like', '%' . strtoupper($search) . '%')
            ->paginate(9);
        //->get();

        return view('brands.show', ['busqueda' => $search, 'marcas' => $marcas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // modal
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
        $this->validate($request, [
            'marca' => 'required',
        ]);

        $comparar =  DB::table('catalogo_marcas')
            ->select('nombre_marca')
            ->where('nombre_marca', '=', $request->input('marca'))
            ->get();

        if (count($comparar) == 0) {
            // update marcas
            $marca = Marcas::find($id);
            $marca->nombre_marca = strtoupper($request->input('marca'));
            $marca->save();

            return redirect('/marcas')->with('success', 'Marca Actualizado');
        } else {
            return redirect('/marcas')->with('error', 'No se pudo almacenar la marca debido a que ya existe en la base datos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = Marcas::find($id);

        try {
            $marca->estatus = 0;
            $marca->save();
            return redirect('/marcas')->with('success', 'Marca Eliminada');
        } catch (QueryException $e) {
            return redirect('/marcas')->with('error', 'Esta marca no se puede eliminar ya que hay productos registrados que están relacionados con esa categoría. Se le sugiere eliminar los productos relacionados para poder realzar esta acción.');
        }
    }
}
