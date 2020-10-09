<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Filme;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        $categorias = Categoria::all();
        $filmes = Filme::all();

        return view('home', [
            'filmes' => $filmes,
            'categorias' => $categorias,
            


        ]);


    }




}
