<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ProductoController extends Controller
{

    public function index()
    {
        $reponse =http::get('http://localhost:3000/getproducto');
        $mostrar= $reponse->json();
        $mostrarArray = $mostrar[0];
        return view('admin.productos', compact('mostrar'));
    }


    public function store(Request $request ){
    
        $postproducto = Http::post('http://localhost:3000/postproducto',[

         "COD_PROVEEDOR"=> $request->input("proveedor"),
         "NOM_PRODUCTO"=> $request->input("nombre"),
         "TIPO_PRODUCTO"=> $request->input("tipo"),
         "DESC_PRODUCTO"=> $request->input("desc"),
         "UN_COMPRA"=> $request->input("compra"),
         "UN_VENTA"=> $request->input("venta")
        ]);
        return redirect('/productos');
    }

    public function edit($id)
    {
        $COD_PRODUCTO= $id;
        //DD($COD_PRODUCTO);
        $response = Http::get('http://localhost:3000/getproducto/' . $COD_PRODUCTO);
        $mostrar = $response->json();
        $mostrarArray = $mostrar[0][0];
        //dd($mostrar);
        return view('admin.productosedit', compact('mostrarArray'));
    }

    public function update(Request $request, $id)
    {
        //DD($request);
        $COD_PRODUCTO = $request->id;
        $reponse = http::put('http://localhost:3000/putproducto', [
            "COD_PRODUCTO"=> $COD_PRODUCTO,
            "COD_PROVEEDOR"=> $request->get("proveedor"),
            "NOM_PRODUCTO"=> $request->get("nombre"),
            "TIPO_PRODUCTO"=> $request->get("tipo"),
            "DESC_PRODUCTO"=> $request->get("desc"),
            "UN_COMPRA"=> $request->get("compra"),
            "UN_VENTA"=> $request->get("venta")
        ]);

        return redirect('/productos')->with('actualizar', 'ok');
    }
}
