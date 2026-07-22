<form method="POST" action="/tasks">
    @csrf

    <input type="text" name="title" placeholder="Tytuł"><br>

    <textarea name="description" placeholder="Opis"></textarea><br>

    <select name="priority">
        <option value="low">Niski</option>
        <option value="medium">Średni</option>
        <option value="high">Wysoki</option>
    </select><br>

    <input type="date" name="due_date"><br>

    <button type="submit">Dodaj</button>
</form>
