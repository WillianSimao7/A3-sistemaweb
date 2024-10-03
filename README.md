Para colocar no banco de dados
Códigos usados no shell:

create database atividaed;

use atividade;

create table usuario(id int(3) auto_increment, nome varchar(200), email varchar(200), telefone int(12)m login varchar(200), senha varchar(200), nivel varchar(4), primary key(id));

describe usuario;

create table anunciar(id int(3) auto_increment, marca varchar(50), modelo varchar(50), ano int(4), cor varchar(15), preco decimal(8,2), km decimal(8,2), primary key(id));

describe anunciar;

select * from anunciar;
