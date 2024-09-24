<?php

include_once 'models/Database.php';
include_once 'models/Task.php';

class TaskRepository
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function addTask(Task $task)
    {
        $stmt = $this->db->prepare("INSERT INTO tasks (title, description, status) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $task->getTitle(), $task->getDescription(), $task->getStatus());
        $stmt->execute();
        $stmt->close();
    }

    public function getAllTasks()
    {
        $tasks = [];
        $sql = "SELECT * FROM tasks";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $task = new Task($row['title'], $row['description'], $row['status']);
                $task->setId($row['id']);
                $tasks[] = $task;
            }
        }
        return $tasks;
    }

    public function updateTaskStatus($id, $status)
    {
        $stmt = $this->db->prepare("UPDATE tasks SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteTask($id)
    {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
