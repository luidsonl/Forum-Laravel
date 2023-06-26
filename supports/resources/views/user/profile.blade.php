@extends('master')
@section('content')
<main class="container d-flex justify-content-center align-items-center d-column">
    <div class="container w-50 h-50 border rounded p-3">
        <div class="row">
            <div class="col">
                <h1>{{Auth::user()->name}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div>
                    <p>Criado em: {{Auth::user()->created_at->format('d/m/Y H:i')}}</p>
                </div>
                <form action="{{ route('user.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>    
            </div>
            <div class="col-md-6">
                <div class="border rounded p-3" style="width: 175px; height: 175px">
                    Foto
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{route('about')}}" class="btn">Sobre</a>
            </div>
            
        </div>
    </div>

@endsection
</main>