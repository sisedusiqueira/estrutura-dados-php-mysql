create table jogos
(
	jogo varchar(100) NOT NULL,
	local varchar(50) NOT NULL,
	horario char(5) NOT NULL,
	data date NOT NULL
);


create table goleadores
(
	nome varchar(100) NOT NULL,
	time varchar(50) NOT NULL,
	gols smallint NOT NULL
);


insert into jogos values ('Grêmio x Atlético-MG', 'Arena do Grêmio', '20:30', '2018-05-22');
insert into jogos values ('Goiás x Fluminense', 'Serra Dourada', '20:30', '2018-05-22');
insert into jogos values ('Criciúma x Vasco', 'Heriberto Hulse', '20:30', '2018-05-22');
insert into jogos values ('Vitória x São Caetano', 'Barradão', '21:30', '2018-05-22');
insert into jogos values ('Cruzeiro x Flamengo', 'Mineirão', '21:30', '2018-05-22');

insert into goleadores values ('Fred', 'Atlético', '20');
insert into goleadores values ('Luís Fabiano', 'Vasco', '17');
insert into goleadores values ('Luan', 'Grêmio', '15');
insert into goleadores values ('Wellington Paulista', 'Chapecoense', '12');
insert into goleadores values ('Rafael', 'Cruzeiro', '11');
