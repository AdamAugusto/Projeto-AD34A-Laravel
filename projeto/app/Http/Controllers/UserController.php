<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function navigate(){
        return view("auth.register");
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
        ]);

        $usuario = User::find($id);
        $usuario->name = $request->input('nome');
        $usuario->email = $request->input('email');
        $usuario->save();
        return redirect('/conta/configurar');
    }

    public function remove($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/');
    }
}
