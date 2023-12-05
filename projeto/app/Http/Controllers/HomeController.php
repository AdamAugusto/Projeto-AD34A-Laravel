<?php

namespace App\Http\Controllers;
use App\Models\Produto;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("home", ['items' => Produto::all()]);
    }

}
