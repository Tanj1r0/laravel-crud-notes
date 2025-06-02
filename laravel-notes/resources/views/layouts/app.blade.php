<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заметки</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite('resources/css/app.css')
    <style>
        /* Анимации */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .animate-fadeIn {
            animation: fadeIn 0.5s ease forwards;
        }

        * {
            font-size: 13px;
        }

        a {
            text-decoration: none;
            color: #4b4453;
        }

        a:hover {
            color: #333;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-[#f4f4f4] font-sans">

    <div class="bg-[#fef6f9] w-[320px] rounded-2xl shadow-2xl p-5 animate-fadeIn">
        @yield('content')
    </div>

</body>
</html>
