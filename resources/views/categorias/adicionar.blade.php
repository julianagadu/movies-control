@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <div class="card-header">Gêneros Cinematográficos</div>
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

                        <form method="post" action="/categorias">
                            @csrf
                            <label>Selecione o Gênero</label><br/>
                            <select class="form-control" style="width:500px" id ="nome" name ="nome">
                                <option value="Ação">Ação</option>
                                <option value="Animação">Animação</option>
                                <option value="Aventura">Aventura</option>
                                <option value="Comédia">Comédia</option>
                                <option value ="Drama">Drama</option>
                                <option value ="Documentário">Documentário</option>
                                <option value ="Fantasia">Fantasia</option>
                                <option value ="Ficção científica">Ficção científica</option>
                                <option value="Horror">Horror</option>
                                <option value="Musical">Musical</option>
                                <option value ="Romance">Romance</option>
                                <option value ="Suspense">Suspense</option>
                                <option value ="Terror">Terror</option>
                                <option value ="Outro">Outro</option>
                            </select><br/>
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                            <a href="/categorias" class="btn btn-secondary">Voltar</a>
                        </form>

                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection

