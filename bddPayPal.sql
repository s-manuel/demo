create database bddpaypal;
  -- bddp@yp@l---
use bddpaypal;

CREATE TABLE categoria_productos (
  idCatgoriaProducto bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO categoria_productos (nombre) VALUES
/* 1 */ ('Computadores'),
/* 2 */ ('Pantallas'),
/* 3 */ ('Teclados'),
/* 4 */ ('Celulares');

CREATE TABLE productos (
  idProducto bigint(20) UNSIGNED NOT NULL  AUTO_INCREMENT PRIMARY KEY,
  nombre varchar(30)  NOT NULL,
  precio float,
  cantidad bigint(20),
  imagen varchar(50) NULL,
  categoriaProductoId bigint(20) UNSIGNED NOT NULL,
  INDEX (categoriaProductoId),
  FOREIGN KEY (categoriaProductoId) REFERENCES categoria_productos(idCatgoriaProducto)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO productos (nombre,precio, cantidad, imagen, categoriaProductoId) VALUES
/* 1 */ ('DELL',600,10,'imagen1.png',1),
/* 2 */ ('HP',600,9,'imagen2.png',1),
/* 3 */ ('Lenovo',600,4,'imagen3.png',1);

create table clientes(
	idCliente bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	correo varchar(255)
);

create table compras(
	idCompra bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	productoId bigint(20) UNSIGNED NOT NULL,
   INDEX (productoId),
   FOREIGN KEY (productoId) REFERENCES productos(idProducto),
	cantidad float,
	clienteId bigint(20) UNSIGNED NOT NULL,
   INDEX (clienteId),
   FOREIGN KEY (clienteId) REFERENCES clientes(idCliente)
);
