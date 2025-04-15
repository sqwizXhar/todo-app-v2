<!DOCTYPE html>
<html>
<head>
    <title>Laravel React</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.jsx'])
</head>
<body>
    <div id="task-form"></div>
</body>
</html>
