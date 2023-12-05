<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Pedido;
use App\Models\Endereco;
use App\Models\Cartao;
use App\Models\itemPedido;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Cache;

class PedidoController extends Controller
{
    public function edit($id){
        return view("editarStatusPedido", ['pedido' => Pedido::find($id)]);
    }

    public function update($id, $message){
        $pedido = Pedido::find($id);
        switch ($message){
            case 'pedidoconfirmado':
                $pedido->status= 'Pedido Confirmado';
                break;
            
            case 'emseparacao':
                $pedido->status= 'Em Separação';
                break;

            case 'pedidoenviado':
                $pedido->status= 'Pedido Enviado';
                break;
            case 'pedidoentregue':
                $pedido->status= 'Pedido Entregue';
                break;
        }
        $pedido->save();

        return redirect('/pedidos/show')->with(['pedidos' => Pedido::all()]);
    }
    public function show(){
        if(auth()->user()->name=='admin'){
            return view("listaPedidos", ['pedidos' => Pedido::all()]);
        }
        else{
            $array=[];
            $i=0;
            $pedidos = Pedido::where('usuario_id', auth()->user()->id)->get();
            foreach($pedidos as $pedido){
                $endereco = Endereco::where('id', $pedido->endereco_id)->first();
                $array[$i]= array(
                    'pedido' => $pedido,
                    'endereco' => $endereco,
                );
                $i++;
            }
            return view("listaPedidos", ['pedidos' => $array]);
        }
    }

    
    public function storePedido(){
        $pedido = new Pedido();
        $pedido->usuario_id = auth()->user()->id;
        $oEndereco = Endereco::where('usuario_id', auth()->user()->id)->first();
        $pedido->endereco_id = $oEndereco->id;
        $pedido->status = 'Em Análise';
        $pedido->transportadora = 'Transportadora Qualquer';
        $pedido->save();
        return $pedido->id;
    }
    public function storeItemPedido(){

        if(Endereco::where('usuario_id', auth()->user()->id)->first()){
            if(Cartao::where('usuario_id', auth()->user()->id)->first()){
                $arrayCarrinho=CarrinhoController::carrinho();
                $carrinho=[];
                if(sizeof($arrayCarrinho)==0){
                    return redirect('/carrinho')->with('erroVazio', [
                        'mensagem' => 'Adicione Algo no Carrinho para finalizar a Compra!'
                    ]);
                }

                if((isEmpty($arrayCarrinho))){
                    $i=0;            
                    foreach($arrayCarrinho as $id){
                        if($i==0){
                            $produto = Produto::find($id);
                            $carrinho[$i]['nome']=$produto->nome;
                            $carrinho[$i]['preco']=$produto->preco;
                            $carrinho[$i]['descricao']=$produto->descricao;
                            $carrinho[$i]['id']=$produto->id;
                            $carrinho[$i]['quantidade']=1;
                        }
                        else{
                            $b=FALSE;
                            $indice=0;
                            $m=0;
                            for($z=0; $z<sizeof($carrinho);$z+=1){
                                if($carrinho[$z]['id']==$id){
                                    $indice=$z;
                                    $b=TRUE;
                                    break;
                                }else{
                                    $m++;
                                }
                            }
                            if($b){
                                $carrinho[$indice]['quantidade']+=1;
                            }else{
                                $produto = Produto::find($id);
                                $carrinho[$m]['nome']=$produto->nome;
                                $carrinho[$m]['preco']=$produto->preco;
                                $carrinho[$m]['descricao']=$produto->descricao;
                                $carrinho[$m]['id']=$produto->id;
                                $carrinho[$m]['quantidade']=1;
                            }
                            
                        }
                        $i++;
                    }
                }

                foreach($carrinho as $item){
                    $verificarDisponibilidade = Produto::find($item['id']);
                    if($verificarDisponibilidade->quantidade<$item['quantidade']){
                        return redirect('/carrinho')->with('erroQuantidade', [
                            'item' => $item['nome'],
                            'mensagem' => 'Não tem a quantidade desejada!'
                        ]);
                    }
                }
                $idPedido = PedidoController::storePedido();
                foreach($carrinho as $item){
                    $itemPedido = new ItemPedido();
                    $itemPedido->quantidade = $item['quantidade'];
                    $itemPedido->idItem = $item['id'];
                    $itemPedido->idPedido = $idPedido;
                    $itemPedido->save();
                    $itemAlterado = Produto::find($item['id']);
                    $itemAlterado->quantidade-=$item['quantidade'];
                    $itemAlterado->save();
                }
                Cache::forget('carrinho');
                return redirect('/conta');
            }
            else{
                return redirect('/adicionarCartao')->with('erroCartao', [
                    'mensagem' => 'Adicione um Cartao para finalizar a Compra!'
                ]);
            }
        }
        else{
            return redirect('/adicionarEndereco')->with('erroEndereco', [
                'mensagem' => 'Adicione um endereço para finalizar a Compra!'
            ]);
        }
    }
}
