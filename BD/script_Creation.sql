drop table ADMINISTRATEUR;
drop table OLYMPIADES;
drop table RECOMPENSE;
drop table DONNE;
drop table JUGE;
drop table NOTE;
drop table APPARTIENT_A;
drop table APPARTIENT_AU;
drop table GROUPE;
drop table HEURE;
drop table JURY;
drop table PROFESSEUR;
drop table ELEVE;
drop table PERSONNE;

create table PERSONNE(
    ID int,
    Nom varchar(30),
    Prenom varchar(30),
    PRIMARY key(ID)
);

create table PROFESSEUR(
    IDProf int,
    PRIMARY key(IDProf),
    FOREIGN KEY (IDProf) REFERENCES PERSONNE(ID)
);

create table ELEVE(
    IDEleve int,
    PRIMARY key(IDEleve),
    FOREIGN KEY (IDEleve) REFERENCES PERSONNE(ID)
);

create table JURY(
    NumJury int,
    login_ varchar(30),
    password_ varchar(30),
    PRIMARY key(NumJury)
);

create table GROUPE(
    NumGroupe int,
    Filiere varchar(30),
    NomProjet varchar(30),
    Lycee varchar(100),
    image_Projet varchar(100),
    PRIMARY key(NumGroupe)
);

create table HEURE(
    idHeure int,
    hDeb date,
    hFin date,
    PRIMARY key(idHeure)
);

create table NOTE(
    idNote int,
    prototype int CHECK(prototype<6),
    originalite int CHECK(originalite<6),
    demarcheSI int CHECK(demarcheSI<6),
    pluriDisciplinarite int CHECK(pluriDisciplinarite<6),
    maitrise int CHECK(maitrise<6),
    devDurable int CHECK(devDurable<6),
    PRIMARY key(idNote)
);

create table RECOMPENSE(
    idRecompense int,
    idGroupe int,
    NomCategorie varchar(30),
    FOREIGN KEY(idRecompense) REFERENCES GROUPE(NumGroupe),
    CONSTRAINT Pk_RECOMPENSE PRIMARY KEY(idRecompense,idGroupe)
);

create table APPARTIENT_A(
    IDProf int,
    NumJury int,
    FOREIGN KEY(IDProf) REFERENCES PROFESSEUR(IDProf),
    FOREIGN KEY(NumJury) REFERENCES JURY(NumJury),
    CONSTRAINT Pk_APPARTIENT_A PRIMARY KEY(IDProf,NumJury)
);

create table APPARTIENT_AU(
    IDEleve int,
    NumGroupe int,
    FOREIGN KEY(IDEleve) REFERENCES ELEVE(IDEleve),
    FOREIGN KEY(NumGroupe) REFERENCES GROUPE(NumGroupe),
    CONSTRAINT Pk_APPARTIENT_AU PRIMARY KEY(IDEleve,NumGroupe)
);

create table JUGE(
    NumJury int,
    NumGroupe int,
    idHeure int,
    FOREIGN KEY(NumJury) REFERENCES JURY(NumJury),
    FOREIGN KEY(NumGroupe) REFERENCES GROUPE(NumGroupe),
    FOREIGN KEY(idHeure) REFERENCES HEURE(idHeure),
    CONSTRAINT Pk_JUGE PRIMARY KEY(NumJury,NumGroupe,idHeure)
);

create table DONNE(
    NumJury int,
    NumGroupe int,
    idNote int,
    FOREIGN KEY(NumJury) REFERENCES JURY(NumJury),
    FOREIGN KEY(NumGroupe) REFERENCES GROUPE(NumGroupe),
    FOREIGN KEY(idNote) REFERENCES NOTE(idNote),
    CONSTRAINT Pk_DONNE PRIMARY KEY(NumJury,NumGroupe,idNote)
)



