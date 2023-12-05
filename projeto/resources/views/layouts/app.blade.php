<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('titulo')</title>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="../css/styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <style type="text/css">
            .nav-link{
                color: black !important;
            }
            .dropdown-menu{
                background-color: orange;
            }
            .nav-underline{
                background-color: orange;
                color: black !important;
            }
        </style>


    </head>
    <body>
        @if(request()->path() == 'login' || request()->path() == 'register')
            <nav class="navbar" style = "background-color: #ffa500;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">Foto</a>
                    <ul class="nav nav-underline">
                        <li class="nav-item"><a class="nav-link nav-link-color:black" href="/login">Login</a></li>
                        <li class="nav-item"><a class="nav-link nav-link-color:black" href="/register">Cadastro</a></li>
                    </ul>
                </div>
            </nav>
        @else
            @if(!(auth()->check()))
                <nav class="navbar" style = "background-color: #ffa500;" >
                    <div class="align-middle container-fluid ">
                        <a class="navbar-brand" href="/">
                            foto
                        </a>
                        <form class="d-flex flex-sm-fill " role="search" style='max-width: 950px;'>
                            <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-dark " type="submit" >Search</button>
                        </form>
                        <div class="">
                            <ul class="nav nav-underline flex-sm-fill">
                                <li class="nav-item flex-sm-fill">foto</li>
                                <li>
                                    <a class="nav-underline" href="/login">Login</a>
                                    <a class="nav nav-underline" href="/register">Cadastro</a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    <ul class="nav nav-underline flex-sm-fill text-sm-center">
                        <li class="nav-item flex-sm-fill text-sm-center">
                            <a class="nav-link " href="">Active</a>
                        </li>
                        <li class="nav-item flex-sm-fill text-sm-center">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item flex-sm-fill text-sm-center">
                            <a class="nav-link" href="#">link</a>
                        </li>
                        <li class="nav-item flex-sm-fill text-sm-center">
                            <a class="nav-link nav-link-color:black" href="/carrinho">carrinho</a>
                        </li>
                        <li class="nav-item dropdown flex-sm-fill text-sm-center" style="color:black">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            @else
                @if(auth()->user()->name=='admin')
                    <nav class="navbar justify-content-center" style = "background-color: #ffa500;" >
                        <div class="container-fluid">
                            <a class="navbar-brand" href="/">
                                foto
                            </a>
                            <form class="d-flex flex-sm-fill " role="search" style='max-width: 950px;'>
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-dark" type="submit" >Search</button>
                            </form>
                            <div class="">
                                <ul class="nav nav-underline flex-sm-fill">
                                    <li class="nav-item flex-sm-fill">foto</li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="">{{auth()->user()->name}}</a>
                                        
                                    </li class="nav-item flex-sm-fill">
                                    <form method="POST" action="/logout">
                                        @csrf
                                        <button class="nav-item" style="background-color: orange; border:none">Logout</button>
                                    </form>
                                </ul>
                            </div>
                            
                        </div>
                        <ul class="nav nav-underline flex-sm-fill text-sm-center">
                            <li class="nav-item flex-sm-fill text-sm-center">
                                <a class="nav-link " href="/item/create">Adicionar Item</a>
                            </li>
                            <li class="nav-item flex-sm-fill text-sm-center">
                                <a class="nav-link" href="">nada</a>
                            </li>
                            <li class="nav-item flex-sm-fill text-sm-center">
                                <a class="nav-link" href="">Categoria</a>
                            </li>
                            <li class="nav-item flex-sm-fill text-sm-center">
                                <a class="nav-link nav-link-color:black" href="/pedidos/show">Todos Pedidos</a>
                            </li>
                            <li class="nav-item dropdown flex-sm-fill text-sm-center" style="color:black">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                @else
                    <nav class="navbar justify-content-center" style = "background-color: #ffa500;" >
                        <div class="container-fluid">
                            <a class="navbar-brand" href="/">
                                foto
                            </a>
                            <form class="d-flex flex-sm-fill " role="search" style='max-width: 950px;'>
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-dark" type="submit" >Search</button>
                            </form>
                            <div class="">
                                <ul class="nav nav-underline flex-sm-fill">
                                    <li class="nav-item flex-sm-fill" href="">foto</li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/conta">{{auth()->user()->name}}</a>
                                        
                                    </li class="nav-item flex-sm-fill">
                                    <form method="POST" action="/logout">
                                        @csrf
                                        <button class="nav-item" style="background-color: orange; border:none">Logout</button>
                                    </form>
                                </ul>
                            </div>
                            
                        </div>
                        <ul class="nav nav-underline flex-sm-fill text-sm-center">
                            <li class="nav-item flex-sm-fill text-sm-center">
                                <a class="nav-link " href="#">Active</a>
                            </li>
                            <li class="nav-item flex-sm-fill text-sm-center">
                                <a class="nav-link" href="/conta">Minha Conta</a>
                            </li>
                            <li class="nav-item flex-sm-fill text-sm-center">
                                <a class="nav-link" href="">Categoria</a>
                            </li>
                            <li class="nav-item flex-sm-fill text-sm-center">
                                <a class="nav-link nav-link-color:black" href="/carrinho">Carrinho</a>
                            </li>
                            <li class="nav-item dropdown flex-sm-fill text-sm-center" style="color:black">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                @endif
            @endif
        @endif

        
        @yield('conteudo')
        
        <footer class="d-flex justify-content-center sticky-bottom mt-2">         
            <nav class="navbar flex-sm-fill justify-content-center" style = "background-color: #ffa500;">
                <div>
                <a class="navbar-brand text-sm-center" href="#">@Copyrith 2023</a>
                </div>
            </nav>   
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
</html>
    