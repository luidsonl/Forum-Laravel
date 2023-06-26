@extends('master')
@section('content')

<div class="container">
    <h2>Support</h2>

    <div class="border rounded p-3">
        <div class="row">
            <div class="col-sm-6">
                <p class="fw-bold"> Autor: {{$support->user->name}} </p>
            </div>
            <div class="col-sm-3 d-flex justify-content-center border rounded p-2">
                <p>Criado: {{ $support->created_at->format('d/m/Y H:i') }}</p>
            </div>
            <div class="col-sm-3 d-flex justify-content-center border rounded p-2">
                <p>Atualizado: {{ $support->updated_at->format('d/m/Y H:i') }}</p>
            </div>
            
        </div>
        <div class="row">
            <div class="col-sm-10">
                <h1 class="me-4"> {{$support->subject}} </h1>
            </div>
            <div class="col-sm-2 d-flex justify-content-end">
                <div class="h4 my-3">
                    <span> <?php echo $statusIcon[$support->status]; ?></span>
                    
                    @if(Auth::user()->id == $support->user_id)
                    
                    <span>
                        <a href="{{route('supports.edit', [$support->id])}}" title="Editar"><i class="bi bi-pencil"></i></a>
    
                        <form method="POST" action="{{route('supports.destroy', $support->id)}}" class="d-inline" id="delete-confirm">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Deletar" style="all:unset; cursor: pointer;">
                                <i class="bi bi-trash text-danger"></i>
                            </button>
                        </form>
                    </span>
                    @endif 
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <div class="border rounded m-3 p-2">
                    <p> {{$support->body}} </p>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <a href="{{route('reply.create',[$support->id])}}" class="btn btn-primary my-3">Responder</a>
            </div>
            
        </div>
    </div>
</div>

@if(count($replies) > 0)
<div class="container">
    <h2 class="my-3">Respostas</h2>
    <div class="container border rounded p-3 my-3">
        @foreach($replies as $reply)
        <div class="border rounded p-3">
            <div class="row">
                <div class="col-sm-2">
                    <div class="fw-bold">
                        {{Str::limit($reply->user->name, 30)}}
                    </div>
                    
                </div>
                <div class="col-sm-9">
                    {{$reply->body}}
                </div>
            </div>
            <div class="row ">
                <div class="col d-flex justify-content-end">
                    @if(Auth::user()->id == $reply->user_id)
    
                    <span>
                        <a href="{{route('reply.edit', $reply->id)}}" title="Editar"><i class="bi bi-pencil"></i></a>
    
                        <form method="POST" action="{{route('reply.destroy', $reply->id)}}" class="d-inline" id="delete-confirm">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Deletar" style="all:unset; cursor: pointer;">
                                <i class="bi bi-trash text-danger"></i>
                            </button>
                        </form>
                    </span>
                    @endif
                </div>
            </div>
        </div>
        
        @endforeach
    </div>
</div>
@endif
@endsection