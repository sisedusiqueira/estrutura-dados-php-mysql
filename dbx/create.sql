create table livros
(
	isbn varchar(13),
	titulo varchar(80) NOT NULL,
	autor varchar(80) NOT NULL,
	paginas smallint NOT NULL,
	preco float NOT NULL
);


create table categorias
(
	codigo smallint NOT NULL,
	nome varchar(80) NOT NULL,
	primary key(codigo)
);


create table produtos
(
	codigo mediumint NOT NULL,
	nome varchar(80) NOT NULL,
	descricao text NOT NULL,
	preco float NOT NULL,
	codigo_categoria smallint NOT NULL,
	primary key(codigo)
);


insert into categorias values (1, '�udio');
insert into categorias values (2, 'Eletrodom�sticos');
insert into categorias values (3, 'Esporte e Lazer');
insert into categorias values (4, 'Inform�tica');
insert into categorias values (5, 'V�deo');

insert into produtos values (1, 'FONE DE OUVIDO PULSE', 'Headphone completamente moderno e com clareza de som incr�vel.', 59, 1);
insert into produtos values (2, 'CAIXA DE SOM BLUETOOTH', 'Design moderno, compacto, leve e port�til, com controle de som e alarme.', 245, 1);
insert into produtos values (3, 'VIDEOK� RAF ELECTRONIC', 'Mostre todo o seu talento com este videok�! Suas reuni�es v�o ficar ainda mais animadas.', 699, 1);
insert into produtos values (4, 'HOME THEATER LG', 'Transforme sua casa em um verdadeiro cinema e sinta-se como estivesse dentro do filme!', 1399, 1);
insert into produtos values (5, 'AR CONDICIONADO CONSUL', 'Gabinete em pl�stico de alta resist�ncia. F�cil instala��o e manuten��o.', 645, 2);
insert into produtos values (6, 'REFRIGERADOR ELECTROLUX', 'Combina modernidade e estilo, al�m de conservar seus alimentos na temperatura certa.', 1199, 2);
insert into produtos values (7, 'ESTEIRA EL�TRICA', 'Robusta, suporta at� 100 kg de peso.', 574, 3);
insert into produtos values (8, 'NOTEBOOK ACER', 'Tenha um verdadeiro computador em suas m�os!', 1399, 4);
insert into produtos values (9, 'DVD PLAYER LG', 'Design ultra slim com 43mm de espessura.', 529, 5);



