<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;

use App\Task;
use App\State;
class TaskController extends Controller
{
    public function index(Request $req)
    {
      $tasks = Task::orderBy('created_at', 'asc')->select('name')->get();

      if ($req->isJson())
      {
        return $tasks;
      }
      else
      {
        return view('tasks', [
            'tasks' => $tasks
        ]);
      }
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([], 400);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->state_id = State::First()->id;
        $task->save();

        return response()->json([]);
    }

    public function delete(Task $task) {
        $task->delete();

        return redirect('/');
    }
}
