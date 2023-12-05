<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use function PHPUnit\Framework\isEmpty;

class CarrinhoController extends Controller
{
    public function navigate(){
        $arrayCarrinho=CarrinhoController::carrinho();
        $carrinho=[];

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
        return view("carrinho", ['carrinho' => $carrinho]);
    }

    public function excluirCarrinho(){
        Cache::forget('carrinho');
        return redirect('/carrinho');
    }

    public function removerItem($id){
        $carrinho = Cache::get('carrinho') ?? [];
        Cache::forget('carrinho');
        foreach($carrinho as $chave => $id1){
            if($id1==$id){
                unset($carrinho[$chave]);
            }
        }
        Cache::put('carrinho', $carrinho);
        return redirect('/carrinho');
    }

    public static function carrinho(){
        return Cache::get('carrinho') ?? [];
    }
    public function adicionarCarrinho($id){
        //Cache::forget('carrinho');
        $carrinho = Cache::get('carrinho') ?? [];
        array_push($carrinho, $id);
        Cache::put('carrinho', $carrinho);       
        return redirect('/');
    }
}
