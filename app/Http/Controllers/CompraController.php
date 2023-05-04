<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class CompraController extends Controller
{

    public function index()
    {
        $reponse =http::get('http://localhost:3000/getcompras');
        $mostrar= $reponse->json();
        $mostrarArray = $mostrar[0];
        return view('admin.compras', compact('mostrar'));
    }

    public function store(Request $request ){
    
        $postcompra = Http::post('http://localhost:3000/postcompras',[

         "COD_PROVEEDOR"=> $request->input("codigo"),
         "CANTIDAD"=> $request->input("canti"),
         "PRECIO"=> $request->input("precios"),
         "COD_METODOPAGO"=> $request->input("metodo")
        ]);
        return redirect('/compras');
    }

    public function edit($id)
    {
        $COD_COMPRA= $id;
        //DD($COD_COMPRA);
        $response = Http::get('http://localhost:3000/getcompras/' . $COD_COMPRA);
        $mostrar = $response->json();
        $mostrarArray = $mostrar[0][0];
        //dd($mostrar);
        return view('admin.comprasedit', compact('mostrarArray'));
    }

    public function update(Request $request, $id)
    {
        //DD($request);
        $COD_COMPRAS = $request->id;
        $reponse = http::put('http://localhost:3000/putcompras', [
            "COD_COMPRAS"=> $COD_COMPRAS,
            "COD_PROVEEDOR"=> $request->get("codigo"),
            "CANTIDAD"=> $request->get("canti"),
            "PRECIO"=> $request->get("precios"),
            "COD_METODOPAGO"=> $request->get("metodo")
        ]);

        return redirect('/compras')->with('actualizar', 'ok');
    }

}
