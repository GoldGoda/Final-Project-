

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MARKETPLACE</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<style>
</style>

<body>
    <x-topmenu/>
    <div style="margin-top: 20px"></div>
    <main id="app">
        {{ $slot }}
    </main>
</body>
</html>
