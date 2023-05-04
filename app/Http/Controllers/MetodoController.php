<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MetodoController extends Controller
{
    public function index()
    {
        $reponse =http::get('http://localhost:3000/getmetodopago');
        $mostrar= $reponse->json();
        $mostrarArray = $mostrar[0];
        
        return view('admin.metodo', compact('mostrar'));

        
    }

    public function store(Request $request ){
    
        $postmetodo = Http::post('http://localhost:3000/postmetodopago',[

         "TIP_PAGO"=> $request->input("pago"),
         "NUM_TARJ_BAN"=> $request->input("numero"),
         "TIT_TAR"=> $request->input("titular"),
         "FEC_EMI"=> $request->input("emision"),
         "FEC_VEN"=> $request->input("vencimiento"),
         "COD_SEG"=> $request->input("seguridad")
        ]);
        return redirect('/metodo');
    }

    public function edit($id)
    {
        $COD_METODOPAGO= $id;
        //DD($COD_METODOPAGO);
        $response = Http::get('http://localhost:3000/getmetodopago/' . $COD_METODOPAGO);
        $mostrar = $response->json();
        $mostrarArray = $mostrar[0][0];
        //dd($mostrar);
        return view('admin.metodoedit', compact('mostrarArray'));
    }

    public function update(Request $request, $id)
    {
        //DD($request);
        $COD_METODOPAGO = $request->id;
        $reponse = http::put('http://localhost:3000/putmetodopago', [
            "TIP_PAGO"=> $request->get("pago"),
            "NUM_TARJ_BAN"=> $request->get("numero"),
            "TIT_TAR"=> $request->get("titular"),
            "FEC_EMI"=> $request->get("emision"),
            "FEC_VEN"=> $request->get("vencimiento"),
            "COD_SEG"=> $request->get("seguridad")
        ]);

        return redirect('/metodo')->with('actualizar', 'ok');
    }
}
