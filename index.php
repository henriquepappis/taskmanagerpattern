<?php

include_once 'controllers/TaskController.php';

$taskController = new TaskController();

// Adicionar tarefa
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $taskController->addTask($title, $description);
}

// Atualizar status da tarefa
if (isset($_GET['complete'])) {
    $id = $_GET['complete'];
    $taskController->updateTaskStatus($id, 'completed');
}

// Excluir tarefa
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $taskController->deleteTask($id);
}

$tasks = $taskController->getAllTasks();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>

    <!-- Formulário para adicionar tarefas -->
    <form method="POST">
        <input type="text" name="title" placeholder="Título da Tarefa" required>
        <textarea name="description" placeholder="Descrição"></textarea>
        <button type="submit" name="add">Adicionar Tarefa</button>
    </form>

    <!-- Listagem de tarefas -->
    <h2>Lista de Tarefas</h2>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <div>
                    <strong><?php echo htmlspecialchars($task->getTitle()); ?></strong> -
                    <?php echo htmlspecialchars($task->getDescription()); ?> -
                    Status: <?php echo $task->getStatus(); ?>
                </div>
                <div>
                    <?php if ($task->getStatus() === 'pending'): ?>
                        <a href="?complete=<?php echo $task->getId(); ?>">Concluir</a>
                    <?php endif; ?>
                    <a href="?delete=<?php echo $task->getId(); ?>">Excluir</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
