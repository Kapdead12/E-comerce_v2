<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MARKETCRAFT</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <!-- Custom styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="bg-gray-100 text-gray-800 antialiased">
        <div class="min-h-screen flex flex-col justify-center items-center">
            <!-- Barra de navegación -->
            <nav class="bg-white shadow-lg w-full fixed top-0">
                <div class="container mx-auto p-4 flex justify-between items-center">
                    <a href="/" class="flex items-center">
    <!-- Logotipo dentro de un contenedor circular -->
                        <div class="h-10 w-10 rounded-full overflow-hidden bg-gray-200 flex justify-center items-center">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo de Marketcraft" class="h-full w-full object-cover">
                        </div>
                        <span class="text-2xl font-bold text-gray-800 ml-3">MARKETCRAFT</span>
                    </a>
                    <div class="space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-gray-700">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-700">Iniciar Sesión</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-gray-700">Registrarse</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </nav>

            <!-- Contenido de bienvenida -->
            <div class="flex-grow flex flex-col justify-center items-center mt-16">
                <h1 class="text-4xl font-bold mb-4">Bienvenido a Mi Plataforma de E-commerce de Artesanias</h1>
                <p class="text-lg mb-8 text-gray-600">Descubre y compra productos artesanales únicos, directamente de los mejores artesanos de la región.</p>
            </div>

            <!-- Footer -->
            <footer class="bg-white w-full py-6 mt-8 shadow-inner">
                <div class="container mx-auto text-center">
                    <p class="text-gray-600">&copy; 2024 MARKETCRAFT. Todos los derechos reservados.</p>
                </div>
            </footer>
        </div>
    </body>
</html>