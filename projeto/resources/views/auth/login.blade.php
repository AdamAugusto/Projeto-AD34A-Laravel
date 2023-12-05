@extends('layouts.app')

@section('titulo', 'login')


@section('conteudo')
    <div class="container-fluid">
        <div class="row justify-content-center align-items-end col-auto mb-0" style="min-height: 370px;">
            <div class="col" style="max-width: 450px;">
                <form class="" action="{{ route('login') }}" method="POST">
                    @csrf

                    @if($errors->any())
                        <div>
                            @foreach($errors->all() as $error)
                                <span>{{$error}}</span>
                            @endforeach
                        </div>
                    @endif
                    
                    <div class="form-floating mb-2">
                        <a>Login</a>
                    </div>
                    <div class="form-floating mb-2">
                        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput" class="form-label ms-1">Email address</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword" class="form-label ms-1">Password</label>
                    </div>
                    <div class=" mb-2">
                        <a href="" class="text-decoration-none">Esqueci minha senha</a>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                            
                </form>
            </div>
        </div>
    </div>
@endsection
