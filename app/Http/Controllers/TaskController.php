<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\TaskSubmission;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('admin.tugas.index', compact('tasks'));
    }

    public function indexMahasiswa()
    {
        $tasks = Task::all();
        return view('mahasiswa.tugas.index', compact('tasks'));
    }

    public function create()
    {
        return view('admin.tugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'submission_type' => 'required|in:file,online_text',
        ]);

        Task::create($request->all());

        return redirect()->route('admin.tugas.index')->with('success', 'Task created successfully');
    }

    public function show(Task $task)
    {

        return view('admin.tugas.show', compact('task'));
    }

    public function showMahasiswa(Task $task)
    {
        $submission = TaskSubmission::where('task_id', $task->id)
            ->where('user_id', Auth::id())
            ->first();

        return view('mahasiswa.tugas.show', compact('task', 'submission'));
    }

    public function edit(Task $task)
    {
        dd($task->getAttributes());
        return view('admin.tugas.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'submission_type' => 'required|in:file,online_text',
        ]);

        $task->update($request->all());

        return redirect()->route('admin.tugas.index')->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('admin.tugas.index')->with('success', 'Task deleted successfully');
    }

    public function submit(Request $request, Task $task)
    {
        $request->validate([
            'file' => $task->submission_type == 'file' ? 'required|file|max:10240' : '',
            'online_text' => $task->submission_type == 'online_text' ? 'required|string' : '',
        ]);

        $submissionData = [
            'user_id' => Auth::id(),
            'task_id' => $task->id,
        ];

        if ($task->submission_type == 'file' && $request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('public/file');
            $submissionData['file_path'] = $path;
        } elseif ($task->submission_type == 'online_text') {
            $submissionData['online_text'] = $request->input('online_text');
        }

        TaskSubmission::create($submissionData);

        return redirect()->route('mahasiswa.tugas.show', $task->id)->with('success', 'Task submitted successfully');
    }
}
