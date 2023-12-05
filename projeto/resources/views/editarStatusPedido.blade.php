@extends('layouts.app')

@section('titulo', 'configurarConta')

@section('conteudo')

    <div class="row ms-3">
        <div class="col mb-2" style="padding-left: 0;">
            <img src="../imagens/carrinho.png" class="" alt="..."  height="30" width="30">
            Pedidos
        </div>
    </div>
    <div class="row ms-3 me-3 d-flex flex-fill">
            <div class="col" style="background-color: lightgray; padding:10px">
                            <div class="list-group d-flex flex-sm-fill align-items-center " >
                                <ul class="list-group list-group-horizontal-sm">
                                    <li class="list-group-item align-middle" style="width: 350px;">
                                        <div class="fw-bold">Número do Pedido</div>
                                            {{$pedido->id}}
                                        
                                    </li>
                                    <li class="list-group-item" style="width: 350px;">
                                        <div class="ms-2 me-auto">
                                        <div class="fw-bold">Status</div>
                                            {{$pedido->status}}
                                        </div>
                                    </li>
                                    <li class="list-group-item" style="width: 350px;">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Data</div>
                                            {{$pedido->created_at}}
                                        </div>
                                    </li>
                                    <li class="list-group-item" style="width: 320px;">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Pagamento</div>
                                                Cartão
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-center" style="width: 110px; ">

                                    </li>
                                </ul>
                            </div>
                            <div class="list-group d-flex flex-sm-fill align-items-center " >
                                <ul class="list-group list-group-horizontal-sm">
                                    <li class="list-group-item d-flex flex-sm-fill justify-content-center" style="width: 370px;">
                                        <div class="ms-2 d-flex justify-content-center">
                                            <button onclick="window.location.href='/pedido/update/{{$pedido->id}}/pedidoconfirmado'"
                                            type="submit" class="btn btn-outline d-flex flex-sm-fill justify-content-center" 
                                            style="background-color:white; border-color:lightgreen; color:lightgreen; width: 90px;">
                                                Pedido Corfimado
                                            </button>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex flex-sm-fill justify-content-center" style="width: 370px;">
                                        <div class="ms-2 d-flex justify-content-center">
                                            <button onclick="window.location.href='/pedido/update/{{$pedido->id}}/emseparacao'"
                                            type="submit" class="btn btn-outline d-flex flex-sm-fill justify-content-center" 
                                            style="background-color:white; border-color:blue; color:blue; width: 90px;">
                                                Em Separação
                                            </button>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex flex-sm-fill justify-content-center" style="width: 370px;">
                                        <div class="ms-2 d-flex justify-content-center">
                                            <button onclick="window.location.href='/pedido/update/{{$pedido->id}}/pedidoenviado'"
                                            type="submit" class="btn btn-outline d-flex flex-sm-fill justify-content-center" 
                                            style="background-color:white; border-color:orange; color:orange; width: 90px;">
                                                Pedido Enviado
                                            </button>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex flex-sm-fill justify-content-center" style="width: 370px;">
                                        <div class="ms-2 d-flex justify-content-center">
                                            <button onclick="window.location.href='/pedido/update/{{$pedido->id}}/pedidoentregue'"
                                            type="submit" class="btn btn-outline d-flex flex-sm-fill justify-content-center" 
                                            style="background-color:white; border-color:orange; color:orange; width: 90px;">
                                                Pedido Entregue
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
            </div>
    </div>
@endsection
    