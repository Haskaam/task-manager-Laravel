<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

public function dashboard(Request $request)
{
    if (!Auth::check()) {
        return redirect('/login');
    }

    $user = Auth::user();

    $sort = $request->query('sort', 'due_date');
    $direction = $request->query('direction', 'asc');

    $allowedSorts = ['status', 'priority', 'due_date'];

    if(!in_array($sort, $allowedSorts)) {
        $sort = 'due_date';
    }

    if(!in_array($direction, ['asc', 'desc'])) {
        $direction = 'asc';
    }

    $tasks = $user->tasks()->orderBy($sort, $direction)->get();

    return view('dashboard', [
        'tasks' => $tasks,
        'username' => $user->username,
        'sort' => $sort,
        'direction' => $direction,
    ]);
}


    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:2000',
            'priority' => 'required|in:low,medium,high',
            'due_date' => 'nullable|date',
        ]);

        Task::create([
            'user_id' => Auth::id(),
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'priority' => $data['priority'],
            'due_date' => $data['due_date'] ?? null,
        ]);
        return redirect('/dashboard');
    }

    public function update(Request $request, Task $task) {
        if($task->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validate([
            'title' => 'required|max:255|',
            'description' => 'nullable|max:2000',
            'priority' => 'required|in:low,medium,high',
            'due_date' => 'nullable|date',
        ]);

        $task->update($data);

        return redirect('/dashboard');
    }

    public function destroy(Task $task) {
        if($task->user_id !== Auth::id()) {
            abort(403);
        }

        $task->delete();

        return redirect('/dashboard');
    }

    public function updateStatus(Task $task) {
        if($task->user_id !== Auth::id()) {
            abort(403);
        }

        $newStatus = match($task->status) {
            'not_started' => 'in_progress',
            'in_progress' => 'in_review',
            'in_review' => 'done',
            'done' => 'not_started',
        };

        $task->status = $newStatus;

        $task->save();

        return redirect('/dashboard');
    }

    public function edit(Request $request, Task $task) {
        if($task->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'priority' => ['required', 'in:low,medium,high'],
            'due_date' => ['nullable', 'date'],
        ]);

        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->priority = $data['priority'];
        $task->due_date = $data['due_date'];

        $task->save();

        /*
        Równie dobrze zamiast pisać taki kod ^^^
        Można zapisać to w prostszy sposób:      $task->update($data)

        */

        return redirect('/dashboard');
    }
}
