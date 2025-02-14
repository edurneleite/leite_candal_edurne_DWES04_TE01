-- Creación de la base de datos
CREATE DATABASE leite_candal_edurne_DWES04;

-- Seleccionar la base de datos
USE leite_candal_edurne_DWES04;

-- Creación de la tabla Usuarios
CREATE TABLE Clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Creación de la tabla Pedidos
CREATE TABLE Pedidos (
    id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    fecha_pedido DATE NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id_cliente) ON DELETE CASCADE
);

-- Insertar datos de ejemplo en la tabla Usuarios
INSERT INTO Clientes (nombre, apellido, email)
VALUES
	   ('Juan', 'Pérez', 'juan.perez@example.com'),
       ('María', 'García', 'maria.garcia@example.com'),
       ('Carlos', 'Martínez', 'carlos.martinez@example.com'),
       ('Ana', 'Sánchez', 'ana.sanchez@example.com'),
       ('José', 'Rodríguez', 'jose.rodriguez@example.com'),
       ('Laura', 'López', 'laura.lopez@example.com'),
       ('Luis', 'González', 'luis.gonzalez@example.com'),
       ('Elena', 'Hernández', 'elena.hernandez@example.com'),
       ('Miguel', 'Fernández', 'miguel.fernandez@example.com'),
       ('Lucía', 'Ramírez', 'lucia.ramirez@example.com');

-- Insertar datos de ejemplo en la tabla Pedidos
INSERT INTO Pedidos (id_cliente, fecha_pedido, total)
VALUES
	   (1, '2025-02-12', 150.75),
       (2, '2025-02-12', 99.99),
       (1, '2025-02-01', 100.50),
       (2, '2025-02-02', 200.75),
       (3, '2025-02-03', 150.00),
       (4, '2025-02-04', 120.30),
       (5, '2025-02-05', 250.10),
       (6, '2025-02-06', 175.00),
       (7, '2025-02-07', 190.45),
       (8, '2025-02-08', 130.00),
       (4, '2025-02-09', 210.25),
       (1, '2025-02-10', 220.60),
       (1, '2025-02-11', 90.25),
       (2, '2025-02-12', 140.55),
       (3, '2025-02-13', 180.80),
       (4, '2025-02-14', 230.40),
       (5, '2025-02-15', 110.20),
       (5, '2025-02-16', 205.70),
       (8, '2025-02-17', 125.50),
       (8, '2025-02-18', 175.90),
       (9, '2025-02-19', 150.25),
       (10, '2025-02-20', 240.30);

SELECT * FROM pedidos;
