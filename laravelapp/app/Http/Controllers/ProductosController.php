<?php

namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $productos =  DB::table('productos')
            ->join('catalogo_categorias', 'catalogo_categorias.id', '=', 'productos.categoria')
            ->join('catalogo_marcas', 'catalogo_marcas.id', '=', 'productos.marca')
            ->select('productos.id as id', 'productos.nombre_producto as producto', 'catalogo_marcas.nombre_marca as marca', 'catalogo_categorias.nombre_categoria as categoria', 'productos.precio as precio', 'productos.estatus as estatus')
            ->where('productos.estatus', '=', '1')
            ->orderBy('productos.id', 'desc')
            ->paginate(9);
        //->get();
        //$productos = Productos::orderBy('nombre_producto', 'asc')->paginate(10);
        return view('products.index')->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto =  DB::table('productos')
            ->join('catalogo_categorias', 'catalogo_categorias.id', '=', 'productos.categoria')
            ->join('catalogo_marcas', 'catalogo_marcas.id', '=', 'productos.marca')
            ->select('productos.id as id', 'productos.nombre_producto as producto', 'catalogo_marcas.id as id_marca', 'catalogo_marcas.nombre_marca as marca', 'catalogo_categorias.id as id_categoria', 'catalogo_categorias.nombre_categoria as categoria', 'productos.precio as precio')
            ->get();

        $categoria =  DB::table('catalogo_categorias')
            ->select('id', 'nombre_categoria')
            ->orderBy('nombre_categoria')
            ->get();

        $marca = DB::table('catalogo_marcas')
            ->select('id', 'nombre_marca')
            ->orderBy('nombre_marca')
            ->get();



        return view('products.create', ['producto' => $producto, 'categoria' => $categoria, 'marca' => $marca]);
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
            'nombre' => 'required',
            'marca' => 'required',
            'categoria' => 'required',
            'precio' => 'required'
        ]);


        $request->flash();

        $comparar =  DB::table('productos')
            ->select('productos.nombre_producto as producto')
            ->where('productos.nombre_producto', '=', $request->input('nombre'))
            ->get();

        if (count($comparar) == 0) {
            // create products
            $product = new Productos();
            $product->nombre_producto = strtoupper($request->input('nombre'));
            $product->marca = $request->input('marca');
            $product->categoria = $request->input('categoria');
            $product->precio = $request->input('precio');
            $product->save();

            return redirect('/productos')->with('success', 'Producto Agregado');
        } else {
            return redirect('/productos/create')->with('error', 'No se pudo guardar el producto debido a que ya existe en la base datos');
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
        // $productos = Productos::find($id);
        // return view('productos.show')->with('producto', $producto);
        $productos =  DB::table('productos')
            ->join('catalogo_categorias', 'catalogo_categorias.id', '=', 'productos.categoria')
            ->join('catalogo_marcas', 'catalogo_marcas.id', '=', 'productos.marca')
            ->select('productos.id as id', 'productos.nombre_producto as producto', 'catalogo_marcas.id as id_marca', 'catalogo_marcas.nombre_marca as marca', 'catalogo_categorias.id as id_categoria', 'catalogo_categorias.nombre_categoria as categoria', 'productos.precio as precio')
            ->where('productos.nombre_producto', 'like', '%' . strtoupper($search) . '%')
            ->paginate(9);
        // ->get();

        return view('products.show', ['busqueda' => $search, 'productos' => $productos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto =  DB::table('productos')
            ->join('catalogo_categorias', 'catalogo_categorias.id', '=', 'productos.categoria')
            ->join('catalogo_marcas', 'catalogo_marcas.id', '=', 'productos.marca')
            ->select('productos.id as id', 'productos.nombre_producto as producto', 'catalogo_marcas.id as id_marca', 'catalogo_marcas.nombre_marca as marca', 'catalogo_categorias.id as id_categoria', 'catalogo_categorias.nombre_categoria as categoria', 'productos.precio as precio')
            ->where('productos.id', '=', $id)
            ->get();

        $categoria =  DB::table('catalogo_categorias')
            ->select('id', 'nombre_categoria')
            ->orderByRaw("FIELD(nombre_categoria, '" . $producto[0]->categoria . "') desc")
            ->get();

        $marca = DB::table('catalogo_marcas')
            ->select('id', 'nombre_marca')
            ->orderByRaw("FIELD(nombre_marca, '" . $producto[0]->marca . "') desc")
            ->get();


        return view('products.edit', ['producto' => $producto, 'categoria' => $categoria, 'marca' => $marca]);
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
            'nombre' => 'required',
            'marca' => 'required',
            'categoria' => 'required',
            'precio' => 'required'
        ]);

        $request->flash();

        $comparar =  DB::table('productos')
            ->select('nombre_producto')
            ->where('nombre_producto', '=', $request->input('nombre'))
            ->where('categoria', '=', $request->input('categoria'))
            ->where('marca', '=', $request->input('marca'))
            ->get();


        if (count($comparar) == 0) {
            // update products
            $product = Productos::find($id);
            $product->nombre_producto = strtoupper($request->input('nombre'));
            $product->marca = $request->input('marca');
            $product->categoria = $request->input('categoria');
            $product->precio = $request->input('precio');
            $product->save();

            return redirect('/productos')->with('success', 'Producto Actualizado');
        } else {
            return redirect('/productos/' . $id . '/edit')->with('error', 'No se pudo almacenar el producto debido a que ya existe en la base datos');
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
        $producto = Productos::find($id);
        $producto->estatus = 0;
        $producto->save();
        return redirect('/productos')->with('success', 'Producto Eliminado');
    }
}
