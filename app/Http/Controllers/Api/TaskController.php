<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
class TaskController extends Controller
{
  public function show() {
    return response()->json([
        'tasks' => Task::all()
    ]);

        foreach (Task::all() as $task) {
        /*return response()->json([
        'titulo' => $task->titulo,
        'descricao' => $task->descricao,
        'status' => $task->status
        ]);*/

    }
    }

    public function addTask(Request $request) {
        $validator = Validator::make($request->all(), [
        'titulo' => 'required|string|max:191',
        'descricao' => 'required|string|max:191',
        'status' => 'required|string|max:191',
    ]);

    if ($validator->fails()) {

        return response()->json ([
            'status' =>422,
        'errors' => $validator->messages()
        ], 422);
    } else {
        $task = Task::create([
        'titulo' => $request->titulo,
        'descricao' => $request->descricao,
        'status' => $request->status,
        ]);

        if($task) {
        return response()->json ([
            'status' =>200,
            'message' => 'success'
        ], 200);
        } else {
        return response()->json ([
            'status' =>500,
            'message' => 'fail'
        ], 500);
        }
    }
    }

    public function taskId($id) {
        $task = Task::find($id);
    if ($task) {
        return response()->json ([
        'status' =>200,
        'message' => $task
        ], 200);
    } else {
        return response()->json ([
        'status' =>404,
        'message' => 'not found'
        ], 404);
    }
    }

    public function edit($id) {
      $task = Task::find($id);
  if ($task) {
      return response()->json ([
      'status' =>200,
      'message' => $task
      ], 200);
  } else {
      return response()->json ([
      'status' =>404,
      'message' => 'not found'
      ], 404);
  }
  }

  public function update(Request $request, int $id) {

      $validator = Validator::make($request->all(), [
      'titulo' => 'required|string|max:191',
      'descricao' => 'required|string|max:191',
      'status' => 'required|string|max:191',
  ]);

  if ($validator->fails()) {

      return response()->json ([
          'status' =>422,
      'errors' => $validator->messages()
      ], 422);
  } else {
      $task = Task::find($id);
      $task->update([
      'titulo' => $request->titulo,
      'descricao' => $request->descricao,
      'status' => $request->status,
      ]);

      if($task) {
      return response()->json ([
          'status' =>200,
          'message' => 'success'
      ], 200);
      } else {
      return response()->json ([
          'status' =>500,
          'message' => 'fail'
      ], 500);
      }
  }
  }

  public function delete($id) {
      $task = Task::find($id);
  if ($task) {
     $task->delete();
      return response()->json ([
      'status' =>200,
      'message' => 'success'
      ], 200);
  } else {
      return response()->json ([
      'status' =>404,
      'message' => 'not found'
      ], 404);
  }
  }
}
