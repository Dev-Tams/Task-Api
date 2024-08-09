<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    /**
     * Shows all task for a single user
     * 
     * @response 200
     */
    public function index()
    {
        //returns all tasks
    }

    /**
     * Creates a new tasks
     * 
     * @Response 200
     */
    public function store(TaskRequest $request)
    {
        
        $task = $request->validated();
        

        $tasks = Task::create([
            "name" => $task['name'],
            "description" => $task['description']
        ]);

        return response()->json(['message', 'task created']);
    }

    /**
     * Fetches a single task by id
     * 
     * @response 200
     */
    public function show(Task $task)
    {

        return response()->json($task);
    }

   
    /**
     * Edits a task by id
     */
    public function update(TaskRequest $request, Task $task)
    {

        $task = $request->validated();
        
        $task->update([
            "name" => $request->name,
            "description" => $request->description,
        ]);


        return response()->json(["message" => "Task updated"]);
    }

    /**
     * Deletes a task 
     * 
     * @response 204
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();

        return response()->noContent();
    }
}
