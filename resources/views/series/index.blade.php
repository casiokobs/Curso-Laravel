<x-layout title="Séries">
    <a href="/series/criar" class="btn btn-dark mb-2">Adicionar</a>
    
    @isset($msgSucesso)
    <div class="alert alert-success">
        {{ $msgSucesso }}
    </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between aling-items-center">{{$serie->nome}} 
            <form action="/series/excluir/{{$serie->id}}" method="post"> 
                @csrf   
                @method('DELETE')
                <button class="btn btn-danger btn-sm">X</button>
            </form>
        </li>
        @endforeach
    </ul>
</x-layout>