<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 text-center">
        <h1 class="display-3">403</h1>
        <h2>Anda tidak memiliki akses ke halaman ini.</h2>
        <p class="text-danger">
            <!-- Add a conditional message here if necessary -->
        </p>
        <p>Silakan kembali ke <a href="/">halaman utama</a>.</p>
        <form action="/logout" method="POST" class="mt-4">
            <!-- Tambahkan token CSRF untuk keamanan -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</body>

</html>
