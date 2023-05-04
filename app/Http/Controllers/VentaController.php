<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class VentaController extends Controller
{

    public function index()
    {
        $reponse =http::get('http://localhost:3000/getventas');
        $mostrar= $reponse->json();
        $mostrarArray = $mostrar[0];
        return view('admin.ventas', compact('mostrar'));
    }

    public function store(Request $request ){
    
        $postventa = Http::post('http://localhost:3000/postventas',[

         "COD_CLIENTE"=> $request->input("codigo"),
         "CANTIDAD"=> $request->input("canti"),
         "PRECIO"=> $request->input("precios"),
         "COD_METODOPAGO"=> $request->input("metodo")
        ]);
        return redirect('/ventas');
    }

    public function edit($id)
    {
        $COD_VENTAS= $id;
        //DD($COD_VENTAS);
        $response = Http::get('http://localhost:3000/getventas/' . $COD_VENTAS);
        $mostrar = $response->json();
        $mostrarArray = $mostrar[0][0];
        //dd($mostrar);
        return view('admin.ventasedit', compact('mostrarArray'));
    }

    public function update(Request $request, $id)
    {
        //DD($request);
        $COD_VENTAS = $request->id;
        $reponse = http::put('http://localhost:3000/putventas', [
            "COD_VENTAS"=> $COD_VENTAS,
            "COD_CLIENTE"=> $request->input("codigo"),
            "CANTIDAD"=> $request->input("canti"),
            "PRECIO"=> $request->input("precios"),
            "COD_METODOPAGO"=> $request->input("metodo")
        ]);

        return redirect('/ventas')->with('actualizar', 'ok');
    }

}