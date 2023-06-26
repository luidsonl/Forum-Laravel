@extends('master')
@section('content')
<main class="container d-flex justify-content-center align-items-center d-column">
    <div class="card w-50 h-50">
        <div class="card-body">
            <h3>Login</h3>

            <form action="{{route('user.auth')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required value="{{old('email')}}" placeholder="Informe o E-mail">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="Informe a senha">
                </div>
                
        
                <button type="submit" class="btn btn-primary">Logar</button>
            </form>

            
            @if ($errors->any())
                <div class="alert alert-danger mt-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        
    </div>


</main>


@endsection