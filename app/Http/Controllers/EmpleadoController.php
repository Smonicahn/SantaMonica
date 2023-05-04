<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class EmpleadoController extends Controller
{

    public function index()
    {
        $reponse =http::get('http://localhost:3000/getempleado');
        $mostrar= $reponse->json();
        $mostrarArray = $mostrar[0];
        return view('admin.empleados', compact('mostrar'));
    }

    public function store(Request $request ){
    
        $postempleado = Http::post('http://localhost:3000/postempleado',[

         "USR_EMPLEADO"=> $request->input("usuario"),
         "COD_PERSONA"=> $request->input("codigo"),
         "CARGO"=> $request->input("cargos"),
         "SALARIO"=> $request->input("salarios")
        ]);
        return redirect('/empleados');
    }

    public function edit($id){
        $COD_EMPLEADO= $id;
        //DD($COD_EMPLEADO);
        $response = Http::get('http://localhost:3000/getempleado/' . $COD_EMPLEADO);
        $mostrar = $response->json();
        $mostrarArray = $mostrar[0][0];
        //dd($mostrar);
        return view('admin.empleadosedit', compact('mostrarArray'));
    }

    public function update(Request $request, $id)
    {
        //DD($request);
        $COD_EMPLEADO = $request->id;
        $reponse = http::put('http://localhost:3000/putempleado', [
            "COD_EMPLEADO"=> $COD_EMPLEADO,
            "USR_EMPLEADO"=> $request->get("usuario"),
            "COD_PERSONA"=> $request->get("codigo"),
            "CARGO"=> $request->get("cargos"),
            "SALARIO"=> $request->get("salarios")
        ]);

        return redirect('/empleados')->with('actualizar', 'ok');
    }
}
