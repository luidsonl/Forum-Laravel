@extends('master')
@section('content')


<div class="container d-flex justify-content-center align-items-center">
    <div class="card w-75 h-75">
        <div class="card-body">
           <h4>{{{$support->subject}}}</h2>
            <p>
                {{$support->body}}
            </p>
            <div class="fw-bold">
                {{$support->user->name}}
            </div>
        </div>
    </div>
</div>

<div class="container d-flex justify-content-center align-items-center mb-5">
    <div class="card w-75 h-75">
        <div class="card-body">
            <h4 class="text-center mb-4">Sua resposta</h4>
            <form action="{{ route('reply.store')}}" method="POST">
                @csrf
                <input type="hidden" name="support_id" value="{{$support->id}}">
                <div class="mb-3">
                    <textarea class="form-control" id="body" name="body" cols="30" rows="5" placeholder="Resposta"></textarea>
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