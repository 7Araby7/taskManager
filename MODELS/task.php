<?php

class Task
{
    private $conexao;

    public function __construct($cone)
    {
        $this->conexao = $cone;
    }

    public function list_tasks($user_id)
    {
        $sql = "SELECT * FROM tasks WHERE user_id = :user_id ORDER BY scheduled_date";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function add_task($user_id, $task, $description, $scheduled_date)
    {
        $sql = "INSERT INTO tasks (user_id, task, description, scheduled_date) VALUES (:user_id, :task, :description, :scheduled_date)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':task', $task);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':scheduled_date', $scheduled_date);
        return $stmt->execute();
    }

    public function edit_task($task_id, $new_task, $description, $scheduled_date)
    {
        $sql = "UPDATE tasks SET task = :new_task, description = :description, scheduled_date = :scheduled_date WHERE id = :task_id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':new_task', $new_task);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':scheduled_date', $scheduled_date);
        $stmt->bindParam(':task_id', $task_id);
        return $stmt->execute();
    }


    public function delete_task($task_id)
    {
        $sql = "DELETE FROM tasks WHERE id = :task_id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':task_id', $task_id);
        return $stmt->execute();
    }

    public function get_task($task_id)
    {
        $sql = "SELECT * FROM tasks WHERE id = :task_id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':task_id', $task_id);
        $stmt->execute();
        return $stmt->fetch();
    }

}
