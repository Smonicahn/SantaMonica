<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ProveedorController extends Controller
{
    public function index()
    {
        $reponse =http::get('http://localhost:3000/getproveedor');
        $mostrar= $reponse->json();
        $mostrarArray = $mostrar[0];
        return view('admin.proveedores', compact('mostrar'));
    }

    public function store(Request $request ){
    
        $postproveedor = Http::post('http://localhost:3000/postproveedor',[

         "COD_PERSONA"=> $request->input("persona")
        ]);
        return redirect('/proveedores');
    }

    public function edit($id)
    {
        $COD_PROVEEDOR= $id;
        //DD($COD_PROVEEDOR);
        $response = Http::get('http://localhost:3000/getproveedor/' . $COD_PROVEEDOR);
        $mostrar = $response->json();
        $mostrarArray = $mostrar[0][0];
        //dd($mostrar);
        return view('admin.proveedoresedit', compact('mostrarArray'));
    }

    public function update(Request $request, $id)
    {
        //DD($request);
        $COD_PROVEEDOR = $request->id;
        $reponse = http::put('http://localhost:3000/putproveedor', [
            "COD_PROVEEDOR"=> $COD_PROVEEDOR,
            "COD_PERSONA"=> $request->get("persona"),
        ]);

        return redirect('/proveedores')->with('actualizar', 'ok');
    }

}

