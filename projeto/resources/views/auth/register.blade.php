@extends('layouts.app')

@section('titulo', 'cadastro')

@section('conteudo')
    <div class="container-fluid">
        <div class="row justify-content-center align-items-end col-auto mt-5" style="min-height: 370px;">
            <div class="col" style="max-width: 450px;">
                <form class="row mt-5"  action="{{route('register')}}" method="POST">
                    @csrf

                    @if($errors->any())
                        <div>
                            @foreach($errors->all() as $error)
                                <span>{{$error}}</span>
                            @endforeach
                        </div>
                    @endif

                        <div class="form-floating mb-2 mt-5">
                            <a>Cadastro</a>
                        </div>
                        <div class="form-floating mb-2">
                            <input name="name" type="text" class="form-control" id="name" placeholder="Name">
                            <label for="name" class="form-label ms-1">Name</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                            <label for="email" class="form-label ms-1">Email address</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                            <label for="password" class="form-label ms-1">Password</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input name="password_confirmation" type="password" class="form-control" id="password-confirm" placeholder="Confirm Password">
                            <label for="password-confirm" class="form-label ms-1">Confirm password</label>
                        </div>
                        <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Cadastrar</button>
                        </div>
                                
                </form>
            </div>
        </div>
    </div>
@endsection