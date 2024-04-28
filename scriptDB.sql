CREATE DATABASE IF NOT EXISTS task_manager;

USE task_manager;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    task VARCHAR(255) NOT NULL,
    description TEXT,
    scheduled_date DATE,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (email, name, password) VALUES ('teste@gmail.com', 'Elon Musk', '$2y$10$VtTsZ6SKlNJiAqQkQWxuEODv7GUrCDxvv7jXm9QHEi/xTuLzY3BGy');

INSERT INTO tasks (user_id, task, description, scheduled_date) VALUES
(1, 'Fazer compras', 'Comprar itens essenciais para a casa', '2024-05-14'),
(1, 'Estudar para o exame', 'Revisar os tópicos do exame final', '2024-05-21'),
(1, 'Ir à academia', 'Treino de pernas e abdominais', '2024-05-03'),
(1, 'Reunião de equipe', 'Discutir os próximos projetos em equipe', '2024-05-09'),
(1, 'Limpar a casa', 'Faxina completa', '2024-05-30'),
(1, 'Enviar relatório', 'Relatório mensal para o chefe', '2024-05-25'),
(1, 'Preparar apresentação', 'Preparar slides para a apresentação do projeto', '2024-05-07'),
(1, 'Ligar para o cliente', 'Realizar uma ligação de acompanhamento com o cliente', '2024-05-01'),
(1, 'Sessão de brainstorm', 'Reunir ideias para novos produtos', '2024-05-18'),
(1, 'Jantar com amigos', 'Encontro no restaurante italiano', '2024-05-04');