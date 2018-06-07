
CREATE TABLE IF NOT EXISTS Utente(
	idUtente int AUTO_INCREMENT PRIMARY KEY,
	email varchar(50) NOT NULL UNIQUE,
	password varchar(30) NOT NULL,
	nome varchar(30),
	cognome varchar(30),
	indirizzo varchar(50),
	citta varchar(50),
	cap varchar(5),
	superuser boolean
);
CREATE TABLE IF NOT EXISTS Prodotto(
	idProdotto int AUTO_INCREMENT PRIMARY KEY,
	nome varchar(30) NOT NULL UNIQUE,
	descrizione varchar(500),
	immagine varchar(500),
	prezzo decimal
);


CREATE TABLE IF NOT EXISTS Ordine(
	idOrdine int AUTO_INCREMENT PRIMARY KEY,
	Utente varchar(50) NOT NULL REFERENCES Utente(email),
	indirizzoSpedizione varchar(50),
	data varchar(20),
	totale decimal
);

CREATE TABLE IF NOT EXISTS Ordine_Prodotto(
	idOrdine int REFERENCES Ordine(idOrdine) ON DELETE CASCADE,
	idProdotto int REFERENCES Prodotto(idProdotto) ON DELETE CASCADE,
	quantita int,
	PRIMARY KEY(idOrdine, idProdotto)
);