@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="text-align: center;font-size: 24px">
                    Filmes
                    <a href="/categorias"><button class="w3-button w3-xlarge w3-circle w3-red w3-card-4" style="position:relative;float: right">+</button></a><br/><br/>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        


                        @foreach($categorias as $categoria)
                                                            
                           
                            <div class="img-thumbnail" style="background-color: rgba(162, 162, 165, 0.644); color:#fff">
                                {{$categoria->nome}}
                                <!--<button class="w3-button w3-xlarge w3-circle w3-teal" style="float: right ">+</button>-->
                            </div>

                            <div class="row" style="margin-top: 5px; margin-bottom: 5px">

                                    @foreach($filmes as $filme)

                                        @if($filme->categoria_id == $categoria->id)
                                        
                                        <div class="col-sm-3">
                                                <div>
                                                    <div class="img-thumbnail" style="text-align: center; width: 100%;">        
                                                        <a href="/categorias/{{$categoriaId = $filme->categoria_id}}/filmes/{{$filme->id}}/ver"><img  src="/uploads/posters/{{$filme->poster}}" style="max-width:200px; display: inline-block;"><br/></a>
                                                        <h5>{{$filme->titulo}}<br/></h5>
                                                        <small>{{$filme->anoLancamento}}<br/></small>
                                                    </div>
                                                </div>
                                        </div>
                                        @endif

                                    @endforeach

                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
