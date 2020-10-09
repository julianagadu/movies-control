@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Meu Perfil</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height: 150px; f loat: left; border-radius:50%; margin-right:25px">
                        <h2>{{ $user->name }}</h2>
                        <form enctype="multipart/form-data" action="/profile" method="POST">
                            <label>Atualizar Imagem do Perfil</label><br/>
                            <input type="file" name="avatar"><br/><br/>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="submit" class="pull-right btn btn-sm btn-primary">
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
