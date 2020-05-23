CREATE TABLE etudiants (
  id serial PRIMARY KEY,
  user_id int NOT NULL,
  nom varchar(20) NOT NULL,
  prenom varchar(20) NOT NULL,
  note float NOT NULL
);

CREATE TABLE utilisateur (
  id serial PRIMARY KEY,
  login varchar(20) NOT NULL,
  password varchar(255) NOT NULL,
  mail varchar(40) NOT NULL,
  nom varchar(20) NOT NULL,
  prenom varchar(20) NOT NULL
);
