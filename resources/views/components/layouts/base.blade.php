@props([
'pageTitle' => '',
])
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="key" content="">
    <meta name="description" content="">
    <meta name="author" content="Ezeh Kingsley: kingsley.uchenna.ezeh@gmail.com">
    <title>TODO</title>
    <link rel="icon" type="image/x-icon" href="">
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
{{ $slot }}
@livewireScriptConfig
</body>
</html>
