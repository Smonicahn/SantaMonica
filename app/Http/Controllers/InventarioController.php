<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class InventarioController extends Controller
{
    public function index()
    {
        $reponse =http::get('http://localhost:3000/getinv_final');
        $mostrar= $reponse->json();
        $mostrarArray = $mostrar[0];
        return view('admin.inv_final', compact('mostrar'));
    }

    public function store(Request $request ){
    
        $postinv_final = Http::post('http://localhost:3000/postinv_final',[

         "COD_PRODUCTO"=> $request->input("producto"),
         "COD_INV_COMPRA"=> $request->input("invcompra"),
         "COD_INV_VENTA"=> $request->input("invventa"),
         "CANTIDAD"=> $request->input("cantidades")
        ]);
        return redirect('/inv_final');
    }

    public function edit($id)
    {
        $COD_INV_FINAL= $id;
        //DD($COD_INV_FINAL);
        $response = Http::get('http://localhost:3000/getinv_final/' . $COD_INV_FINAL);
        $mostrar = $response->json();
        $mostrarArray = $mostrar[0][0];
        //dd($mostrar);
        return view('admin.inv_finaledit', compact('mostrarArray'));
    }

    public function update(Request $request, $id)
    {
        //DD($request);
        $COD_INV_FINAL = $request->id;
        $reponse = http::put('http://localhost:3000/putinv_final', [
            "COD_INV_FINAL"=> $COD_INV_FINAL,
            "COD_PRODUCTO"=> $request->get("producto"),
            "COD_INV_COMPRA"=> $request->get("invcompra"),
            "COD_INV_VENTA"=> $request->get("invventa"),
            "CANTIDAD"=> $request->get("cantidades")
        ]);

        return redirect('/inv_final')->with('actualizar', 'ok');
    }
}
