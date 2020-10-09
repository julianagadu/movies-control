@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <div class="card-header">Editar Filme</div>
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

                            <form method="post" action="/categorias/{{$categoriaId}}/filmes/{{$filme->id}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div>
                                    <label class ="mr-2" for="titulo">Título:</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{$filme->titulo}}">
                                    <br/>

                                    <label class="mr-2" for="anoLancamento">Ano de Lançamento</label>
                                    <input type="text" class="form-control" id="anoLancamento" name="anoLancamento" value="{{$filme->anoLancamento}}">
                                    <br/>

                                    <label class="mr-2" for="duracao">Duração</label>
                                    <input type="text" class="form-control" id="duracao" name="duracao" value="{{$filme->duracao}}">
                                    <br/>

                                    <label class ="mr-2" for="descricao">Descrição</label>
                                    <textarea type="text" class="form-control" id="descricao" name="descricao">
                                        {{$filme->descricao}}
                                    </textarea>
                                    <br/>
                                    <label class ="mr-2" for="produtora">Produtora</label>
                                    <select class="form-control" id ="produtora" name ="produtora">
                                        <option value="21st Century Fox"{{$filme->produtora=='21st Century Fox'?'selected':''}}>21st Century Fox</option>
                                        <option value="DreamWorks" {{$filme->produtora=='DreamWorks'?'selected':''}}>DreamWorks</option>
                                        <option value="MGM" {{$filme->produtora=='MGM'?'selected':''}}>MGM (Metro Goldwyn Mayer)</option>
                                        <option value="The Weinstein Company" {{$filme->produtora=='The Weinstein Company'?'selected':''}}>The Weinstein Company</option>
                                        <option value ="Lions Gate Entertainment" {{$filme->produtora=='Lions Gate Entertainment'?'selected':''}}>Lions Gate Entertainment</option>
                                        <option value ="Paramount Motion Pictures Group" {{$filme->produtora=='Paramount Motion Pictures Group'?'selected':''}}>Paramount Motion Pictures Group</option>
                                        <option value ="Universal Pictures" {{$filme->produtora=='Universal Pictures'?'selected':''}}>Universal Pictures</option>
                                        <option value ="The Walt Disney Company" {{$filme->produtora=='The Walt Disney Company'?'selected':''}}>The Walt Disney Company</option>
                                        <option value="Time Warner" {{$filme->produtora=='Time Warner'?'selected':''}}>Time Warner</option>
                                        <option value="Sony Pictures Entertainment" {{$filme->produtora=='Sony Pictures Entertainment'?'selected':''}}>Sony Pictures Entertainment</option>
                                        <option value ="Outro" {{$filme->produtora=='Outro'?'selected':''}}>Outro</option>
                                    </select><br/>

                                    <img src="{{url("/uploads/posters/{$filme->poster}")}}" alt="{{$filme->poster}}" style="max-width:50px;">
                                    <label class ="mr-2" for="ano">Poster do Filme:</label>
                                    <input type="file"  id="poster" name="poster">
                                </div>
                                <button class="btn btn-primary mt-2">Salvar</button>

                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

