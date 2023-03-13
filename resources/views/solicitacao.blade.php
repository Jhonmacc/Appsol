<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Menu Solicitação') }}
      </h2>
  </x-slot>
</x-app-layout>

<div class="py-12">
  <div class="max-w-8xl mx-auto sm:px-8 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">

      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">Cadastrar Solicitação</h2>

      <form action="{{ route('solicitacao.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome da solicitação</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <x-input type="textarea" class="form-control" id="descricao" name="descricao" required />
        </div>
        <div class="form-group">
            <label for="responsavel">Responsável</label>
            <select class="form-control" id="responsavel" name="responsavel" required>
              @if(isset($usuarios))
              @foreach($usuarios as $usuario)
                  <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
              @endforeach
              @endif    
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Criar solicitação</button>
      </form>
    </div>
  </div>
</div>
