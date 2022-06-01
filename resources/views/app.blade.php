<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <link href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" rel="stylesheet"/>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ url('img/GalaxyGym.jpg') }}">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet"/>

    <script src="{{ mix('/js/manifest.js') }}" defer></script>
    <script src="{{ mix('/js/vendor.js') }}" defer></script>
    <script src="{{ mix('/js/app.js') }}" defer></script>
</head>
<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">
@inertia

</body>
</html>
