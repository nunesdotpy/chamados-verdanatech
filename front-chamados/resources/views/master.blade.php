<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased bg-gray-900 dark:text-white/50">
    <div class="w-full max-w-5xl p-8 m-auto space-y-6 bg-gray-800 rounded-lg shadow-lg">
        <!-- Área de Perfil no Cabeçalho -->
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center space-x-4">
                <span class="text-xl font-semibold text-white">@yield('title')</span>
            </div>
            <div class="flex items-center space-x-4">
                <!-- Nome do usuário e botão de Logout -->
                <span class="text-sm font-medium text-gray-300">Olá, <span class="text-white">{{$user['name']}}</span></span>
                <a href="{{route('logout')}}" class="text-sm text-red-500 hover:text-red-600 font-medium">Logout</a>
            </div>
        </div>
    </div>
    @yield('content')
</body>

</html>