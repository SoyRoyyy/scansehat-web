<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ScanSehat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen overflow-hidden grid grid-cols-1 md:grid-cols-2">

    <!-- LEFT SIDE BACKGROUND + LOGO --> 
    <div class="relative hidden md:flex items-center justify-center p-8 md:p-10 
    bg-gradient-to-br from-[#c8d3c1] to-[#9aa89f] min-h-0">
        <div class="text-center text-gray-200">
            <img src="{{ asset('images/logo_login.png') }}" 
                alt="Login Logo" 
                class="w-64 md:w-72 mx-auto max-h-[70vh] object-contain" />
        </div>
    </div>


    <!-- RIGHT SIDE - LOGIN FORM -->
    <div class="flex flex-col justify-center px-6 py-8 md:px-10 md:py-16 bg-[#7c8a85]/100 backdrop-blur-sm min-h-0">
        <div class="w-full max-w-xl mx-auto">
            <h1 class="text-2xl md:text-3xl font-bold text-white leading-tight">Halo!<br class="md:hidden">Selamat datang kembali<br class="hidden md:inline">di ScanSehat</h1>
            
            <p class="text-white mt-3 mb-6 md:mb-8 font-medium text-sm md:text-base">Silakan masuk!</p>

            <form method="POST" action="{{ route('login') }}" class="space-y-4 md:space-y-6 w-full max-w-sm">
                @csrf

                <div class="space-y-1">
                    <label class="text-white text-xs md:text-sm">E-Mail</label>
                    <div class="flex items-center gap-2 bg-[#e9e8d6] px-3 py-2 md:px-4 md:py-3 rounded-lg">
                        <span class="text-sm">📧</span>
                        <input type="email" name="email" class="w-full bg-transparent focus:outline-none text-sm md:text-base" placeholder="you@example.com" required>
                    </div>
                </div>

                <div class="space-y-1">
                    <label class="text-white text-xs md:text-sm">Password</label>
                    <div class="flex items-center gap-2 bg-[#e9e8d6] px-3 py-2 md:px-4 md:py-3 rounded-lg">
                        <span class="text-sm">🔒</span>
                        <input type="password" name="password" class="w-full bg-transparent focus:outline-none text-sm md:text-base" placeholder="••••••••" required>
                    </div>
                    <a href="#" class="text-xs text-white/80 hover:underline block text-right">Lupa Password?</a>
                </div>

                <button class="w-full py-2.5 md:py-3 rounded-lg font-semibold bg-[#b5b38e] text-white hover:bg-[#a8a683] transition">Masuk</button>
            </form>

            <p class="text-white mt-4 md:mt-6 text-xs md:text-sm">Belum punya akun? <a href="{{ route('register') }}" class="underline">Daftar</a></p>
        </div>
    </div>

</body>
</html>
