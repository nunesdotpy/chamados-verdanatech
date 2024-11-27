@extends('.master')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-900">
    <div class="w-full max-w-md p-8 space-y-6 bg-gray-800 rounded-lg shadow-lg">
        <!-- Cabeçalho -->
        <div class="mb-6 text-center">
            <span class="text-3xl font-extrabold text-white">Criar Conta</span>
        </div>

        <!-- Formulário de Registro -->
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <!-- Nome -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-300">Nome</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required class="mt-1 block w-full bg-gray-700 border-gray-600 text-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm px-4 py-3" placeholder="Seu nome">
                @error('name')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- E-mail -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-300">E-mail</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required class="mt-1 block w-full bg-gray-700 border-gray-600 text-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm px-4 py-3" placeholder="Seu e-mail">
                @error('email')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Senha -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-300">Senha</label>
                <input id="password" name="password" type="password" required class="mt-1 block w-full bg-gray-700 border-gray-600 text-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm px-4 py-3" placeholder="Sua senha">
                @error('password')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirmação de Senha -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300">Confirmar Senha</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required class="mt-1 block w-full bg-gray-700 border-gray-600 text-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm px-4 py-3" placeholder="Confirme sua senha">
            </div>

            <!-- Botão de Registro -->
            <div class="mt-8">
                <button type="submit" class="w-full py-3 px-4 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md shadow-md text-sm font-medium">
                    Registrar
                </button>
            </div>
        </form>

        <!-- Link de login -->
        <div class="mt-6 text-center text-sm">
            <span class="text-gray-400">Já tem uma conta? </span>
            <a href="{{ route('login') }}" class="text-indigo-500 hover:text-indigo-600">Faça login</a>
        </div>
    </div>
</div>
@endsection
