<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property string $name
 * @property string $decription
 * @property string $task_status
 */

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "task_status"
    ];
}
