<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>Login Modern</title>
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8">
       @yield('content')
    </div>

</body>
</html>