@extends('layouts.app')

@section('titulo', 'adicionar Cartão')

@section('conteudo')
        @if(session('erroEndereco'))
            <br>
            {{session('erroEndereco.mensagem')}}
        @endif
    <div class="row ms-3">
        <div class="col mb-2" style="padding-left: 0;">
            <img src="../imagens/carrinho.png" class="" alt="..."  height="30" width="30">
                MEUS DADOS
        </div>
    </div>
    <div class="row ms-3 me-3 d-flex flex-fill">
            <div class="col ms-2" style="background-color: lightgray; height:auto">
                <img src="../imagens/carrinho.png" class="" alt="..."  height="30" width="30">
                Dados Básicos
                <form class="row mb-2"  action="" method="POST">
                    @csrf
                    <div class="form-floating mb-2">
                        <input name="nome" type="text" class="form-control" id="floatingNick" placeholder="Name" value="{{auth()->user()->name}}">
                        <label for="floatingNick" class="form-label ms-1">Name</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{auth()->user()->email}}">
                        <label for="floatingInput" class="form-label ms-1">Email address</label>
                    </div>
                    <div class="d-grid gap-2 col">
                            <button class="btn btn-primary" disabled type="submit">Excluir Minha Conta</button>
                    </div>
                    <div class="d-grid gap-2 col">
                            <button class="btn btn-primary"  disabled type="submit">Salvar Alterações</button>
                    </div>               
                </form>
            </div>
            <div class="col ms-3" style="background-color: lightgray;">
                <img src="../imagens/carrinho.png" class="" alt="..."  height="30" width="30">
                Endereços
                <div class="row mb-2 d-flex justify-content-center" >
                    @if(request()->path() == 'editarEndereco')
                    @if($errors->any())
                        <div>
                            @foreach($errors->all() as $error)
                                <span>{{$error}}</span>
                            @endforeach
                        </div>
                    @endif
                    <form class="row d-flex justify-content-center"  action="/endereco/update/{{$endereco->id}}" method="POST">
                        @csrf
                        <div class="form-floating mb-2">
                            <a>Editar Endereço</a>
                        </div>
                        <select class="form-select mb-2 " name="estado" id="estado" style="width:690px">
                            <option selected>Escolha seu UF</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                            <option value="EX">Estrangeiro</option>
                        </select>
                        <div class="form-floating mb-2">
                            <input name="cidade" type="text" class="form-control" id="floatingCidade" placeholder=""
                            value="{{$endereco->cidade}}">
                            <label for="floatingCidade" class="form-label ms-1">Cidade</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input name="bairro" type="text" class="form-control" id="floatingBairro" placeholder=""
                            value="{{$endereco->bairro}}">
                            <label for="floatingBairro" class="form-label ms-1">Bairro</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input name="rua" type="text" class="form-control" id="floatingRua" placeholder=""
                            value="{{$endereco->rua}}">
                            <label for="floatingRua" class="form-label ms-1">Rua</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input name="numero" type="text" class="form-control" id="floatingNumero" placeholder=""
                            value="{{$endereco->numero}}">
                            <label for="floatingNumero" class="form-label ms-1">Numero</label>
                        </div>
                        
                        <div class="form-floating mb-2">
                            <input name="complemento" type="text" class="form-control" id="floatingComplemento" placeholder=""
                            value="{{$endereco->complemento}}">
                            <label for="floatingComplemento" class="form-label ms-1">Complemento</label>
                        </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Salvar</button>
                            </div>
                                    
                    </form>
                    @else
                    @if($errors->any())
                        <div>
                            @foreach($errors->all() as $error)
                                <span>{{$error}}</span>
                            @endforeach
                        </div>
                    @endif
                    <form class="row d-flex justify-content-center"  action="/endereco/store" method="POST">
                        @csrf
                            <div class="form-floating mb-2">
                                <a>Adicionar Endereço</a>
                            </div>
                            <select class="form-select mb-2 " name="estado" id="estado" style="width:690px">
                                <option selected>Escolha seu UF</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                                <option value="EX">Estrangeiro</option>
                            </select>
                            <div class="form-floating mb-2">
                                <input name="cidade" type="text" class="form-control" id="floatingCidade" placeholder="">
                                <label for="floatingCidade" class="form-label ms-1">Cidade</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input name="bairro" type="text" class="form-control" id="floatingBairro" placeholder="">
                                <label for="floatingBairro" class="form-label ms-1">Bairro</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input name="rua" type="text" class="form-control" id="floatingRua" placeholder="">
                                <label for="floatingRua" class="form-label ms-1">Rua</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input name="numero" type="text" class="form-control" id="floatingNumero" placeholder="">
                                <label for="floatingNumero" class="form-label ms-1">Numero</label>
                            </div>
                            
                            <div class="form-floating mb-2">
                                <input name="complemento" type="text" class="form-control" id="floatingComplemento" placeholder="">
                                <label for="floatingComplemento" class="form-label ms-1">Complemento</label>
                            </div>
                            <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                            </div>
                                        
                    </form>
                    @endif
                </div>
            </div>
    </div>
@endsection