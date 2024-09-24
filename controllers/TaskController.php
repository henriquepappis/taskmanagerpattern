<?php

include_once 'repositories/TaskRepository.php';
include_once 'factories/TaskFactory.php';

class TaskController
{
    private $taskRepository;

    public function __construct()
    {
        $this->taskRepository = new TaskRepository();
    }

    public function addTask($title, $description)
    {
        $task = TaskFactory::createTask($title, $description);
        $this->taskRepository->addTask($task);
    }

    public function getAllTasks()
    {
        return $this->taskRepository->getAllTasks();
    }

    public function updateTaskStatus($id, $status)
    {
        $this->taskRepository->updateTaskStatus($id, $status);
    }

    public function deleteTask($id)
    {
        $this->taskRepository->deleteTask($id);
    }
}
