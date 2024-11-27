@extends('.master')

@section('title', 'Editar Chamado')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-900">
        <div class="w-full max-w-3xl p-8 space-y-6 bg-gray-800 rounded-lg shadow-lg">
            <!-- Cabeçalho -->
            <div class="mb-6 flex justify-between items-center">
                <span class="text-3xl font-extrabold text-white">Criar Novo Chamado</span>
                <a href="{{ route('dashboard') }}" class="text-sm text-indigo-500 hover:text-indigo-600">Voltar ao
                    Dashboard</a>
            </div>

            <!-- Formulário de Criação de Chamado -->
            <form action="{{ route('chamado.update', $id) }}" method="POST">
                @csrf
                <!-- Título do Chamado -->
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-300">Título</label>
                    <input id="title" name="title" type="text" required value="{{$chamado['title']}}"
                        class="mt-1 block w-full bg-gray-700 border-gray-600 text-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm px-4 py-3"
                        placeholder="Título do chamado">
                </div>

                <!-- Descrição do Chamado -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-300">Descrição</label>
                    <textarea id="description" name="description" required
                        class="mt-1 block w-full bg-gray-700 border-gray-600 text-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm px-4 py-3"
                        placeholder="Descreva o problema">{{$chamado['description']}}</textarea>
                </div>

                 <!-- Status do Chamado -->
                <div class="mb-6">
                    <label for="status" class="block text-sm font-medium text-gray-300">Status</label>
                    <select id="status" name="status" required class="mt-1 block w-full bg-gray-700 border-gray-600 text-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm px-4 py-3">
                        <option value="1" {{ $chamado['status'] == 1 ? 'selected' : '' }}>Aberto</option>
                        <option value="0" {{ $chamado['status'] == 0 ? 'selected' : '' }}>Fechado</option>
                    </select>
                </div>

                <!-- Botão para Enviar o Formulário -->
                <div class="mt-8">
                    <button type="submit"
                        class="w-full py-3 px-4 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md shadow-md text-sm font-medium">
                        Criar Chamado
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
