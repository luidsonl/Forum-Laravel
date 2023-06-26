@extends('master')
@section('content')

<div class="container d-flex justify-content-center align-items-center">
    <div class="card w-75 h-75">
        <div class="card-body">
            <h1 class="text-center mb-4">Editar pergunta</h1>
            <form action="{{ route('supports.update', $support->id)}}" method="POST" autocomplete="off">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="subject">Assunto:</label>
                    <input type="text" class="form-control" id="subject" name="subject" value="{{$support->subject}}" placeholder = "Assunto">
                </div>
                <div class="mb-3">
                    <label for="body">Pergunta:</label>
                    <textarea class="form-control" id="body" name="body" cols="30" rows="5" placeholder="Pergunta">{{$support->body}}</textarea>
                </div>
                <div class="mb-3 d-flex justify-content-between">
                    <div>
                        <input type="radio" name="status" value="active" id="radioActive" {{ 
                            $support->status === 'active' ? 'checked' : '' 
                            }}>
                        <label for="radioActive">Ativo</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="status" value="pending" id="radioPending" {{ 
                            $support->status === 'pending' ? 'checked' : '' 
                            }}>
                        <label for="radioPending">Pendente</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="status" value="completed" id="radioCompleted" {{
                            $support->status === 'completed' ? 'checked' : ''
                            }}>
                        <label for="radioCompleted">Completo</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="status" value="archived" id="radioArchived" {{ 
                            $support->status === 'archived' ? 'checked' : '' 
                            }}>
                        <label for="radioArchived">Arquivado</label>
                    </div>
                    
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
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