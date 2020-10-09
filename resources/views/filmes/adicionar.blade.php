@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Adicionar Filme</div>

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
                            <form method="post" action="/categorias/{{$categoriaId}}/filmes" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <label class ="mr-2" for="titulo">Título:</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo">
                                    <br/>

                                    <label class="mr-2" for="anoLancamento">Ano de Lançamento</label>
                                    <input type="text" class="form-control" id="anoLancamento" name="anoLancamento">
                                    <br/>

                                    <label class="mr-2" for="duracao">Duração</label>
                                    <input type="text" class="form-control" id="duracao" name="duracao">
                                    <br/>

                                    <label class ="mr-2" for="descricao">Descrição</label>
                                    <textarea type="text" class="form-control" id="descricao" name="descricao">
                                    </textarea>
                                    <br/>
                                    <label class ="mr-2" for="produtora">Produtora</label>
                                    <select class="form-control" id ="produtora" name ="produtora">
                                        <option value="21st Century Fox">21st Century Fox</option>
                                        <option value="DreamWorks">DreamWorks</option>
                                        <option value="MGM">MGM (Metro Goldwyn Mayer)</option>
                                        <option value="The Weinstein Company">The Weinstein Company</option>
                                        <option value ="Lions Gate Entertainment">Lions Gate Entertainment</option>
                                        <option value ="Paramount Motion Pictures Group">Paramount Motion Pictures Group</option>
                                        <option value ="Universal Pictures">Universal Pictures</option>
                                        <option value ="The Walt Disney Company">The Walt Disney Company</option>
                                        <option value="Time Warner">Time Warner</option>
                                        <option value="Sony Pictures Entertainment">Sony Pictures Entertainment</option>
                                        <option value ="Outro">Outro</option>
                                    </select><br/>


                                    <label class ="mr-2" for="ano">Poster do Filme:</label>
                                    <input type="file"  id="poster" name="poster">
                                </div>
                                <button class="btn btn-primary mt-2">Adicionar</button>
                                <a href="/categorias" class="btn btn-secondary mt-2">Voltar</a>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
