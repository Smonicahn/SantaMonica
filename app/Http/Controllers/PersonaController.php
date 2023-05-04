<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PersonaController extends Controller
{

    public function index()
    {
        $reponse =http::get('http://localhost:3000/personas');
        $mostrar= $reponse->json();
        $mostrarArray = $mostrar[0];

        return view('admin.personas', compact('mostrar'));
        //return response()->json($mostrarArray);
    }

    public function store(Request $request ){
    
        $postpersona = Http::post('http://localhost:3000/REGISTROPERSONA',[

         "ID"=> $request->input("identidad"),
         "NOM_PERSONA"=> $request->input("nombre"),
         "APE_PERSONA"=> $request->input("apellido"),
         "SEXO"=> $request->input("sex"),
         "EDAD"=> $request->input("edades"),
         "EST_CIVIL"=> $request->input("estado"),
         "TIP_DIRECCION"=> $request->input("tipodir"),
         "NOM_DIRECCION"=> $request->input("nomdir"),
         "TIP_TELEFONO"=> $request->input("tipotel"),
         "NUM_TELEFONO"=> $request->input("numtel"),
         "TIP_CORREO"=> $request->input("tipocor"),
         "CORREO"=> $request->input("correos")
        ]);
        return redirect('/personas');
    }

    public function edit($id)
    {
        $COD_PERSONA= $id;
        //DD($COD_PERSONA);
        $response = Http::get('http://localhost:3000/PERSONAS/' . $COD_PERSONA);
        $mostrar = $response->json();
        $mostrarArray = $mostrar[0][0];
        //dd($mostrar);
        return view('admin.personasedit', compact('mostrarArray'));
    }
    public function update(Request $request, $id)
    {
        //DD($request);
        $COD_PERSONA = $request->id;
        $reponse = http::put('http://localhost:3000/ACTUALIZARPERSONA', [
            "COD_PERSONA"=> $COD_PERSONA,
            "ID"=> $request->get("identidad"),
            "NOM_PERSONA"=> $request->get("nombre"),
            "APE_PERSONA"=> $request->get("apellido"),
            "SEXO"=> $request->get("sex"),
            "EDAD"=> $request->get("edades"),
            "EST_CIVIL"=> $request->get("estado"),
            "TIP_DIRECCION"=> $request->get("tipodir"),
            "NOM_DIRECCION"=> $request->get("nomdir"),
            "TIP_TELEFONO"=> $request->get("tipotel"),
            "NUM_TELEFONO"=> $request->get("numtel"),
            "TIP_CORREO"=> $request->get("tipocor"),
            "CORREO"=> $request->get("correos")
        ]);

        return redirect('/personas')->with('actualizar', 'ok');
    }
}
