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

create table pessoacontatos(id serial, tipo char, 
	contato varchar(30), descricao varchar(80),pessoa_id int,
	foreign key(pessoa_id) references universitarios,
	primary key(pessoa_id, id))

create table contatos(id serial primary key, tipo char, 
	contato varchar(30), descricao varchar(80))

create table escolacontatos(id serial, tipo char, 
	contato varchar(30), descricao varchar(80),escola_id int,
	foreign key(escola_id) references escolas,
	primary key(escola_id, id)) inherits contatos

alter table universitariocontatos inherit contatos

create table registrodiarios(id serial, escola_id int, created timestamp, modified timestamp,
	detalhes text,
	foreign key(escola_id) references escolas,
	primary key(escola_id, id))

select * from registrodiarios where created ::date = '2013-12-18'
drop table enderecos
create table enderecos(id serial primary key, cidade_id int,
			rua varchar(120), numero varchar(5), cep varchar(8), bairro varchar(80), 
			complemento varchar(30), 
			foreign key(cidade_id) references cidades)

alter table escolas add foreign key(diretore_id) references diretores
alter table escolas inherit enderecos

create table universitariocontatos(universitario_id int, id int default nextval('contatos_id_seq'),
		foreign key(universitario_id) references universitarios,
		primary key(id)) inherits(contatos)

create table diretorecontatos(diretore_id int, id int default nextval('contatos_id_seq'),
		foreign key(diretore_id) references diretores,
		primary key(id)) inherits(contatos)


CREATE TRIGGER trg_novo_diretor
		BEFORE INSERT ON diretores
		FOR EACH ROW EXECUTE PROCEDURE sp_pode_novo_diretor();

CREATE or replace FUNCTION sp_pode_novo_diretor() RETURNS TRIGGER AS
	$$
		BEGIN
			if (select count(*) from diretores where escola_id = NEW.escola_id) >= 1 THEN 
				update diretores set escola_id = NULL where escola_id = NEW.escola_id;
				/*raise exception 'ESTA ESCOLA JÁ POSSUI DIRETOR!'*/
				/*USING ERRCODE = 'unique_violation';*/
				return NEW;
			else return NEW;
			end if;
			
		END;
	$$ LANGUAGE "plpgsql";
