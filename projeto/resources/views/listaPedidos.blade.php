@extends('layouts.app')

@section('titulo', 'lista pedidos')

@section('conteudo')
    @if(auth()->user()->name=='admin')
        <div class="row ms-3">
            <div class="col mb-2" style="padding-left: 0;">
                <img src="../imagens/carrinho.png" class="" alt="..."  height="30" width="30">
                Pedidos
            </div>
        </div>
        @foreach($pedidos as $pedido)
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
                                        <li class="list-group-item" style="width: 350px;">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold">Pagamento</div>
                                                    Cartão
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-center" style="width: 80px; ">
                                            <button onclick="window.location.href='/pedido/edit/{{$pedido->id}}'"
                                            type="submit" class="btn btn-outline d-flex flex-sm-fill justify-content-center" 
                                            style="background-color:white; border-color:orange; color:orange; width: 60px;">
                                                Editar Status
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                </div>
        </div>
        @endforeach
    @else
        <div class="row ms-3">
            <div class="col mb-2" style="padding-left: 0;">
                <img src="../imagens/carrinho.png" class="" alt="..."  height="30" width="30">
                Meus Pedidos
            </div>
        </div>
        @foreach($pedidos as $pedido)
            <div class="row ms-3 me-3 d-flex flex-fill">
                    <div class="col" style="background-color: lightgray;">
                        <div class="accordion mt-2 mb-2">
                            <div class="accordion-item">
                                <div class="accordion-header" style="background-color: lightgray;">
                                    <div class="list-group" >
                                        <ul class="list-group list-group-horizontal-sm">
                                            <li class="list-group-item" style="width: 350px;">
                                                <div class="fw-bold">Número do Pedido</div>
                                                {{$pedido['pedido']->id}}
                                                
                                            </li>
                                            <li class="list-group-item" style="width: 350px;">
                                                <div class="ms-2 me-auto">
                                                <div class="fw-bold">Status</div>
                                                {{$pedido['pedido']->status}}
                                                </div>
                                            </li>
                                            <li class="list-group-item" style="width: 350px;">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">Data</div>
                                                    {{$pedido['pedido']->created_at}}
                                                </div>
                                            </li>
                                            <li class="list-group-item" style="width: 350px;">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">Pagamento</div>
                                                        Cartão
                                                </div>
                                            </li>
                                            <li class="list-group-item" style="width: 80px;">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                                            data-bs-target="#collapse{{$pedido['pedido']->id}}" aria-expanded="false" aria-controls="collapseOne">
                                            </li>
                                        </ul>
                                        
                                        
                                    </div>
                                    

                                </div>
                                <div id="collapse{{$pedido['pedido']->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body" style="padding: 0; background-color: lightgray;">
                                        <ul class="list-group list-group-horizontal-sm">
                                            <li class="list-group-item align-middle" style="width: 740px;">
                                                <div class="fw-bold">
                                                    Endereço: 
                                                    {{$pedido['endereco']->rua}} {{$pedido['endereco']->numero}}, 
                                                    {{$pedido['endereco']->bairro}}, 
                                                    {{$pedido['endereco']->cidade}}, 
                                                    {{$pedido['endereco']->estado}}
                                                </div>
                                            </li>
                                            <li class="list-group-item" style="width: 740px;">
                                                <div class="ms-2 me-auto">
                                                <div class="fw-bold">Transportadora: {{$pedido['pedido']->transportadora}}</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>      
                    </div>
            </div>
        @endforeach
    @endif
@endsection