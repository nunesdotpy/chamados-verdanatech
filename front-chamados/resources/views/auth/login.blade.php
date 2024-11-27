@extends('.master')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-900">
    <div class="w-full max-w-md p-8 space-y-6 bg-gray-800 rounded-lg shadow-lg">
        <!-- Cabeçalho -->
        <h2 class="text-center text-3xl font-extrabold text-white">Acesso</h2>
        
        <!-- Formulário -->
        <form action="{{ route('login') }}" method="POST" class="mt-8 space-y-6">
            @csrf
            
            <div class="rounded-md shadow-sm -space-y-px">
                <!-- E-mail -->
                <div>
                    <label for="email-address" class="sr-only">Email</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required
                        class="appearance-none rounded-none relative block w-full px-4 py-3 border border-gray-600 text-gray-300 bg-gray-700 rounded-t-md focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm"
                        placeholder="Email address">
                </div>

                <!-- Senha -->
                <div>
                    <label for="password" class="sr-only">Senha</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="appearance-none rounded-none relative block w-full px-4 py-3 border border-gray-600 text-gray-300 bg-gray-700 rounded-b-md focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm"
                        placeholder="Password">
                </div>
            </div>
            
            <!-- Erro de Login -->
            @if(Session::has('error'))
                <div class="text-red-500 text-sm mt-2 text-center">
                    {{ Session::get('error') }}
                </div>
            @endif
            <!-- Sucesso -->
            @if(Session::has('success'))
                <div class="text-green-500 text-sm mt-2 text-center">
                    {{ Session::get('success') }}
                </div>
            @endif
    
            <!-- Botão de Login -->
            <div>
                <button type="submit"
                    class="group mt-8 relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Entrar
                </button>
            </div>

            <!-- Link para registro -->
            <div class="mt-4 text-center">
                <a href="{{ route('register') }}" class="font-medium text-green-600 hover:text-green-500">
                    Registrar nova conta
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
