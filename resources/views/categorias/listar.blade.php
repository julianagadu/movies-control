@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <div class="card-header">Gêneros Cinematográficos</div>
                    <div class="card-body">

                        @if(!empty($mensagem))
                            <div class="alert alert-success">
                                {{$mensagem}}
                            </div>
                        @endif

                        <label>Selecione o Gênero ou Adicione um novo </label>
                        <a href="/categorias/create"><button type="submit" class="btn btn-primary">Adicionar</button></a><br/>
                        <br>
                    @foreach($categorias as $categoria)
                        <li class="list-group-item d-flex justify-content-between">
                            <div>
                                <ul class="list-group list-group-horizontal">
                                    <li class="list-group-item">{{$categoria->nome}}</li>

                                </ul>

                            </div>
                            <span class="d-flex align-items-center">
                                <form method="post" action="/categorias/{{$categoria->id}}"
                                
                                    onsubmit="return confirm('Tem certeza que deseja remover {{$categoria->nome}}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger mr-2">Excluir</button>
                                </form>
                            <a href="/categorias/{{$categoria->id}}/filmes" class="btn btn-primary btn-sm mr-2">Ver Filmes</a>
                            <a href="/categorias/{{$categoria->id}}/filmes/create" class="btn btn-secondary btn-sm mr-2">Adicionar Filme</a>
                            </span>
                        </li>





                    @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

