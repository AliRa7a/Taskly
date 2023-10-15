<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::where('user_id', Auth::user()->id)->get();

        if ($request->has('sort')) {
            $sortField = $request->input('sort');

            // Make sure $sortField is a valid field to avoid potential security issues
            $validFields = ['priority', 'due_date'];

            if (in_array($sortField, $validFields)) {
                $tasks = $tasks->sortBy($sortField);
            }
        }

        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'due_date' => 'required|date',
            'priority' => 'required|in:low,medium,high',
        ]);

        // Create a new task
        Task::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'due_date' => $validatedData['due_date'],
            'priority' => $validatedData['priority'],
            'user_id' => auth()->id(), // Associate the task with the logged-in user
        ]);
        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }
    public function edit(string $id){
        $task = DB::table('tasks')->find($id);
        return view('tasks.update',['task'=>$task]);
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'due_date' => 'required|date',
            'priority' => 'required|in:low,medium,high',
        ]);

        DB::table('tasks')->where('id', $id)->update($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }
    public function destroy($id){
        Task::find($id)->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');

    }

}
