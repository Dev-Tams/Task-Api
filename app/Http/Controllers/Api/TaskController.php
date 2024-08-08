<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //returns all tasks
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create a task
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        
        $task = $request->validated();
        

        $tasks = Task::create([
            "name" => $task['name'],
        ]);

        return response()->json(['message', 'task created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $id)
    {
        //fetch task by id 
        //return

        $tasks = Task::findOrFail($id);

        return response()->json($tasks);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $taskModel)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $id)
    {
        //

        $tasks = Task::findOrFail($id);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $taskModel)
    {
        //
    }
}
