<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;

class CatalogoController extends Controller
{
    public function index()
    {
        $imagenes = Imagen::all();
        return view('catalogo', compact('imagenes'));
    }
}
