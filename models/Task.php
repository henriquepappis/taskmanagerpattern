<?php

class Task
{
    private $id;
    private $title;
    private $description;
    private $status;

    public function __construct($title, $description, $status = 'pending')
    {
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getStatus()
    {
        return $this->status;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}
