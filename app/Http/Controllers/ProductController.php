<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Archivo;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();

        return view('product.product-index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product.product-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' =>'required|max:255|min:2',
            'prize' =>'required|numeric|min:0',
            'info' =>'required|max:255|min:3',
            'category' =>'required|not_in:0|in:videojuego,series/peliculas,manga',
            'stock' =>'required|numeric|min:0',
        ]);

        $request->merge(['img', null]);
        Product::create($request->all());

        return redirect('/product')->with('success','Producto creado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('product.product-show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('product.product-edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'name' =>'required|max:255|min:2',
            'prize' =>'required|numeric|min:0',
            'info' =>'required|max:255|min:3',
            'category' =>'required|not_in:0|in:videojuego,series/peliculas,manga',
            'stock' =>'required|numeric|min:0',
        ]);

        $product->name = $request->name;
        $product->prize = $request->prize;
        $product->info = $request->info;
        $product->category = $request->category;
        $product->stock = $request->stock;
        $product->save();

        return redirect('/product')->with('success','Datos del producto editados correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->destroy($product->id);
        return redirect('/product')->with('success', 'Producto eliminado correctamente!');
    }

    public function guardarArchivo(Request $request, $product_id){

        if($request->file('archivo')->isValid()){
            $ubicacion = $request->archivo->store('public');

            $archivo = new Archivo();
            $archivo->product_id = $product_id;
            $archivo->ubicacion = $ubicacion;
            $archivo->nombre_original = $request->archivo->getClientOriginalName();
            $archivo->mime = $request->archivo->getClientMimeType();
            $archivo->save();

            $product = Product::find($product_id);
            $product->img = $ubicacion;
            $product->save();

            return redirect('product')->with('success','Imagen guardada correctamente!');
        }
    }

    public function editarArchivo(Request $request, $product_id){
        
        $product = Product::find($product_id);

        if($request->file('nuevoArchivo')->isValid()){
            
            Storage::delete($product->img);
            Archivo::where('product_id', $product_id)->delete();
            
            $ubicacion = $request->nuevoArchivo->store('public');

            $archivo = new Archivo();
            $archivo->product_id = $product_id;
            $archivo->ubicacion = $ubicacion;
            $archivo->nombre_original = $request->nuevoArchivo->getClientOriginalName();
            $archivo->mime = $request->nuevoArchivo->getClientMimeType();
            $archivo->save();

            $product->img = $ubicacion;
            $product->save();
            
            return redirect('product')->with('success','Imagen editada correctamente!');
        }
    }

    public function eliminarArchivo(Request $request, $product_id){
        
        $product = Product::find($product_id);

        Storage::delete($product->img);
        Archivo::where('product_id', $product_id)->delete();

        $product->img = null;
        $product->save();

        return redirect('product')->with('success','Imagen eliminada correctamente!');
    }
    

}
