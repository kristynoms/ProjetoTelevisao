Create table grade(

id integer primary key auto increment,
nome varchar(100),
fk_programa integer,
dataExibicao date
);

Create table genero(

id integer primary key auto increment,
nome varchar(100)

);

Create table emissora(

id integer primary key auto increment,
nome varchar(100)

);

Create table programa(

id integer primary key auto increment,
nome varchar(100),
fk_genero_id integer,
sinopse varchar(200),
fk_classificacao_id integer,
fk_emissora_id integer,
fk_tipo_id integer

);

Create table usuario(

id integer primary key auto increment,
nome varchar(100),
email varchar(50),
login varchar(100),
senha varchar(100)

);


Create table classificacaoEtaria(

id integer primary key auto increment,
nome varchar(100)

);


Create table tipo(

id integer primary key auto increment,
nome varchar(100)

);




