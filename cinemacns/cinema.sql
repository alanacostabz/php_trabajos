CREATE DATABASE IF NOT EXISTS CINEMA;
USE CINEMA;

CREATE TABLE CATALOGO_GENERO(
    ID_GENERO INT NOT NULL AUTO_INCREMENT,
    NOMBRE VARCHAR(255),
    PRIMARY KEY(ID_GENERO)
);