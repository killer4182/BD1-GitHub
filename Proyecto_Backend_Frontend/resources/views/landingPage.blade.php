<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-md w-full space-y-8 p-8 bg-white rounded-lg shadow-md text-center">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Bienvenido
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Por favor, seleccione una opción para continuar
            </p>
        </div>
        
        <div class="mt-8 space-y-4">
            <a href="{{ route('register') }}" 
               class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Registrarse
            </a>
            
            <a href="{{ route('login') }}" 
               class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Iniciar Sesión
            </a>
        </div>
    </div>
</div>
