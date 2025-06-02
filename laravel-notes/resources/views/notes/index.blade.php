<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Заметки</title>
    @vite('resources/css/app.css')
    <style>
        /* Простые анимации */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fadeIn     { animation: fadeIn 0.5s ease forwards; }
        .animate-fadeInUp   { animation: fadeInUp 0.6s ease forwards; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-[#f4f4f4] font-sans">

    <!-- Квадратный контейнер -->
    <div class="bg-[#fef6f9] rounded-2xl shadow-2xl w-[500px] h-[500px] p-4 overflow-y-auto animate-fadeIn">

        <!-- Заголовок -->
        <h1 class="text-lg font-semibold text-[#4b4453] text-center mb-3 animate-fadeInUp">
            Мои заметки
        </h1>

        <!-- Сообщение об успехе -->
        @if(session('success'))
            <div class="mb-3 p-2 bg-[#e0f7e9] border border-[#a7d7c5] text-[#2e7d61] rounded shadow-sm text-xs animate-fadeInUp">
                {{ session('success') }}
            </div>
        @endif

        <!-- Кнопка “Создать” -->
        <form action="{{ route('notes.create') }}" method="GET" class="text-center animate-fadeInUp">
            <button type="submit"
                class="bg-[#a0c4ff] hover:bg-[#90baff] text-white text-sm font-medium py-2 px-4 rounded-full shadow-md transition duration-200">
                ✨ Создать заметку
            </button>
        </form>

        <!-- Список заметок -->
        <ul class="space-y-2 max-h-[350px] overflow-y-auto pr-1 animate-fadeInUp text-sm">
            @forelse ($notes as $note)
                <li class="bg-[#fffdf8] rounded p-2 shadow hover:bg-[#f9f9f9] transition-colors">
                    <h2 class="text-sm font-semibold text-[#444] mb-1 truncate">
                        {{ $note->title }}
                    </h2>
                    <p class="text-[#666] text-xs mb-2 line-clamp-2">
                        {{ $note->content }}
                    </p>
                    <div class="flex justify-end gap-1">
                        <!-- Редактировать -->
                        <form action="{{ route('notes.edit', $note->id) }}" method="GET">
                            <button type="submit"
                                class="bg-[#ffd6a5] hover:bg-[#ffc48f] text-white text-xs py-0.5 px-2 rounded">
                                ✎
                            </button>
                        </form>
                        <!-- Удалить -->
                        <form action="{{ route('notes.destroy', $note) }}" method="POST"
                              onsubmit="return confirm('Удалить эту заметку?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-[#ffadad] hover:bg-[#ff9999] text-white text-xs py-0.5 px-2 rounded">
                                🗑
                            </button>
                        </form>
                    </div>
                </li>
            @empty
                <li class="text-center text-[#888] italic text-xs">
                    Заметок пока нет.
                </li>
            @endforelse
        </ul>

    </div>

</body>
</html>
