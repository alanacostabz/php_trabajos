drop database if exists tienda;
create database if not exists tienda;
use tienda;

create table catalogo_marcas(
  id int not null auto_increment,
  nombre_marca varchar(50) not null,
  primary key(id)
);

create table catalogo_categorias(
  id int not null auto_increment,
  nombre_categoria varchar(50) not null,
  primary key(id)
);

create table productos (
  id int not null auto_increment,
  nombre_producto varchar(50) not null,
  categoria int not null,
  marca int not null,
  precio double not null,
  primary key (id),
  foreign key (categoria) references catalogo_categorias(id),
  foreign key (marca) references catalogo_marcas(id)
);