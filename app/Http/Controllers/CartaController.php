<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartaController extends Controller
{
    public function __construct()
    {
        // Middleware para permitir el acceso a solo los usuarios autorizados y con rol admin
        $this->middleware(['auth', 'role:admin']);
    }

    /**
     * Función que devolverá una vista donde aparecerán todas las cartas del juego
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('cartas.index');
    }
}
