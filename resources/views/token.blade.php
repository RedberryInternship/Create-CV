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
        <form action="/" method="post">
            @csrf
            <button type="submit" class="px-10 py-4 rounded bg-sky-700 text-white cursor-pointer">
                Generate token
            </button>
        </form>
        <a href="{{ route('swagger') }}"
            class="mt-2 text-blue-500 underline transition duration-150 ease-in-out hover:text-blue-600">visit api
            specs</a>
        @if ($token)
            <div class="mt-8 max-w-3xl bg-white p-6 dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg w-full">
                <div " class="flex justify-between items-center"><span id="token">{{ $token }}</span>
                    <button
                        id="copy-button"
                        class="flex items-center relative justify-center transition-all duration-200 ease-in-out w-20 h-10 rounded-lg  border  border-green-400">
                        <span id="copy-text" class="absolute transition-all duration-150 ease-in-out">Copy</span>
                        <span id="copied-text" class="opacity-0 text-gray-400 transition-all duration-150 ease-in-out absolute">Copied</span>
                    </button>
                </div>
            </div>
 @endif
                </div>
                <script src={{ mix('js/app.js') }}></script>
</body>

</html>
