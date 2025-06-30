<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SPK Prestasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to right, #667eea, #764ba2);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center py-10 px-4">

    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl flex flex-col lg:flex-row overflow-hidden">

        <!-- Left Side: Login Form -->
        <div class="w-full lg:w-1/2 p-8 md:p-10">
            <div class="text-center mb-6">
                <img src="{{ asset('images/logo_dikbud.png') }}" alt="Logo Sekolah" class="mx-auto h-20 mb-4">
                <h2 class="text-3xl font-bold text-gray-800">Login Admin</h2>
                <p class="text-gray-600 mt-1 text-sm">SPK Siswa Berprestasi SDN 2 Sepit</p>
            </div>

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
                    <input type="email" name="email" id="email" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           placeholder="admin@example.com" autofocus>
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
                    <input type="password" name="password" id="password" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           placeholder="••••••••">
                </div>

                <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-lg transition duration-300">
                    Login
                </button>
            </form>
        </div>

        <!-- Right Side: Illustration -->
        <div class="w-full lg:w-1/2 bg-gradient-to-br from-indigo-500 to-purple-600 text-white flex items-center justify-center p-8">
            <div class="text-center">
                <img src="{{ asset('images/ilustasi1.png') }}" alt="Ilustrasi Siswa" class="mb-6 w-60 h-auto mx-auto rounded-xl shadow-xl">
                <h3 class="text-2xl font-bold mb-2">Sistem Pendukung Keputusan</h3>
                <p class="text-md font-light">Penentuan Siswa Berprestasi pada SDN 2 Sepit</p>
            </div>
        </div>
    </div>

</body>
</html>
