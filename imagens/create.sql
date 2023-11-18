create table usuario
(
	username varchar(10) NOT NULL,
	nome varchar(80) NOT NULL,
	email varchar(80) NOT NULL,
	sexo char NOT NULL,
	data_nasc date NOT NULL,
	cidade varchar(40) NOT NULL,
	estado char(2) NOT NULL,
	senha varchar(10) NOT NULL
);


create table contador
(
	valor int NOT NULL
);


create table pesquisa
(
	time varchar(20) NOT NULL,
	ano char(4) NOT NULL,
	valor int NOT NULL,
	primary key(time,ano)
);


insert into pesquisa values ('Grêmio', '2015', 510000);
insert into pesquisa values ('Grêmio', '2016', 525000);
insert into pesquisa values ('Grêmio', '2017', 650000);
insert into pesquisa values ('Juventude', '2015', 170000);
insert into pesquisa values ('Juventude', '2016', 275000);
insert into pesquisa values ('Juventude', '2017', 270000);
insert into pesquisa values ('Inter', '2015', 460000);
insert into pesquisa values ('Inter', '2016', 300000);
insert into pesquisa values ('Inter', '2017', 170000);
insert into pesquisa values ('Caxias', '2015', 35000);
insert into pesquisa values ('Caxias', '2016', 75000);
insert into pesquisa values ('Caxias', '2017', 85000);

insert into pesquisa values ('Pelotas', '2015', 20000);
insert into pesquisa values ('Pelotas', '2016', 30000);
insert into pesquisa values ('Pelotas', '2017', 40000);
insert into pesquisa values ('Pelotas', '2018', 50000);
insert into pesquisa values ('Grêmio', '2018', 850000);
insert into pesquisa values ('Juventude', '2018', 280000);
insert into pesquisa values ('Inter', '2018', 150000);
insert into pesquisa values ('Caxias', '2018', 95000);



insert into usuario values ('A','A','A','M','2003-01-01','A','RS','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','RS','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','RS','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','RS','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','RS','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','RS','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','RS','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','RS','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','RS','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','RS','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','RS','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','RS','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','RS','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','RS','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','RS','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','RS','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','RS','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','RS','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','SP','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','SP','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','SP','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','SP','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','SP','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','SP','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','SP','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','BA','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','BA','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','BA','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','BA','A');
insert into usuario values ('A','A','A','M','2003-01-01','A','BA','A');
insert into usuario values ('A','A','A','F','2003-01-01','A','MG','A');
insert into usuario values ('A','A','A','F','2003-01-01','A','MG','A');
insert into usuario values ('A','A','A','F','2003-01-01','A','MG','A');
insert into usuario values ('A','A','A','F','2003-01-01','A','MG','A');
insert into usuario values ('A','A','A','F','2003-01-01','A','MG','A');
insert into usuario values ('A','A','A','F','2003-01-01','A','MG','A');
insert into usuario values ('A','A','A','F','2003-01-01','A','MG','A');
insert into usuario values ('A','A','A','F','2003-01-01','A','MG','A');
insert into usuario values ('A','A','A','F','2003-01-01','A','MG','A');
insert into usuario values ('A','A','A','F','2003-01-01','A','MG','A');
insert into usuario values ('A','A','A','F','2003-01-01','A','MG','A');
insert into usuario values ('A','A','A','F','2003-01-01','A','MG','A');
insert into usuario values ('A','A','A','F','2003-01-01','A','MG','A');
insert into usuario values ('A','A','A','F','2003-01-01','A','MG','A');
insert into usuario values ('A','A','A','F','2003-01-01','A','MG','A');

