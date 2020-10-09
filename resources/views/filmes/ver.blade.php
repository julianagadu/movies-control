@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{$filme->titulo}}</div>


                    <div class="card-body">
                     <div class="row">
                        <div class="col-md-4" style="text-align: center">
                            <img src="/uploads/posters/{{$filme->poster}}" style="max-width:70%;display: inline-block;"  class="img-thumbnail">
                        </div>

                        <div class="col-md-8">
                            <table class="table" style="text-align:center;display: inline-block;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Titulo</th>
                                        <th>Gênero</th>
                                        <th>Ano de Lançamento</th>
                                        <th>Duração</th>
                                        <th>Descrição</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$filme->titulo}}</td>
                                        <td>{{$categoria->nome}}</td>
                                        <td>{{$filme->anoLancamento}}</td>
                                        <td>{{$filme->duracao}}</td>
                                        <td style="text-align: justify">{{$filme->descricao}}</td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                    </div>



                </div>
            </div>
        </div>
        <a href="/home" class="btn btn-secondary mt-2" style="margin:20px">Voltar</a>
    </div>
@endsection
