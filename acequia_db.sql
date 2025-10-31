-- acequia_db.sql
CREATE DATABASE IF NOT EXISTS acequia_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE acequia_db;

CREATE TABLE IF NOT EXISTS meta_firmas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  objetivo INT NOT NULL DEFAULT 2000,
  descripcion VARCHAR(255) DEFAULT 'Meta de firmas para financiar AcequIA'
);

INSERT INTO meta_firmas (objetivo, descripcion) VALUES (2000, 'Meta inicial de firmas') ON DUPLICATE KEY UPDATE objetivo=objetivo;

CREATE TABLE IF NOT EXISTS firmas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(120) NOT NULL,
  email VARCHAR(150) NOT NULL,
  dni VARCHAR(20) NOT NULL,
  fecha DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- fin