insert into livros values ('8585184965', 'HTML - Guia de Consulta R�pida', 'Marcelo Silveira,Rubens Prates', 128, 20);
insert into livros values ('8585184981', 'JScript - Guia de Consulta R�pida', 'Edgard Damiani', 96, 20);
insert into livros values ('8585184752', 'ASP - Guia de Consulta R�pida', 'Rubens Prates', 128, 18);
insert into livros values ('858518454X', 'C++ - Guia de Consulta R�pida', 'Mauro Rezende', 32, 11);
insert into livros values ('8585184930', 'Crystal Reports - Guia de Consulta R�pida', 'Joel Saade' ,127, 20);
insert into livros values ('8585184833', 'Dreamweaver - Guia de Consulta R�pida', 'Marcelo Silveira', 128, 20);
insert into livros values ('8585184876', 'Flash - Guia de Consulta R�pida', 'Edgard Damiani', 128, 20);
insert into livros values ('8585184868', 'XML - Guia de Consulta R�pida', 'Ot�vio C. D�cio', 96, 20);
insert into livros values ('8585184736', 'Visual Basic 6 Controles Activex - Guia de Consulta R�pida', 'Joel Saade', 128, 18);
insert into livros values ('8585184469', 'Visual Basic Vers�o 4 - Guia de Consulta R�pida', 'Rubens Prates', 128, 18);
insert into livros values ('8585184698', 'PHP - Guia de Consulta R�pida','Herbert G Fischer', 128, 18);
insert into livros values ('8585184280', 'SQL - Guia de Consulta R�pida', 'Edison Liesse', 32, 11);
insert into livros values ('858518471X', 'SQL Server 7 System Procedures - Guia de Consulta R�pida', 'Rubens Prates,Renato Piques', 128, 18);
insert into livros values ('8585184701', 'SQL Server 7 Transact-SQL - Guia de Consulta R�pida', 'Rubens Prates,Renato Piques', 128, 20);
insert into livros values ('8585184728', 'TCP/IP - Guia de Consulta R�pida', 'Rubens Prates,Luciano Palma', 128, 18);
insert into livros values ('8585184558', 'Unix Comandos de Usu�rios - Guia de Consulta R�pida', 'Eduardo Marcan', 48, 13);
insert into livros values ('8585184418', 'Turbo Pascal - Guia de Consulta R�pida', 'Rubens Prates,Dennis Cintra Leite',32, 9);
insert into livros values ('8585184388', 'HTML - Guia de Consulta R�pida', 'Rubens Prates', 32, 9);
insert into livros values ('8585184906', 'ICQ - Guia de Consulta R�pida', 'Maria Alice De Castro', 96, 20);
insert into livros values ('8585184914', 'Integrando PHP com MySQL - Guia de Consulta R�pida', 'Lucio Stoco', 94, 20);
insert into livros values ('8585184256', 'Interrup��es do Bios - Guia de Consulta R�pida', 'Adlich', 32, 9);
insert into livros values ('8585184264', 'Interrup��es do MS-DOS - Guia de Consulta R�pida', 'Adlich', 32, 9);
insert into livros values ('8585184639', 'Java - Guia de Consulta R�pida', 'F�bio Ramon', 128, 18);
insert into livros values ('8585184973', 'Java 2 - Guia de Consulta R�pida', 'F�bio Ramon', 144, 20);
insert into livros values ('8585184884', 'JavaServer Pages - Guia de Consulta R�pida', 'Idemir Coelho', 96, 20);
insert into livros values ('8585184396', 'JavaScript - Guia de Consulta R�pida', 'Rubens Prates' , 32, 9);
insert into livros values ('8585184744', 'JDBC2 - Guia de Consulta R�pida', 'F�bio Ramon', 96, 18);
insert into livros values ('8575220063', 'BASH - Guia de Consulta R�pida', 'Joel Saade', 96, 20);
insert into livros values ('8575220047', 'UML - Guia de Consulta R�pida', 'Douglas Marcos da Silva', 95, 20);
insert into livros values ('8575220055', 'Cascading Style Sheets (CSS) - Guia de Consulta R�pida', 'Luis Gustavo Amaral', 128, 20);
insert into livros values ('8585184957', 'Linux Administra��o e Suporte', 'Chuck V. Tibet', 379, 59);
insert into livros values ('8585184647', 'Linux Comandos De Usu�rios - Guia de Consulta R�pida', 'Eduardo Ma�an', 64, 15);
insert into livros values ('8585184760', 'Linux Interface Gr�fica KDE - Guia de Consulta R�pida', 'Frederico Reis', 92, 20);
insert into livros values ('8585184787', 'MySQL - Guia de Consulta R�pida', 'Rubens Prates', 96, 20);
insert into livros values ('8585184590', 'Netiqueta - Guia de Consulta R�pida', 'Maria Alice De Castro' ,32, 11);
insert into livros values ('8575220039', 'Desenvolvendo Websites com PHP', 'Juliano Niederauer' ,256, 39);
insert into livros values ('8575220101', 'HTTP - Guia de Consulta R�pida', 'D�cio Jr.', 128, 20);
insert into livros values ('857522011X', 'Express�es Regulares - Guia de Consulta R�pida', 'Aur�lio Marinho Jargas', 96, 20);
insert into livros values ('8575220071', 'JavaScript - Guia de Consulta R�pida', 'Edgard Damiani', 144,20);
insert into livros values ('8575220152', 'Seguran�a Nacional', 'Nelson Murilo de O. Rufino' ,248, 45);
insert into livros values ('8575220160', 'XHTML - Guia de Consulta R�pida', 'Juliano Niederauer', 128, 20);
insert into livros values ('8575220128', 'PostgreSQL - Guia de Consulta R�pida', 'Juliano Niederauer', 128, 20);
insert into livros values ('8575220144', 'Oracle 9i Built-in Packages - Guia de Consulta R�pida', 'Celso Henrique Poderoso de Oliveira', 128, 20);
insert into livros values ('8575220098', 'Python - Guia de Consulta R�pida', 'Marco Catunda', 128, 20);
insert into livros values ('857522008X', 'Tcl/TK - Guia de Consulta R�pida', 'Roberto L.S. Monteiro', 128, 20);
insert into livros values ('8575220179', 'Formatos de Arquivos da Internet - Guia de Consulta R�pida', 'Marcelo Silveira', 128, 20);
insert into livros values ('8585184795', 'Oracle 8 SQL - Guia de Consulta R�pida', 'Rubens Thiago de Oliveira', 96, 20);
insert into livros values ('858518485X', 'Oracle 8i PL/SQL - Guia de Consulta R�pida', 'Celso Henrique Poderoso de Oliveira', 96, 20);
insert into livros values ('8585184949', 'Samba - Guia de Consulta R�pida', 'D�cio Jr.', 128, 20);
insert into livros values ('8585184809', 'Perl - Guia de Consulta R�pida', 'D�cio Jr.', 128, 20);
insert into livros values ('8575220187', 'As Palavras Mais Comuns da L�ngua Inglesa', 'Rubens Queiroz de Almeida', 320, 24);
insert into livros values ('8575220209', 'Oracle 9i SQL - Guia de Consulta R�pida', 'Rubens Thiago de Oliveira', 128, 20);
insert into livros values ('8575220217', 'Aprendendo Java', 'Rodrigo Mello,Ramon Chiara,Renato Villela', 190, 42);
insert into livros values ('8575220225', 'Read in English - Uma Maneira Divertida de Aprender Ingl�s', 'Rubens Queiroz de Almeida', 352, 48);
insert into livros values ('8575220241', 'SQL - Curso Pr�tico', 'Celso Henrique Poderoso de Oliveira', 272, 42);
insert into livros values ('8575220284', 'Web Marketing Usando Ferramentas de Busca', 'Marcelo Silveira', 160, 38);
insert into livros values ('8575220268', 'DB2 UDB v.7 - Guia de Consulta R�pida', 'Jo�o Alberto de Oliveira Lima', 128, 20);
insert into livros values ('8575220276', 'Editor Vi - Guia de Consulta R�pida', 'Roberto Severo de A. Coelho', 64, 15);
insert into livros values ('857522025X', 'PHP com XML - Guia de Consulta R�pida', 'Juliano Niederauer', 96, 20);
insert into livros values ('8575220322', 'Oracle 9i PL/SQL - Guia de Consulta R�pida', 'Celso Henrique Poderoso de Oliveira', 112, 20);
insert into livros values ('8575220292', 'Mirando Resultados', 'Ricardo Almeida,Marcelo Oliveira', 208, 42);
insert into livros values ('8575220330', 'Virtual Private Network - VPN', 'Lino Sarlo da Silva', 240, 43);
insert into livros values ('8575220349', 'Desenvolvendo Aplica��es ASP.NET com Web Matrix', 'Daniel Wander', 320, 48);
insert into livros values ('8575220306', 'Prote��o Jur�dica de Software', 'Alexandre Coutinho Ferrari', 192, 38);
insert into livros values ('8575220314', 'ASP.NET Guia do Desenvolvedor', 'Felipe Cembranelli', 256, 39);
insert into livros values ('8575220357', 'ASP.NET com C#', 'Alfredo Lotar', 384, 52);
insert into livros values ('8575220365', 'Java e XML - Guia de Consulta R�pida', 'Ren� Rodrigues Veloso', 96, 20);
insert into livros values ('8575220373', 'As Palavras mais comuns da L�ngua Inglesa - 2� edi��o', 'Rubens Queiroz de Almeida', 312, 53);
insert into livros values ('8575220381', 'Linux - Guia do Administrador do Sistema', 'Rubem E. Ferreira', 512, 85);
insert into livros values ('857522039X', 'InterBase - Guia de Consulta R�pida', 'Juliano Niederauer', 96, 22);
