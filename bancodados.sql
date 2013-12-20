create table pessoas(id serial primary key, cpf varchar(11),
created timestamp, modified timestamp, nome varchar(90));
alter table pessoas drop constraint primary key(id)add primary key(cpf)column cpf varchar(11)

create table escolares (escola_id int, horario_entrada time, turno char,
	foreign key(escola_id) references escolas) inherits(pessoas)
	
alter table escolares add primary key(id)

create table diretores(escola_id int, 
	foreign key(escola_id) references escolas) inherits(pessoas)
alter table diretores add primary key(id)

drop table universitariospessoas 
delete from universitariocontatos
create table universitarios(horario_entrada time) inherits(pessoas)
	alter table universitarios add primary key(cpf)

	
create table escolas(id serial primary key, cie char(6), nome varchar(90), 
	endereco varchar(200), universitario_id int, cidade_id int,
	foreign key(universitario_id) references universitarios, 
	alter table escolas add  foreign key(diretore_id) references diretores, 
	foreign key(cidade_id) references cidades)

create table cidades(id serial primary key, nome varchar(80), uf char(2),
	created timestamp, modified timestamp)

create table universitariocontatos(id serial, tipo char, 
	contato varchar(30), descricao varchar(80),universitario_id int,
	foreign key(universitario_id) references universitarios,
	primary key(universitario_id, id))

create table escolacontatos(id serial, tipo char, 
	contato varchar(30), descricao varchar(80),escola_id int,
	foreign key(escola_id) references escolas,
	primary key(escola_id, id))

create table registrodiarios(id serial, escola_id int, created timestamp, modified timestamp,
	detalhes text,
	foreign key(escola_id) references escolas,
	primary key(escola_id, id))

select * from registrodiarios where created ::date = '2013-12-18'
drop table enderecos
create table enderecos(id serial primary key, cidade_id int, created timestamp, modified timestamp,
			rua varchar(120), numero varchar(5), cep varchar(8), bairro varchar(80), 
			complemento varchar(30), 
			foreign key(cidade_id) references cidades)

alter table escolas add foreign key(diretore_id) references diretores
alter table escolas inherit enderecos

select * from escolas