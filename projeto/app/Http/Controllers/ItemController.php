<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ItemController extends Controller
{
    public function create(){
        return view("cadastroItem");
    }
    
    

    public function remove($id){
        $produto = Produto::find($id);
        $produto->delete();
        return redirect('/');
    }
    public function store(Request $request){
        $request->validate([
            'nomeItem' => 'required',
            'precoItem' => 'required',
            'quantidadeItem' => 'required',
            'descricaoItem' => 'required',
            'categoriaItem' => 'required'
        ]);

        $produto = new Produto();
        $produto->nome = $request->input('nomeItem');
        $produto->preco = $request->input('precoItem');
        $produto->quantidade = $request->input('quantidadeItem');
        $produto->descricao = $request->input('descricaoItem');
        $produto->categoria = $request->input('categoriaItem');
        $produto->save();

        return redirect('/');
    }
}
