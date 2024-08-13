<?php

namespace App\Transformers;
use League\Fractal;

use App\Models\Task;


class TaskTransformer extends Fractal\TransformerAbstract
{


    public function transform(Task $task)
    {

        return [
            "name" => $task->name,
            "description" => $task->description,
            "task_status" => $task->task_status
        ];
    }
}
