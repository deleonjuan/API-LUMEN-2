<?php

namespace App\Http\Controllers;
use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $producto = Producto::all();
        return response()->json($producto, 200);
    }

    public function find($id)
    {
        $producto = Producto::find($id);
        if($producto){
            return response()->json($producto, 200);
        }
        return response()->json(["data not found"], 404);
    }

    public function create(Request $req)
    {
        $producto = new Producto;
        $producto->codigo = $req->codigo;
        $producto->nombre = $req->nombre;
        $producto->descripcion = $req->descripcion;
        $producto->precio = $req->precio;
        $producto->id_tienda = $req->id_tienda;
        $producto->save();
        return response()->json(["saved succesfully"], 200);
    }

    public function update(Request $req, $id)
    {
        $producto = Producto::find($id);
        if($producto){
            $producto->codigo = $req->codigo;
            $producto->nombre = $req->nombre;
            $producto->descripcion = $req->descripcion;
            $producto->precio = $req->precio;
            $producto->id_tienda = $req->id_tienda;
            $producto->save();
            return response()->json(["updated succesfully"], 200);
        }
        return response()->json(["data not found"], 404);
    }

    public function delete($id)
    {
        $producto = Producto::find($id);

        if($producto){
            $producto->delete();
            return response()->json(["deleted succesfully"], 200);
        }
        return response()->json(["post not found"], 404);
    }
    
}
?>