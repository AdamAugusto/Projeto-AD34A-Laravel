@extends('layouts.app')

@section('titulo', 'cadastro item')

@section('conteudo')
    <form class="ms-3 me-3 mt-5" action="/item/store" method="POST">
        @csrf
        @if($errors->any())
                <div>
                    @foreach($errors->all() as $error)
                            <span>{{$error}}</span>
                            <br>
                     @endforeach
                </div>
         @endif
        <div class="form-floating mb-2">
                        <input name="nomeItem" type="text" class="form-control" id="floatingNick" placeholder="Name" >
                        <label for="floatingNick" class="form-label ms-1">Nome do Produto</label>
        </div>
        <div class="form-floating mb-2">
                        <input name="precoItem" type="text" class="form-control" id="floatingPreco" placeholder="Name" >
                        <label for="floatingPreco" class="form-label ms-1">Preço</label>
        </div>
        <div class="form-floating mb-2">
                        <input name="quantidadeItem" type="text" class="form-control" id="floatingQuantidade" placeholder="Name" >
                        <label for="floatingQuantidade" class="form-label ms-1">Quantidade</label>
        </div>
        <div class=" mb-2">
            <label for="validationTextarea" class="form-label ms-1">Descrição do produto</label>
            <textarea name="descricaoItem" class="form-control" id="validationTextarea" placeholder="Required example textarea"></textarea>
            <div class="invalid-feedback">
                Please enter a message in the textarea.
            </div>
        </div>
        <div class="mb-2">
            <select name="categoriaItem" class="form-select"  aria-label="select example">
            <option value="">Categoria
            <option value="2">Two</option>
            <option value="3">Three</option>
            </select>
            <div class="invalid-feedback">Example invalid select feedback</div>
        </div>

        <div class="mb-2">
            <input name="fotoItem" type="file" class="form-control" aria-label="file example" >
            <div class="invalid-feedback">Example invalid form file feedback</div>
        </div>
        

        <div class="d-grid gap-2 justify-content-center mx-auto">
            <button class="btn btn-primary" style="min-width: 300px;" type="submit" >Cadastrar</button>
        </div>
    </form>
@endsection