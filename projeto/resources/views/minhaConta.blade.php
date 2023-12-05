@extends('layouts.app')

@section('titulo', 'minha Conta')

@section('conteudo')

    <div class="row ms-3 me-3">
        <div class="col me-3 mb-3 mt-3">
            <div class="row" style="background-color: lightgray;">
                <div class="col">
                    <img src="../imagens/discord.png" class="" alt="..."  height="70">
                </div>
                <div class="col mt-2">
                    Bem-vindo, {{auth()->user()->name}}
                </div>
                <div class="col d-flex justify-content-end mt-3">
                    <img onclick="window.location.href='/conta/configurar'" 
                    src="../imagens/engrenagem.png" 
                    class="" alt="..."  height="40" width="40">
                </div>

            </div>
            
            

        </div>
        <div class="col  mb-3 mt-3" style="background-color: lightgray;">
        <div class="row">
                <div class="col mt-2">
                    Crédito disponível
                    <br>
                    R$ 0,00
                </div>
                <div class="col mt-3 d-flex justify-content-end">
                    <button type="submit" class="btn d-flex justify-content-center" style=" background-color:orange; width:200px;">Adicionar Crédito</button>
                </div>
        @if(!($card))
                <div class="col mt-3 d-flex justify-content-end">
                    <button onclick="window.location.href='/adicionarCartao'" 
                    type="submit" class="btn d-flex justify-content-center" 
                    style=" background-color:orange; width:200px;">Adicionar Cartão</button>
                </div>

        </div>
        @else
        </div>
            <div class="row">
                    <div class="col mt-2 mb-2">
                        <div class="cardz1">
                            <div class="intern">
                                <img class="approximation" src="../imagens/aprox.png" alt="aproximation">
                                <div class="card-number">
                                    <div class="number-vl">{{$card->numero}}</div>
                                </div>
                                <div class="card-holder">
                                    <label> </label>
                                    <div class="name-vl">{{$card->titular}}</div>
                                </div>
                                <div class="card-infos">
                                    <div class="exp">
                                        <label>VALIDADE</label>
                                        <div class="expiration-vl">{{$card->validade}}</div>
                                    </div>
                                    <div class="cvv">
                                        <label>CVV</label>
                                        <div class="cvv-vl">{{$card->codigo}}</div>
                                    </div>
                                </div>
                                <img class="chip" src="../imagens/chip.png" alt="chip">
                            </div>
                        </div>
                    </div>
            </div>

        @endif
    </div>
    </div>
    @if($pedido)
    <div class="row ms-3">
        <div class="col mb-2" style="padding-left: 0;">
            <img src="../imagens/carrinho.png" class="" alt="..."  height="30" width="30">
            Resumo do seu último pedido
        </div>
    </div>
    <div class="row ms-3 me-3 d-flex flex-fill">
            <div class="col" style="background-color: lightgray;">
                <div class="list-group d-flex flex-sm-fill align-items-center mt-2 mb-2" >
                    <ul class="list-group list-group-horizontal-sm">
                        <li class="list-group-item align-middle" style="width: 370px;">
                            <div class="fw-bold">Número do Pedido</div>
                            {{$pedido->id}}
                            
                        </li>
                        <li class="list-group-item" style="width: 370px;">
                            <div class="ms-2 me-auto">
                            <div class="fw-bold">Status</div>
                            {{$pedido->status}}
                            </div>
                        </li>
                        <li class="list-group-item" style="width: 370px;">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Data</div>
                                {{$pedido->created_at}}        
                            </div>
                        </li>
                        <li class="list-group-item" style="width: 370px;">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Pagamento</div>
                                    Cartão
                            </div>
                        </li>
                    </ul>
                    <ul class="list-group list-group-horizontal-sm">
                        <li class="list-group-item align-middle" style="width: 740px;">
                        <div class="fw-bold">Endereço</div>
                            
                        </li>
                        <li class="list-group-item" style="width: 740px;">
                            <div class="ms-2 me-auto">
                            <div class="fw-bold">Transportadora </div>
                            </div>
                        </li>
                    </ul>
                    <div class="container-fluid d-flex justify-content-end mt-2" style="padding:0;">
                        <button onclick="window.location.href='pedidos/show'" 
                        type="submit" 
                        class="btn btn-outline d-flex  justify-content-center" 
                        style="background-color:white; border-color:orange; color:orange">Ver Todos os Pedidos</button>
                    </div>
                </div>
            </div>
    </div>
    @else
    <div class="row ms-0" style="background-color: lightgray;">
        <div class="col ms-3 mb-2" style="padding-left: 0; background-color: lightgray;">
            <img src="../imagens/carrinho.png" class="" alt="..."  height="30" width="30">
            Sem pedidos Realizados
        </div>
    </div>
    @endif

@endsection
