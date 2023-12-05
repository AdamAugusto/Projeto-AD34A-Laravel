@extends('layouts.app')

@section('titulo', 'configurarConta')

@section('conteudo')

    <div class="row ms-3">
        <div class="col mb-2" style="padding-left: 0;">
            <img src="../imagens/carrinho.png" class="" alt="..."  height="30" width="30">
                MEUS DADOS
        </div>
    </div>
    <div class="row ms-3 me-3 d-flex flex-fill">
            <div class="col ms-2" style="background-color: lightgray;">
                <img src="../imagens/carrinho.png" class="" alt="..."  height="30" width="30">
                Dados Básicos
                <form class="row mb-2"  action="/user/update/{{auth()->user()->id}}" method="POST">
                    @csrf
                    @if($errors->any())
                        <div>
                            @foreach($errors->all() as $error)
                                <span>{{$error}}</span>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-floating mb-2">
                        <input name="nome" type="text" class="form-control" id="floatingNick" placeholder="" value="{{auth()->user()->name}}">
                        <label for="floatingNick" class="form-label ms-1">Name</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="" value="{{auth()->user()->email}}">
                        <label for="floatingInput" class="form-label ms-1">Email address</label>
                    </div>
                    <div class="d-grid gap-2 col">
                            <button class="btn btn-primary"
                                    type="button"
                                    onclick="window.location.href='/user/remove/{{auth()->user()->id}}'">Excluir Minha Conta</button>
                    </div>
                    <div class="d-grid gap-2 col">
                            <button class="btn btn-primary" type="submit">Salvar Alterações</button>
                    </div>               
                </form>
            </div>
            <div class="col ms-3" >
                <img src="../imagens/carrinho.png" class="" alt="..."  height="30" width="30">
                Endereços
                @if(!($endereco))
                <div class="row me-2" style="background-color: lightgray;">
                    <div class="col justify-content-start mt-3">SEM ENDEREÇOS</div>
                    <div class="col mt-3 d-flex justify-content-end mb-3">
                        <button type="submit"
                                class="btn d-flex justify-content-center"
                                style=" background-color:orange"
                                onclick="window.location.href='/adicionarEndereco'">
                                Adicionar Endereço
                        </button>
                    </div>
                </div>
                @else
                <div class="row me-2" style="background-color: lightgray;">
                    <div class="card ms-2 me-2 mt-2 mb-2" style="width:700px">
                        <div class="card-body">
                            <h5 class="card-title">Endereço</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">{{$endereco->rua}} , {{$endereco->bairro}}</h6>
                            <p class="card-text">Número: {{$endereco->numero}}</p>
                            <p class="card-text">{{$endereco->cidade}} , {{$endereco->estado}}</p>
                            <a href="/editarEndereco" class="card-link" style="color: orange; text-decoration: none;">editar</a>
                            <a href="" class="card-link" style="color: orange; text-decoration: none;">excluir</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
    </div>
@endsection