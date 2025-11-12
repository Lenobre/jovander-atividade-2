CREATE DATABASE IF NOT EXISTS app_db;

USE app_db;

-- Criação da Tabela Clientes
CREATE TABLE IF NOT EXISTS Clientes (
    Id_Cliente INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100),
    Endereco VARCHAR(255),
    Cidade VARCHAR(100),
    Telefone VARCHAR(15)
);

-- Inserções de Dados Fictícios
INSERT INTO Clientes (Nome, Endereco, Cidade, Telefone)
VALUES 
('Ana Souza', 'Rua A, 123', 'São Paulo', '11 99999-1234'),
('Carlos Oliveira', 'Avenida B, 456', 'Rio de Janeiro', '21 98888-5678'),
('Mariana Costa', 'Rua C, 789', 'Belo Horizonte', '31 97777-9012'),
('João Silva', 'Rua D, 101', 'Curitiba', '41 96666-3456'),
('Luciana Pereira', 'Avenida E, 202', 'Porto Alegre', '51 95555-7890'),
('Roberto Lima', 'Rua F, 303', 'Fortaleza', '85 94444-5678'),
('Fernanda Martins', 'Rua G, 404', 'Salvador', '71 93333-1234'),
('Ricardo Alves', 'Avenida H, 505', 'Recife', '81 92222-2345'),
('Beatriz Rocha', 'Rua I, 606', 'Manaus', '92 91111-3456'),
('Pedro Santos', 'Avenida J, 707', 'Natal', '84 90000-4567'),
('Juliana Silva', 'Rua K, 808', 'Goiânia', '62 98888-5678'),
('Marco Pereira', 'Rua L, 909', 'Brasília', '61 97777-6789'),
('Gabriela Oliveira', 'Avenida M, 1010', 'São Luís', '98 96666-7890'),
('Rodrigo Fernandes', 'Rua N, 1111', 'Vitoria', '27 95555-8901'),
('Carla Teixeira', 'Avenida O, 1212', 'Campo Grande', '67 94444-1234'),
('Sérgio Souza', 'Rua P, 1313', 'Teresina', '86 93333-2345'),
('Marcos Gomes', 'Avenida Q, 1414', 'Florianópolis', '48 92222-3456'),
('Paula Costa', 'Rua R, 1515', 'Aracaju', '79 91111-4567'),
('Eduardo Lima', 'Avenida S, 1616', 'Maceió', '82 90000-5678'),
('Tatiane Alves', 'Rua T, 1717', 'João Pessoa', '83 98888-6789'),
('Felipe Martins', 'Avenida U, 1818', 'Belém', '91 97777-7890'),
('Raquel Rocha', 'Rua V, 1919', 'Rio Branco', '68 96666-8901'),
('Luiz Fernando', 'Avenida W, 2020', 'Cuiabá', '65 95555-9012'),
('Sandra Santos', 'Rua X, 2121', 'Boa Vista', '95 94444-0123'),
('José Carlos', 'Avenida Y, 2222', 'Porto Velho', '69 93333-1234'),
('Vanessa Pereira', 'Rua Z, 2323', 'Macapá', '96 92222-2345'),
('André Souza', 'Avenida A1, 2424', 'São José', '48 91111-3456'),
('Renata Oliveira', 'Rua B1, 2525', 'Jundiaí', '11 90000-4567'),
('Vítor Lima', 'Avenida C1, 2626', 'São Bernardo do Campo', '11 98888-5678'),
('Simone Teixeira', 'Rua D1, 2727', 'São José dos Campos', '12 97777-6789'),
('Carlos Eduardo', 'Avenida E1, 2828', 'Campinas', '19 96666-7890');
