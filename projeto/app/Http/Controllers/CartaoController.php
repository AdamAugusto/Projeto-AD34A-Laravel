<?php

namespace App\Http\Controllers;
use App\Models\Cartao;
use Illuminate\Http\Request;

class CartaoController extends Controller
{
    public function navigate(){
        return view("adicionarCartao");
    }

    public function store(Request $request){
        $request->validate([
            'numero' => 'required',
            'validade' => 'required',
            'cvv' => 'required',
            'titular' => 'required',
        ]);

        $cartao = new Cartao();
        $cartao->usuario_id = auth()->user()->id;
        $cartao->numero = $request->input('numero');
        $cartao->validade = $request->input('validade');
        $cartao->codigo = $request->input('cvv');
        $cartao->titular = $request->input('titular');
        $cartao->save();

        return redirect('/conta');
    }
}
