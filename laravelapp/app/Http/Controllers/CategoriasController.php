<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorias;
use DB;
use Illuminate\Database\QueryException;
use PhpParser\Node\Stmt\TryCatch;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $categorias = Categorias::all();
        // return Categories::where('title','Post Two')->get()
        //$categorias = DB::select('SELECT * FROM catalogo_categorias');
        //$categorias = Categorias::orderBy('nombre_categoria', 'asc')->take(1)->get();

        // $categorias = Categorias::orderBy('nombre_categoria', 'asc')->get();
        //$categorias = Categorias::orderBy('nombre_categoria', 'asc')->paginate(9);
        //$categorias = Categorias::all();
        $categorias = DB::table('catalogo_categorias')
            ->select('*')
            ->where('estatus', '=', '1')
            ->paginate(9);
        return view('categories.index')->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // esta en un modal
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
            'categoria' => 'required',
        ]);

        $request->flash();

        $comparar =  DB::table('catalogo_categorias')
            ->select('nombre_categoria')
            ->where('nombre_categoria', '=', $request->input('categoria'))
            ->paginate(9);
        // ->get();

        $cat_existe = Categorias::where('nombre_categoria', '=', $request->input('categoria'));

        /*if(!$cat_existe){
            // create products
            $category = new Categorias();
            $category->nombre_categoria = strtoupper($request->input('categoria'));
            $category->save();
        }else{

        }*/

        if (count($comparar) == 0) {
            // create products
            $category = new Categorias();
            $category->nombre_categoria = strtoupper($request->input('categoria'));
            $category->save();

            return redirect('/categorias')->with('success', 'Categoría Agregado');
        } else {
            return redirect('/categorias')->with('error', 'No se pudo guardar la categoría debido a que ya existe en la base datos');
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
        // return Categorias::find($id);
        // return view('categories.show')->with('post', $categorias);

        $search = $request->input('buscar');
        $categorias =  DB::table('catalogo_categorias')
            ->select('id', 'nombre_categoria')
            ->where('nombre_categoria', 'like', '%' . strtoupper($search) . '%')
            ->paginate(9);
        //->get();

        return view('categories.show', ['busqueda' => $search, 'categorias' => $categorias]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // esto está en modal
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
            'categoria' => 'required',
        ]);

        $request->flash();

        $comparar =  DB::table('catalogo_categorias')
            ->select('nombre_categoria')
            ->where('nombre_categoria', '=', $request->input('categoria'))
            ->get();

        if (count($comparar) == 0) {
            // update categorys
            $category = Categorias::find($id);
            $category->nombre_categoria = strtoupper($request->input('categoria'));
            $category->save();

            return redirect('/categorias')->with('success', 'Categoria Actualizado');
        } else {
            return redirect('/categorias')->with('error', 'No se pudo almacenar el categoria debido a que ya existe en la base datos');
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
        $categoria = Categorias::find($id);

        try {
            $categoria->estatus = 0;
            $categoria->save();
            return redirect('/categorias')->with('success', 'Categoria Eliminada');
        } catch (QueryException $e) {
            return redirect('/categorias')->with('error', 'Esta categoría no se puede eliminar ya que hay productos registrados que están relacionados con esa categoría. Se le sugiere eliminar los productos relacionados para poder realzar esta acción.');
        }
    }
}
