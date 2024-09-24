<?php

include_once 'models/Task.php';

class TaskFactory
{
    public static function createTask($title, $description)
    {
        return new Task($title, $description);
    }
}
