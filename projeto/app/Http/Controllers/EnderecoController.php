<?php

namespace App\Http\Controllers;
use App\Models\Endereco;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function create(){
        return view("adicionarEndereco");
    }

    public function edit(){
        return view("adicionarEndereco",  ['endereco' => Endereco::where('usuario_id', auth()->user()->id)->first()]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'rua' => 'required',
            'numero' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'bairro' => 'required',
        ]);

        $endereco = Endereco::find($id);
        $endereco->usuario_id = auth()->user()->id;
        $endereco->rua = $request->input('rua');
        $endereco->numero = $request->input('numero');
        $endereco->cidade = $request->input('cidade');
        $endereco->estado = $request->input('estado');
        $endereco->complemento = $request->input('complemento');
        $endereco->bairro = $request->input('bairro');
        $endereco->save();
        return redirect('/conta/configurar');
    }

    public function store(Request $request){
        $request->validate([
            'rua' => 'required',
            'numero' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'bairro' => 'required',
        ]);

        $endereco = new Endereco();
        $endereco->usuario_id = auth()->user()->id;
        $endereco->rua = $request->input('rua');
        $endereco->numero = $request->input('numero');
        $endereco->cidade = $request->input('cidade');
        $endereco->estado = $request->input('estado');
        $endereco->complemento = $request->input('complemento');
        $endereco->bairro = $request->input('bairro');
        $endereco->save();

        return redirect('/conta/configurar');
    }
}
