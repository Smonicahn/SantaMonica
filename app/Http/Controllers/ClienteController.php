<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ClienteController extends Controller
{

    public function index()
    {
        $reponse =http::get('http://localhost:3000/getcliente');
        $mostrar= $reponse->json();
        $mostrarArray = $mostrar[0];
        return view('admin.clientes', compact('mostrar'));
    }

    public function store(Request $request ){
    
        $postcliente = Http::post('http://localhost:3000/postcliente',[

         "COD_PERSONA"=> $request->input("persona"),
         "FACTURA"=> $request->input("facturas")
        ]);
        return redirect('/clientes');
    }

    public function edit($id)
    {
        $COD_CLIENTE= $id;
        //DD($COD_CLIENTE);
        $response = Http::get('http://localhost:3000/getcliente/' . $COD_CLIENTE);
        $mostrar = $response->json();
        $mostrarArray = $mostrar[0][0];
        //dd($mostrar);
        return view('admin.clientesedit', compact('mostrarArray'));
    }

    public function update(Request $request, $id)
    {
        //DD($request);
        $COD_CLIENTE = $request->id;
        $reponse = http::put('http://localhost:3000/putcliente', [
            "COD_CLIENTE"=> $COD_CLIENTE,
            "COD_PERSONA"=> $request->get("persona"),
            "FACTURA"=> $request->get("facturas")
        ]);

        return redirect('/clientes')->with('actualizar', 'ok');
    }

}
