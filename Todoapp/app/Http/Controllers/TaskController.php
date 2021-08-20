<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function createtask(Request $request)
    {
        $request->validate([
            'taskname' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
        $createtask = new todo();
        $createtask->taskname = $request->taskname;
        $createtask->description = $request->description;
        $createtask->status = $request->status;
        $createtask->save();


        return response()->json([
            "message" => "Task succsessfully created!"
        ]);


    }

    public function gettasks()
    {
        $tasks = DB::table('todo')->get();
        return response()->json([
            'Task' => $tasks
        ]);

    }

    public function gettasskbyname($taskname)
    {
        $task = DB::table('todo')->where('taskname', $taskname)->first();
        return response()->json([
            'TaskbyName' => $task
        ]);
    }

    public function gettaskbyid($id)
    {
        $task = DB::table('todo')->where('id', $id)->first();
        return response()->json([
            'task' => $task
        ]);
    }

    public function deletetask($id)
    {
        DB::table('todo')->delete($id);
        return response()->json([
            "message" => "deleted"
        ]);
    }

    public function updatetaskstatus(Request $request,todo $task,$id)
    {
        $task = DB::table('todo')->where('id',$id)->update(['status'=>$request->status]);
        return response()->json([
            "message" => "status updated successfully"
        ]);


    }

}

