CREATE TABLE Uporabnik (
	imeUporabnika CHAR(20) PRIMARY KEY,
	geslo CHAR(100) NOT NULL,
	datumRegistracije DATE NOT NULL,
	ime CHAR(10) NOT NULL,
	priimek CHAR(20) NOT NULL,
	eMail CHAR(20) NOT NULL UNIQUE,
	datumZadnjegaDostopa DATE NOT NULL,
	stNeuspesnihPrijav INT NOT NULL
);
