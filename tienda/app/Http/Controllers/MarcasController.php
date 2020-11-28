<?php

namespace tienda\Http\Controllers;

use Illuminate\Http\Request;
use tienda\Marcas;
use Illuminate\Suport\Facades\Redirect;
use tienda\Http\Requests\CategoriaFormRequest;
use DB;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class MarcasController extends Controller
{
    public function __construct()
    { }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get(`searchText`));
            $marcas = DB::table('CATALOGO_MARCAS')
                ->where('NOMBRE_MARCA', 'LIKE', '%' . $query . '%')
                ->orderBy('ID', 'desc')
                ->paginate(7);
            return view('otros.marcas.index', ['marcas' => $marcas, "searchText" => $query]);
        }
    }

    public function create()
    {
        return view('otros.marcas.create');
    }

    public function store(MarcasFormRequest $request)
    {
        $marca = new Marcas();
        $marca->NOMBRE_MARCA = $request->get('marca');
        $marca->save();
        return Redirect::to('otros/marcas');
    }

    public function show($id)
    {
        return view('otros.marcas.show', ['marcas' => Marcas::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('otros.marcas.edit', ['marcas' => Marcas::findOrFail($id)]);
    }

    public function update(MarcasFormRequest $request, $id)
    {
        $marca = Marcas::findOrFail($id);
        $marca->NOMBRE_MARCA = $request->get('marca');
        $marca->save();
        return Redirect::to('otros/marcas');
    }

    public function destroy($id)
    {
        $marca = Marcas::find($id);
        $marca->delete();
        return redirect('/otros/marcas')->with('success', 'Marca eliminada');
    }
}
