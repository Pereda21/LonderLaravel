<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Persona;
use App\Models\Imagen;

class AgendaController extends Controller
{
    public function create()
    {
        $personas = Persona::all();
        $imagenes = Imagen::all();
        return view('insertar', compact('personas', 'imagenes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'idpersona' => 'required|exists:personas,idpersona',
            'idimagen' => 'required|exists:imagenes,idimagen',
        ]);

        Agenda::create([
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'idpersona' => $request->idpersona,
            'idimagen' => $request->idimagen,
        ]);

        return redirect()->route('agenda.create')->with('success', 'Registro insertado correctamente.');
    }

    public function mostrar(Request $request)
{
    $personas = Persona::all();
    $resultados = [];

    if ($request->filled(['idpersona', 'fecha'])) {
        $resultados = Agenda::with('imagen')
            ->where('idpersona', $request->idpersona)
            ->where('fecha', $request->fecha)
            ->orderBy('hora')
            ->get();
    }

    return view('mostrar', compact('personas', 'resultados'));
}



}
