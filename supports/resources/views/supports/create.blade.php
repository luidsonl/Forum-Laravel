@extends('master')
@section('content')

<div class="container d-flex justify-content-center align-items-center">
    <div class="card w-75 h-75">
        <div class="card-body">
            <h1 class="text-center mb-4">Novo Support</h1>
            <form action="{{ route('supports.store') }}" method="POST" autocomplete="off">
                @csrf
                <div class="mb-3">
                    <label for="subject">Assunto:</label>
                    <input type="text" class="form-control" id="subject" name="subject" value="{{old('subject')}}" placeholder="Assunto">
                </div>
                <div class="mb-3">
                    <label for="body">Pergunta:</label>
                    <textarea class="form-control" id="body" name="body" cols="30" rows="5" placeholder="Pergunta">{{old('body')}}</textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
</div>

@endsection