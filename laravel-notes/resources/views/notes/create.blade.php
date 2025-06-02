<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Создать заметку</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center bg-[#f4f4f4] font-sans">

    <div class="bg-[#fef6f9] rounded-2xl shadow-2xl w-[340px] p-6 animate-fadeIn">
        <h1 class="text-lg font-semibold text-[#4b4453] text-center mb-4">
            📝 Новая заметка
        </h1>

        <form method="POST" action="{{ route('notes.store') }}" class="space-y-4">
            @csrf

            <div>
                <label for="title" class="block text-sm text-[#555] mb-1">Заголовок:</label>
                <input type="text" name="title" id="title" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-white text-sm focus:outline-none focus:ring-2 focus:ring-[#a0c4ff]">
            </div>

            <div>
                <label for="content" class="block text-sm text-[#555] mb-1">Содержимое:</label>
                <textarea name="content" id="content"
                          class="w-full h-32 px-3 py-2 border border-gray-300 rounded-lg bg-white text-sm resize-none focus:outline-none focus:ring-2 focus:ring-[#a0c4ff]"></textarea>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('notes.index') }}"
                   class="text-[#888] text-sm hover:underline hover:text-[#555]">
                    ← Назад
                </a>

                <button type="submit"
                        class="bg-[#a0c4ff] hover:bg-[#90baff] text-white text-sm font-medium py-2 px-4 rounded-full shadow-md transition duration-200">
                    💾 Сохранить
                </button>
            </div>
        </form>
    </div>

</body>
</html>
