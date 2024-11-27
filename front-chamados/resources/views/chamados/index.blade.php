@extends('.master')

@section('title', 'Dashboard de Chamados')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-900">


        <div class="w-full max-w-5xl p-8 space-y-6 bg-gray-800 rounded-lg shadow-lg">
            <h2 class="text-center text-3xl font-extrabold text-white">Dashboard de Chamados</h2>

            <div class="flex justify-center">
                {{-- // with error --}}
                @if(Session::has('error'))
                    <div class="alert alert-error">
                        {{ Session::get('error') }}
                    </div>
                @endif
                {{-- // with success --}}
                @if(Session::has('success'))
                    <div class="alert alert-success m-4">
                        {{ Session::get('success') }}
                    </div>
                @endif
            </div>
    

            <!-- Filtro de Chamados -->
            <a href="{{route('chamado.create')}}" class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md shadow-md">
                Novo Chamado
            </a>

            <!-- Lista de Chamados -->
            <div class="overflow-hidden bg-gray-800 shadow sm:rounded-md">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">
                                Título</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Descrição
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">
                                Status</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-300 uppercase">
                                Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @if($chamados == [])
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-300" colspan="5">Nenhum
                                    chamado encontrado</td>
                            </tr>
                        @endif
                        @foreach($chamados as $key => $chamado)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-300">{{$key}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{$chamado["title"]}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{$chamado["description"]}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-indigo-500">{{$chamado["status"] ? "Aberto" : "Fechado"}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-right font-medium">
                                    <a href="{{route('chamado.edit', $chamado['id'])}}" class="text-indigo-400 hover:text-indigo-500">Visualizar</a>
                                    <a href="{{ route('chamado.destroy', $chamado['id']) }}" class="ml-4 text-red-400 hover:text-red-500">Excluir</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
