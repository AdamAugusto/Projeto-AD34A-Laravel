@extends('layouts.app')

@section('titulo', 'home')

@section('conteudo')
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
            <img src="../imagens/marketing-de-produto-iBlueMarketing.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
            <img src="../imagens/marketing-de-produto-iBlueMarketing.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="../imagens/marketing-de-produto-iBlueMarketing.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="false"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="false"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container text-center">
        <div class="row mt-3">
    @if(sizeof($items)==0)
                <div>Não tem produtos cadastrados</div>        
    @else
        <?php $i=0; ?>
        @if(auth()->check())
            @if(auth()->user()->name=='admin')
                @foreach($items as $produto)
                    @if($i==4)
                        </div>
                        <div class="row mt-3">
                        @php
                            $i=0;
                        @endphp
                    @endif
                    <div class="col">
                        <div class="card" style="width: 15rem;">
                        <img src="../imagens/discord.png" class="card-img-top" alt="..."  height="100">
                            <div class="card-img-overlay d-flex justify-content-end align-top" style="max-height:70px">
                                <a href="" class="btn btn-outline-danger" style="max-height:40px">X</a>
                            </div>
                            <div class="card-body sm">
                                <h5 class="card-title">{{$produto->nome}}</h5>
                                <p class="card-text">{{$produto->descricao}}</p>
                                <p class="card-text">Em Estoque: {{$produto->quantidade}}</p>
                                <p class="card-text">R$ {{$produto->preco}},00</p>
                                <a href="/comprar/{{$produto->id}}" class="btn" style="background-color:orange">Comprar</a>
                            </div>
                        </div>
                    </div> 
                    @php 
                        $i++;
                    @endphp
                @endforeach
            @else
                @foreach($items as $produto)
                    @if($i==4)
                        </div>
                        <div class="row mt-3">
                        @php 
                            $i=0; 
                        @endphp
                    @endif
                    <div class="col">
                        <div class="card" style="width: 15rem;">
                        <img src="../imagens/discord.png" class="card-img-top" alt="..."  height="100">
                            <div class="card-body sm">
                                <h5 class="card-title">{{$produto->nome}}</h5>
                                <p class="card-text">{{$produto->descricao}}</p>
                                <p class="card-text">Em Estoque: {{$produto->quantidade}}</p>
                                <p class="card-text">R$ {{$produto->preco}},00</p>
                                <a href="/comprar/{{$produto->id}}" class="btn" style="background-color:orange;">Comprar</a>
                            </div>
                        </div>
                        
                    </div> 
                    @php 
                        $i++;
                     @endphp
                @endforeach    
            @endif
        @else
            @foreach($items as $produto)
                @if($i==4)
                    </div>
                    <div class="row mt-3">
                    @php 
                        $i=0; 
                    @endphp
                @endif
                <div class="col">
                    <div class="card" style="width: 15rem;">
                    <img src="../imagens/discord.png" class="card-img-top" alt="..."  height="100">
                        <div class="card-body sm">
                            <h5 class="card-title">{{$produto->nome}}</h5>
                            <p class="card-text">{{$produto->descricao}}</p>
                            <p class="card-text">Em Estoque: {{$produto->quantidade}}</p>
                            <p class="card-text">R$ {{$produto->preco}},00</p>
                            <a href="/comprar/{{$produto->id}}" class="btn" style="background-color:orange">Comprar</a>
                        </div>
                    </div>
                    
                </div> 
                @php 
                    $i++;
                @endphp
            @endforeach
        @endif
    @endif
        </div>
    </div>
@endsection