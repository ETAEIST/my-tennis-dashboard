DROP TABLE IF EXISTS Documentos_Jogador;
DROP TABLE IF EXISTS Aluno;
DROP TABLE IF EXISTS Jogo_CNU;
DROP TABLE IF EXISTS Jogou_CNU;
DROP TABLE IF EXISTS Jogador;
DROP TABLE IF EXISTS CNU;

CREATE TRIGGER default_date BEFORE INSERT ON Jogador 
FOR EACH ROW 
SET NEW.Desde = IFNULL(NEW.Desde, NOW());

CREATE TABLE Jogador (
	ID_Jogador INT NOT NULL AUTO_INCREMENT,
	Nome varchar(255) NOT NULL,
	Mail varchar(255) NOT NULL,
	Telefone varchar(255),
	Desde date,
	Lateralidade TINYINT(1), /* 1 é destro, 0 é esquerdino */
	Raquete varchar(255),

	PRIMARY KEY (ID_Jogador)
);

CREATE TABLE CNU (
	Ano YEAR NOT NULL,
	Tipo TINYINT(1) NOT NULL, /* 1 é individual, 0 é equipas */
	Localização varchar(255),
	Data date,

	PRIMARY KEY (Ano, Tipo)
);

CREATE TABLE Aluno (
	IST_ID INT NOT NULL,
	ID_Jogador INT,
	Curso varchar(15),
	Ano TINYINT(1),

	PRIMARY KEY (IST_ID),
	FOREIGN KEY (ID_Jogador) REFERENCES Jogador(ID_Jogador) ON DELETE SET NULL /* Os jogadores da equipa que forem apagados da tabela Jogador ficam
nesta tabela com este campo a NULL*/
);

CREATE TABLE Documentos_Jogador (
	ID_Jogador INT,
	Atestado date, /* Prazo de validade */
	Certificado date,
	Termo_Responsabilidade date,

	PRIMARY KEY (ID_Jogador),
	FOREIGN KEY (ID_Jogador) REFERENCES Jogador(ID_Jogador) ON DELETE CASCADE
);

CREATE TABLE Jogou_CNU (
	ID_Jogo INT NOT NULL auto_increment,
	ID_Jogador INT,
	Ano YEAR,
	Tipo TINYINT(1),

	PRIMARY KEY (ID_Jogo),
	FOREIGN KEY (ID_Jogador) REFERENCES Jogador(ID_Jogador) ON DELETE CASCADE,
	FOREIGN KEY (Ano, Tipo) REFERENCES CNU(Ano, Tipo)
);

CREATE TABLE Jogo_CNU ( 
	ID_Jogo INT,
	Adversário varchar (255),
	Resultado varchar(30),
	Ganhou TINYINT(1) NOT NULL, /* 1 ganhou, 0 perdeu */

	PRIMARY KEY (ID_Jogo),
	FOREIGN KEY (ID_Jogo) REFERENCES Jogou_CNU (ID_Jogo)

);

