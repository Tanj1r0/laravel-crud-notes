<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Заметки</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center p-6">

    <h1 class="text-4xl font-bold mb-8">Заметки</h1>

    <button id="createNoteBtn" 
        class="mb-6 px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
        Создать заметку
    </button>

    <div id="notesList" class="w-full max-w-xl space-y-4">
        <!-- Здесь будет список заметок -->
        <p class="text-gray-500 italic">Заметок пока нет</p>
    </div>

    <!-- Форма создания заметки (скрыта по умолчанию) -->
    <div id="createNoteForm" class="hidden w-full max-w-xl mt-6">
        <textarea id="noteContent" rows="4" 
            class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Введите текст заметки..."></textarea>
        <div class="mt-3 flex justify-end space-x-4">
            <button id="cancelBtn" class="px-4 py-2 border rounded hover:bg-gray-200 transition">Отмена</button>
            <button id="saveBtn" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">Сохранить</button>
        </div>
    </div>

    <script>
        const createNoteBtn = document.getElementById('createNoteBtn');
        const createNoteForm = document.getElementById('createNoteForm');
        const notesList = document.getElementById('notesList');
        const cancelBtn = document.getElementById('cancelBtn');
        const saveBtn = document.getElementById('saveBtn');
        const noteContent = document.getElementById('noteContent');

        createNoteBtn.addEventListener('click', () => {
            createNoteForm.classList.remove('hidden');
            createNoteBtn.classList.add('hidden');
            noteContent.focus();
        });

        cancelBtn.addEventListener('click', () => {
            createNoteForm.classList.add('hidden');
            createNoteBtn.classList.remove('hidden');
            noteContent.value = '';
        });

        saveBtn.addEventListener('click', () => {
            const text = noteContent.value.trim();
            if (text === '') {
                alert('Введите текст заметки!');
                return;
            }
            const note = document.createElement('div');
            note.className = 'bg-white p-4 rounded shadow';
            note.textContent = text;
            notesList.appendChild(note);

            noteContent.value = '';
            createNoteForm.classList.add('hidden');
            createNoteBtn.classList.remove('hidden');

            // Убрать "Заметок пока нет", если есть
            const emptyMsg = notesList.querySelector('p');
            if (emptyMsg) emptyMsg.remove();
        });
    </script>
</body>
</html>
