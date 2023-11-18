create table livros
(
	isbn varchar(13),
	titulo varchar(80) NOT NULL,
	autor varchar(80) NOT NULL,
	paginas smallint NOT NULL,
	preco float NOT NULL
);


INSERT INTO livros VALUES ('9788575225349', 'Desenvolvendo Websites com PHP', 'Juliano Niederauer', 320, 73);
INSERT INTO livros VALUES ('9788575223642', 'Jovem e Bem-Sucedido', 'Juliano Niederauer', 192, 34);
INSERT INTO livros VALUES ('9788575223277', 'Web Interativa com Ajax e PHP', 'Juliano Niederauer', 304, 65);
