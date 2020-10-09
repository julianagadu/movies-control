<?php

namespace App\Http\Controllers;
use App\Http\Requests\FilmesFormRequest;
use App\Categoria;
use App\Filme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;


class FilmeController extends Controller
{

    public function __construct(){
        return $this->middleware('auth');
    }


    public function index(Request $request,$categoriaId){
        $filmes = Filme::query()
            ->where('categoria_id',$categoriaId)->orderBy('anoLancamento')->get();
        $categoria = Categoria::find($categoriaId);
        $mensagem = $request->session()->get('mensagem');
        return view('filmes.listar',[
            'filmes'=>$filmes,
            'categoriaId'=>$categoriaId,
            'categoriaNome'=>$categoria->nome,
            'mensagem'=>$mensagem
        ]);

    }


    public function create($categoriaId){
        return view('filmes.adicionar',['categoriaId'=>$categoriaId]);
    }

    public function store(FilmesFormRequest $request, $categoriaId){

        //valido se o titulo do filme ja existe
        if(Filme::where('titulo','=',$request->get('titulo'))->exists()){
            return back()->withErrors("Filme $request->titulo já existe");
        }

        if($request->hasFile('poster')){

            $poster = $request->file('poster');

            $filename = time().".".$poster->getClientOriginalExtension();

            Image::make($poster)->resize(300,450)->save(public_path('/uploads/posters/'.$filename));

        }else{
            $filename = 'filmeDefault.jpg';

        }

        $filme = new Filme($request->all());

        $filme->poster = $filename;

        $categoria = Categoria::find($categoriaId);
        $categoria->filme()->save($filme);



        $request->session()->flash('mensagem',"{$filme->titulo} criado com sucesso!");
        return redirect()->route('listarFilmes',['categoriaId'=>$categoriaId]);
    }

    public function edit($categoriaId,$id){
        $filme = Filme::find($id);
        return view('filmes.editar',[
            'filme'=>$filme,
            'categoriaId'=>$categoriaId
        ]);
    }

    public function update(Request $request,$categoriaId,$id){

        $filme = Filme::find($id);
        $filme->titulo = $request->titulo;
        $filme->anoLancamento = $request->anoLancamento;
        $filme->descricao = $request->descricao;
        $filme->duracao = $request->duracao;
        $filme->produtora = $request->produtora;
      

        if($filme->poster){

            $filename = $filme->poster;
        }

        if($request->hasFile('poster')&& $request->file('poster')->isValid()){ 
             
                $poster =$request->file('poster');
                $filename = time().".".$poster->getClientOriginalExtension();
                Image::make($poster)->resize(300,450)->save(public_path('/uploads/posters/'.$filename));
        } 
        
        $request->poster = $filename;
        

        $filme->poster = $request->poster;
        
        $filme->save();

        $request->session()->flash('mensagem',"{$filme->titulo} atualizado com sucesso!");
        return redirect()->route('listarFilmes',['categoriaId'=>$categoriaId]);
    }


    public function detalhes($categoriaId,$id){
        $filme = Filme::find($id);
        $categoria = Categoria::find($categoriaId);
        return view('filmes.ver',[
            'filme'=>$filme,
            'categoria'=>$categoria
        ]);
    }


    public function destroy(Request $request,$categoriaId,$id){
        $filme = Filme::find($id);
        $filme->delete();
        $request->session()->flash('mensagem',"Filme removido com sucesso!");
        return redirect()->route('listarFilmes',['categoriaId'=>$categoriaId]);
    }
}
