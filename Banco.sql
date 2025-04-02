CREATE DATABASE corretores;
CREATE TABLE usuarios(
    id int AUTO_INCREMENT Primary Key Not null,
    nome varchar(255) not null,
    cpf varchar(12) not null,
    Creci varchar(255) not null
);