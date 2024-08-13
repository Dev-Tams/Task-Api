<?php

namespace App\Http\Controllers\Api;


use App\Enums\TaskStatus as EnumsTaskStatus;
use App\Models\Task;
use Apps\Enums\TaskStatus;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use App\Transformers\TaskTransformer;

/**
 * @group Web
 * 
 * @subgroup Tasks
 * 
 * @subgroupDescription api endpoints for tasks
 * 
 * 
 **/

class TaskController extends Controller
{
    /**
     * Shows all task for a single user
     * 
     * @response 200
     */
    public function index()
    {
        $tasks = Task::all();

        
       $task = fractal($tasks, new TaskTransformer)
       ->toArray();
       $task = $task['data'];
        return response()->json($tasks);
    }

    /**
     * Creates a new tasks
     * 
     * @Response 200
     */
    public function store(TaskRequest $request, TaskTransformer $transformer)
    {
        
        $task = $request->validated();
        
      $status = EnumsTaskStatus::PENDING->value;
        $tasks = Task::create([
            "name" => $task['name'],
            "description" => $task['description'],
            "task_status" => $status
        ]);


       
       $response = $transformer->transform($tasks);

        return response()->json($response);
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

        $tasks = $request->validated();
        
        $task->update([
            "name" => $request->name,
            "description" => $request->description,
            "task_status" => $request->task_status
        ]);


        $transformer = new TaskTransformer();
        $response = $transformer->transform($task);
        return response()->json($response);
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
