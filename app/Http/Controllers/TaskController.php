<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::user()->id)->get();

        return view('tasks.index', compact('tasks'));
    }
}
