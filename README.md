# Gerenciador de Tarefas (Com Padrões de Projeto e SOLID)

Este é um sistema de gerenciamento de tarefas desenvolvido em PHP, seguindo os princípios SOLID e utilizando padrões de projeto como Singleton, Factory e Repository. Ele foi projetado para ser mais modular, escalável e fácil de manter em comparação com uma versão sem padrões de projeto.

## Padrões de Projeto Utilizados

- **Singleton:** Gerenciamento da conexão com o banco de dados.
- **Factory:** Criação de instâncias de tarefas.
- **Repository:** Abstração das operações CRUD no banco de dados.
- **Observer (futuro):** Possibilidade de implementar notificações.
- **Dependency Injection:** Injeção de dependências no controlador.

## Funcionalidades

- Adicionar uma nova tarefa
- Listar todas as tarefas
- Atualizar o status de uma tarefa (Concluída/Pendente)
- Excluir tarefas

## Requisitos

- PHP 7.4+
- MySQL 8.0+
- Servidor Apache

## Instalação

1. Clone o repositório:

   ```bash
   git clone https://github.com/usuario/taskmanagerpattern.git

2. Navegue até o diretório do projeto:

    ```
    cd taskmanagerpattern

3. Importe o banco de dados MySQL:

    ```
    CREATE DATABASE task_manager;
    USE task_manager;

    CREATE TABLE tasks (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        description TEXT,
        status ENUM('pending', 'completed') DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

4. Configure o arquivo Database.php com as credenciais do banco de dados:

    ```
    private $servername = "localhost";
    private $username = "seu_usuario";
    private $password = "sua_senha";
    private $dbname = "task_manager";

5. Abra o projeto no navegador:

    ```
    http://localhost/taskmanagerpattern/index.php

## USO
Uso
- Acesse o sistema através do navegador.
- Adicione, atualize e exclua tarefas diretamente na interface.
