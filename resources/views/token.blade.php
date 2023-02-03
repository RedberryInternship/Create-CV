<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Redberry - Redberian Bootcamp 2023 Winter 🚀</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
</head>

<body>
    <div class=" flex flex-col bg-gray-100 justify-center items-center h-screen w-screen">
        <h1 class="text-5xl text-center text-cyan-700 mb-10">Welcome to Redberian Bootcamp <br>🚀 2023 Winter</h1>
        
        <a href="{{ route('swagger') }}"
            class="mt-2 text-blue-500 underline transition duration-150 ease-in-out hover:text-blue-600">visit api
            specs
        </a>
        
    </div>
    <script src={{ mix('js/app.js') }}></script>
</body>

</html>
