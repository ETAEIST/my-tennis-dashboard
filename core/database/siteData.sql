DROP TABLE IF EXISTS Users;

CREATE TABLE Users (
	User_id INT NOT NULL AUTO_INCREMENT,
	Username varchar(32),
	Password varchar(32),

	PRIMARY KEY (User_id)
);

INSERT INTO Users (Username, Password) VALUES 
('AntonioSilva', MD5('Antonio')),
('JoaoGarcia', MD5('Joao'));
