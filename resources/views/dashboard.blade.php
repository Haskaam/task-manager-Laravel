<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>

<header>

    <h1>TaskManager</h1>

    <span class="nav">
        Witaj, {{$username}}
    </span>

</header>

<div class="content">

    <aside>

        <h3>Panel boczny</h3>

        <form method="POST" action="/logout">
            @csrf

            <button type="submit" id="logout-btn" name="logout" class="logout-form">Wyloguj się</button>
        </form>

    </aside>

    <main>

    <section class="task_nav">
        <!--##################################### DODAWANIE ZADANIA ############################################### -->

        <button type="button" id="openAddModal" class="add-btn">+Dodaj zadanie</button>

        <div class="modal" id="taskAddModal">
            <div class="modal-content">
                <button type="button" id="closeAddModal">x</button>

                <h2>Dodaj zadanie</h2>

                <form method="POST" action="/tasks">
                    @csrf

                    <input type="text" name="title" placeholder="Tytuł zadania"><br>

                    <textarea name="description" placeholder="Opis zadania"></textarea><br>

                    <select name="priority">
                        <option value="low">Niski</option>
                        <option value="medium">Średni</option>
                        <option value="high">Wysoki</option>
                    </select><br>

                    <input type="date" name="due_date"><br>

                    <button type="submit">Dodaj</button>
                </form>
            </div>
        </div>

    </section>

    <section class="tasks_section">
            <table class="tasks_table">
                <thead>
                    <tr>
                        <th>Tytuł</th>
                        <th>Opis</th>
                        <th>
                            <a href="/dashboard?sort=status&direction={{$sort === 'status' && $direction === 'asc' ? 'desc' : 'asc'}}">Status</a>
                        </th>
                        <th>
                            <a href="/dashboard?sort=priority&direction={{$sort === 'priority' && $direction === 'asc' ? 'desc' : 'asc'}}">Priorytet</a>
                        </th>
                        <th>
                            <a href="/dashboard?sort=due_date&direction={{$sort === 'due_date' && $direction === 'asc' ? 'desc' : 'asc'}}">Termin</a>
                        </th>
                        <th>Akcje</th>
                    </tr>
                </thead>

                @php
                    $priorityLabels = [
                        'low' => 'Niski',
                        'medium' => 'Średni',
                        'high' => 'Wysoki',
                    ];

                    $statusLabels = [
                        'not_started' => 'Nie rozpoczęto',
                        'in_progress' => 'W trakcie',
                        'in_review' => 'Do sprawdzenia',
                        'done' => 'Zrobione',
                    ];
                @endphp
                <tbody>
                    @foreach ($tasks as $task)


                    <div class="modal" id="taskEditModal-{{$task->id}}">
            <div class="modal-content">
                <button type="button" class="closeEditModal" data-task-id="{{$task->id}}">x</button>

                <h2>Dodaj zadanie</h2>

                <form method="POST" action="/tasks/{{$task->id}}">
                    @csrf
                    @method('PATCH')

                    <input type="text" name="title" value="{{$task->title}}"><br>

                    <textarea name="description" placeholder="Opis zadania">{{$task->description}}</textarea><br>

                    <select name="priority">
                        <option value="low">Niski</option>
                        <option value="medium">Średni</option>
                        <option value="high">Wysoki</option>
                    </select><br>

                    <input type="date" name="due_date" value="{{$task->due_date}}"><br>

                    <button type="submit">Edytuj</button>
                </form>
            </div>
        </div>


                    <tr>
                        <td>{{$task->title}}</td>
                        <td>{{$task->description}}</td>
                        <td class="status">
                            <form method="POST" action="/tasks/{{$task->id}}/status">
                                @csrf
                                @method('PATCH')

                                <button type="submit" class="status-btn">
                                    {{$statusLabels[$task->status] ?? $task->status}}
                                </button>
                            </form>
                        </td>
                        <td>{{$priorityLabels[$task->priority]}}</td>
                        <td>{{$task->due_date}}</td>
                        <td class="actions">

                            <button type="button" id="edit" class="openEditModal"  data-task-id="{{$task->id}}">Edytuj</button><br>

                            <form method="POST" action="/tasks/{{$task->id}}">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="delete" onclick="return confirm('Czy na pewno chcesz usunąć zadanie: ({{$task->title}})')">
                                    Usuń
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </section>

    </main>

</div>

<footer>

    2026 TaskManager. Wszystkie prawa zastrzeżone.

</footer>
<script>
    const addModal = document.getElementById('taskAddModal');
    const openAddModal = document.getElementById('openAddModal');
    const closeAddModal = document.getElementById('closeAddModal');

    openAddModal.addEventListener('click', () => {
        addModal.classList.add('active');
    });

    closeAddModal.addEventListener('click', () => {
        addModal.classList.remove('active');
    })

    // Koniec dodowania

    //Skrypt edytowania

    const editButtons = document.querySelectorAll('.openEditModal');
    const openEditModal = document.getElementById('openEditModal');
    const closeEditButtons = document.querySelectorAll('.closeEditModal');

    editButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const taskId = button.dataset.taskId;
            const editModal = document.getElementById(`taskEditModal-${taskId}`);

            editModal.classList.add('active');
        });
    });

    closeEditButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const taskId = button.dataset.taskId;
            const editModal = document.getElementById(`taskEditModal-${taskId}`);

            editModal.classList.remove('active');
        });
    });
</script>
</body>
</html>
