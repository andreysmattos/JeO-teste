/* Criando a base de dados */
CREATE DATABASE `jeo`;

use `jeo`;

/* tabela cadastro */
CREATE TABLE `cadastro` (
	idCadastro int not null primary key auto_increment,
	nome varchar(100) not null,
	email varchar(255) not null unique,
	cidade varchar(100) not null,
	estado char(2) not null,
	mensagem TEXT not null
);

/* tabela telefone */
CREATE TABLE `telefone` (
	idTelefone int not null primary key auto_increment,
	telefone varchar(15),
	celular varchar(15) not null,
	contatoWpp tinyint(1) not null,
	id_cadastro int not null unique,
	foreign key (id_cadastro)
	references `cadastro` (idCadastro)
);