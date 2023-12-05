<?php

namespace App\Http\Controllers;
use App\Models\Cartao;
use App\Models\Endereco;
use App\Models\Pedido;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function navigate(){
        $pedido = Pedido::where('usuario_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
        if($pedido)
            $endereco = Endereco::where('id', $pedido->endereco_id)->first();
        else
            $endereco= NULL;
        return view("minhaConta", ['card' => Cartao::where('usuario_id', auth()->user()->id)->first(), 
        'pedido' =>  $pedido,
        'enderecoPedido' => $endereco]);
    }
    public function configurar(){
        return view("configurarConta", ['endereco' => Endereco::where('usuario_id', auth()->user()->id)->first()]);
    }
}
