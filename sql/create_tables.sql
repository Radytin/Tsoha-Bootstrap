-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Kayttaja(
 user_id serial PRIMARY KEY,
 username VARCHAR (20) UNIQUE NOT NULL,
 password VARCHAR (45) NOT NULL,
 bio VARCHAR (400) NOT NULL
);

CREATE TABLE Kaverit(
 relation_id serial PRIMARY KEY,
 lisaajaID INTEGER REFERENCES Kayttaja(user_id),
 lisattavaID INTEGER REFERENCES Kayttaja(user_id)
);

CREATE TABLE Viesti(
msg_id SERIAL PRIMARY KEY,
aihe varchar (20) NOT NULL,
sisalto varchar (600) NOT NULL
);

CREATE TABLE VastaanotettuViesti(
 received_id serial PRIMARY KEY,
 lahettajaID INTEGER REFERENCES Kayttaja(user_id),
 vastaanottajaID INTEGER REFERENCES Kayttaja(user_id)
);


