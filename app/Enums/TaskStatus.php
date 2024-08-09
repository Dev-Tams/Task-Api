<?php

namespace App\Enums;

enum TaskStatus: string
{
    CASE PENDING = "Pending";
    CASE IN_PROGRESS = "In_progress";
    CASE COMPLETED = "Completed";
}