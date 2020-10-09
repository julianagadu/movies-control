@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-header">Filmes de Gênero {{$categoriaNome}}
                        <a href="/categorias/{{$categoriaId}}/filmes/create" style="position: relative; float:right"><button class="w3-button w3-circle w3-grey w3-card-4" >+</button></a>
                    </div>
                    

                    <div class="card-body">

                        
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            @if(!empty($mensagem))
                                <div class="alert alert-success">
                                    {{$mensagem}}
                                </div>
                            @endif

                        <div class="row">    
                        
                        @foreach($filmes as $filme)
                        <div class="col-md-3">
                            <div class="img-thumbnail">
                                <h5 style="text-align: center">{{$filme->titulo}}</h5>
                                <a href="/categorias/{{$categoriaId}}/filmes/{{$filme->id}}/edit"><button class="btn btn-sm btn-dark mr-2" style="width: 100%">Editar</button></a>
                                
                                
                                <a href="/categorias/{{$categoriaId}}/filmes/{{$filme->id}}/ver"><img  src="/uploads/posters/{{$filme->poster}}" style="width: 100%"></a>                             
    

                                <span class="d-flex align-items-center">
                                    <form method="post" action="/categorias/{{$categoriaId}}/filmes/{{$filme->id}}"
                                          onsubmit="return confirm('Tem certeza que deseja remover {{$filme->nome}}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger mr-2" style="width: 235px">Excluir</button>
                                    </form>
                                 </span>
                                 
                            </div>
                        </div>
                        @endforeach
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="/categorias" class="btn btn-secondary mt-2" style="margin:20px">Voltar</a>
    </div>
@endsection

