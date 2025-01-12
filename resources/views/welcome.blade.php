<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Veterinaria</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif

    <style>
    /* Header full-screen with background image */
  /* Header full-screen with background image */
header {
  background-image: url('https://facultades.unab.cl/cienciasdelavida/wp-content/uploads/2022/02/Medicina-Veterinaria.webp');
  background-size: cover;
  background-position: center;
  height: 100vh; /* Full screen height */
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
}

header h1 {
  font-size: 3rem;
  font-weight: 600;
  text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4); /* Add text shadow for visibility */
}

    /* Navigation */
    nav {
        position: absolute;
        top: 2rem;
        right: 2rem;
    }

    nav a {
        color: #800080; /* Color morado */
        padding: 0.5rem 1rem;
        text-decoration: none;
        font-weight: 600;
    }

    nav a:hover {
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 8px;
    }

    /* Main Content */
    .main-content {
        padding: 3rem 1.5rem;
        background-color: #f9fafb;
        color: #1f2937;
    }

    .main-content img {
        width: 100%;
        max-width: 800px;
        height: auto;
        border-radius: 0.375rem;
        margin-bottom: 1rem;
        transition: transform 0.3s ease;
    }

    .main-content img:hover {
        transform: scale(1.05);
    }

    /* Footer */
    footer {
        padding: 3rem 1.5rem;
        text-align: center;
        color: white;
    }

    footer p {
        margin-top: 1rem;
    }

    /* Tailwind colors for selection */
    ::selection {
        background-color: #ff2d20;
        color: white;
    }

    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }
</style>

</head>

<body class="font-sans antialiased bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-white">

    <!-- Header -->
    <header>
        <div>
            <h1>Veterinaria</h1>
            @if (Route::has('login'))
                <nav>
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <div class="flex space-x-6 text-dark">
                            <a href="{{ route('login') }}">Iniciar Sesión</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Registrar</a>
                            @endif
                        </div>
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="flex flex-col items-center space-y-6">
            <div class="flex flex-col items-center">
                <img src="https://facultades.unab.cl/cienciasdelavida/wp-content/uploads/2022/02/Medicina-Veterinaria.webp" alt="Estudiante de Medicina Veterinaria">
                <p>Estudiantes formándose en el campo de la medicina veterinaria, preparados para cuidar la salud de nuestras mascotas.</p>
            </div>

            <div class="flex flex-col items-center">
                <img src="https://i2.wp.com/enelveterinario.com/wp-content/uploads/2020/07/cardiolog%C3%ADa.jpg?ssl=1" alt="Cardiología Veterinaria">
                <p>El cuidado del corazón de los animales es fundamental en la veterinaria. La cardiología veterinaria se enfoca en diagnósticos y tratamientos especializados.</p>
            </div>

            <div class="flex flex-col items-center">
                <img src="https://cdn.royalcanin-weshare-online.io/T1ZZ4HIBBKJuub5q5HPb/v1/191-es-l-header-visita-veterinaria-gato-adulto-cats-health-and-wellbeing" alt="Visita veterinaria para gatos">
                <p>Visitas regulares al veterinario son esenciales para mantener la salud y bienestar de nuestros gatos, garantizando una vida larga y saludable.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>Veterinaria v{{ Illuminate\Foundation\Application::VERSION }}</p>
    </footer>

</body>
</html>
