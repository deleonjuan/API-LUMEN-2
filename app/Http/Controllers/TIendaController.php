<?php

namespace App\Http\Controllers;
use App\Tienda;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function index()
    {
        $tienda =Tienda::all();
        return response()->json($tienda, 200);
    }

    public function find($id)
    {
        $tienda = Tienda::find($id);
        if($tienda){
            return response()->json($tienda, 200);
        }
        return response()->json(["data not found"], 404);
    }

    public function create(Request $req)
    {
        $tienda = new Tienda;
        $tienda->nombre = $req->nombre;
        $tienda->descripcion = $req->descripcion;
        $tienda->imagen = $req->imagen;
        $tienda->save();
        return response()->json(["saved succesfully"], 200);
    }

    public function update(Request $req, $id)
    {
        $tienda = Tienda::find($id);
        if($tienda){
            $tienda->nombre = $req->nombre;
            $tienda->descripcion = $req->descripcion;
            $tienda->imagen = $req->imagen;
            $tienda->save();
            return response()->json(["updated succesfully"], 200);
        }
        return response()->json(["not found"], 404);
    }

    public function delete($id)
    {
        $tienda = Tienda::find($id);

        if($tienda){
            $tienda->delete();
            return response()->json(["deleted succesfully"], 200);
        }
        return response()->json(["not found"], 404);
    }
    
}
?>