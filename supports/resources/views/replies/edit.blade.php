@extends('master')
@section('content')


<div class="container d-flex justify-content-center align-items-center mb-5">
    <div class="card w-75 h-75">
        <div class="card-body">
            <h4 class="text-center mb-4">Editar resposta</h4>
            <form action="{{ route('reply.update', $reply->id)}}" method="POST">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <textarea class="form-control" id="body" name="body" cols="30" rows="5" placeholder="Resposta">{{$reply->body}}</textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Responder</button>
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