CREATE DATABASE IF NOT EXISTS totmaquina;

USE totmaquina;

-- Tabla para los usuarios
CREATE TABLE User (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    surname VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    profile_pic VARCHAR(100),
    role VARCHAR(100) NOT NULL
);

-- Tabla para las máquinas
CREATE TABLE Machine (
    machine_id INT AUTO_INCREMENT PRIMARY KEY,
    model VARCHAR(100) NOT NULL,
    created_by INT NOT NULL,
    serial_number VARCHAR(100) NOT NULL,
    installation_date DATE,
    coordinates VARCHAR(100),
    image VARCHAR(100),
    qr_code VARCHAR(100),
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES User(user_id)
);

-- Tabla para las Maintenance
CREATE TABLE Maintenance (
    maintenance_id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT NOT NULL,
    type VARCHAR(100),
    assigned_date DATE,
    user_id INT,
    machine_id INT,
    FOREIGN KEY (user_id) REFERENCES User(user_id),
    FOREIGN KEY (machine_id) REFERENCES Machine(machine_id)
);

-- Tabla para las Notifications
CREATE TABLE Notification (
    notification_id INT AUTO_INCREMENT PRIMARY KEY,
    frequency VARCHAR(100) NOT NULL,
    next_maintenance TEXT,
    machine_id INT,
    user_id INT,
    maintenance_id INT,
    FOREIGN KEY (machine_id) REFERENCES Machine(machine_id),
    FOREIGN KEY (user_id) REFERENCES User(user_id),
    FOREIGN KEY (maintenance_id) REFERENCES Maintenance(maintenance_id)
);

-- Tabla para la relación entre usuarios y máquinas
CREATE TABLE UserMachine (
    user_id INT,
    machine_id INT,
    FOREIGN KEY (user_id) REFERENCES User(user_id),
    FOREIGN KEY (machine_id) REFERENCES Machine(machine_id)
);

-- Tabla para los técnicos
CREATE TABLE Technician (
    technician_id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT NOT NULL,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES User(user_id)
);