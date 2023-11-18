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


insert into jogos values ('Gr�mio x Atl�tico-MG', 'Arena do Gr�mio', '20:30', '2018-05-22');
insert into jogos values ('Goi�s x Fluminense', 'Serra Dourada', '20:30', '2018-05-22');
insert into jogos values ('Crici�ma x Vasco', 'Heriberto Hulse', '20:30', '2018-05-22');
insert into jogos values ('Vit�ria x S�o Caetano', 'Barrad�o', '21:30', '2018-05-22');
insert into jogos values ('Cruzeiro x Flamengo', 'Mineir�o', '21:30', '2018-05-22');

insert into goleadores values ('Fred', 'Atl�tico', '20');
insert into goleadores values ('Lu�s Fabiano', 'Vasco', '17');
insert into goleadores values ('Luan', 'Gr�mio', '15');
insert into goleadores values ('Wellington Paulista', 'Chapecoense', '12');
insert into goleadores values ('Rafael', 'Cruzeiro', '11');
