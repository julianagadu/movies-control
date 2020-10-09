<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{

    public function __construct(){
        return $this->middleware('auth');
    }


    public function index(Request $request){
        $categorias = Categoria::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');
        return view('categorias.listar',['categorias'=>$categorias,'mensagem'=>$mensagem]);

    }

    public function create(){
        return view('categorias.adicionar');
    }

    public function store(Request $request){

        if(Categoria::where('nome','=',$request->get('nome'))->exists()){
            return back()->withErrors("Gênero $request->nome já existe");
        }
        Categoria::create($request->all());
        $request->session()->flash('mensagem',"Gênero $request->nome criado com sucesso!");
        return redirect()->route('listarCategorias');
    }



    public function edit($id){
        $categoria = Categoria::find($id);
        return view('categoria.editar',[
            'categoria'=>$categoria
        ]);
    }

    public function destroy(Request $request,$id){
        $categoria = Categoria::find($id);
        $categoria->filme()->each(function($filme){
            $filme->delete();
        });
        $categoria->delete();
        $request->session()->flash('mensagem',"Gênero $categoria->nome removido com sucesso!");
        return redirect()->route('listarCategorias');
    }
}
