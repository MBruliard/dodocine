CREATE TABLE IF NOT EXISTS categories (
    id_categorie INTEGER PRIMARY KEY AUTOINCREMENT UNIQUE, 
    nom TEXT
);
CREATE TABLE IF NOT EXISTS individus (
    id_individu INTEGER PRIMARY KEY AUTOINCREMENT UNIQUE,
    nom TEXT NOT NULL,
    prenom TEXT NOT NULL,
    pays TEXT,
    annee INTEGER CHECK(annee > 0),
    photo TEXT
);
CREATE TABLE IF NOT EXISTS films (
    id_film INTEGER PRIMARY KEY AUTOINCREMENT UNIQUE,
    titre TEXT NOT NULL,
    duree TEXT,
    id_categorie INTEGER,
    annee INTEGER CHECK(annee > 0),
    pays TEXT,
    id_realisateur INTEGER,
    photo TEXT,
    CONSTRAINT FK_FILM_REAL FOREIGN KEY (id_realisateur) REFERENCES individus (id_individu)
);
CREATE TABLE IF NOT EXISTS distribution(
    id_film INTEGER NOT NULL, 
    id_acteur INTEGER NOT NULL,
    CONSTRAINT PK_DISTRIBUTION PRIMARY KEY (id_film, id_acteur),
    CONSTRAINT FK_DISTRIBUTION_FILM FOREIGN KEY(id_film) REFERENCES films (id_film),
    CONSTRAINT FK_DISTRIBUTION_ACTEUR FOREIGN KEY (id_acteur) REFERENCES individus(id_individu)
);
CREATE TABLE IF NOT EXISTS users(
    pseudo TEXT PRIMARY KEY,
    email TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL
);
CREATE TABLE IF NOT EXISTS notes (
    id_film INTEGER,
    id_user TEXT,
    note INTEGER CHECK(note BETWEEN 1 AND 5) NOT NULL,
    commentaire TEXT,
    CONSTRAINT PK_NOTES PRIMARY KEY (id_film, id_user),
    CONSTRAINT FK_NOTES_FILM FOREIGN KEY (id_film) REFERENCES films (id_film),
    CONSTRAINT FK_NOTES_USER FOREIGN KEY (id_user) REFERENCES users (pseudo)
);
CREATE TABLE IF NOT EXISTS forum (
    id_msg INTEGER PRIMARY KEY AUTOINCREMENT,
    id_user TEXT NOT NULL,
    id_film INTEGER NOT NULL,
    id_msg_ans INTEGER,
    contenu TEXT,
    date TEXT,
    CONSTRAINT FK_FORUM_USER FOREIGN KEY (id_user) REFERENCES users (pseudo),
    CONSTRAINT FK_FORUM_FILM FOREIGN KEY (id_film) REFERENCES films (id_film),
    CONSTRAINT FK_FORUM_REPONSE FOREIGN KEY (id_msg_ans) REFERENCES forum (id_msg)
);
