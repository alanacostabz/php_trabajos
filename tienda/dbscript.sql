DROP DATABASE IF EXISTS TIENDA;
CREATE DATABASE IF NOT EXISTS TIENDA;
USE TIENDA;

CREATE TABLE CATALOGO_MARCAS(
  ID INT NOT NULL AUTO_INCREMENT,
  NOMBRE_MARCA VARCHAR(50) NOT NULL,
  PRIMARY KEY(ID)
);

CREATE TABLE CATALOGO_CATEGORIAS(
  ID INT NOT NULL AUTO_INCREMENT,
  NOMBRE_CATEGORIA VARCHAR(50) NOT NULL,
  PRIMARY KEY(ID)
);

CREATE TABLE PRODUCTOS (
  ID INT NOT NULL AUTO_INCREMENT,
  NOMBRE_PRODUCTO VARCHAR(50) NOT NULL,
  CATEGORIA INT NOT NULL,
  MARCA INT NOT NULL,
  PRECIO DOUBLE NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (CATEGORIA) REFERENCES CATALOGO_CATEGORIAS(ID),
  FOREIGN KEY (MARCA) REFERENCES CATALOGO_MARCAS(ID)
);